<?php
 namespace App\Repositories;
 use Utils;

use Exception;

class BaseRepository {

    protected $model;

    public function getAll($filters, $paginate = false)
    {
        $retVal = [];
        $this->prepareFilter($filters);
        $query = $this->model::filters($filters);
        $query = $this->customQuery($query, $filters);
        if ($paginate) {
            $retVal = $query->customPaginate($filters);
        } else {
            $retVal = $query->get();
        }

        $this->prepareList($retVal);

        return $retVal;
    }

    protected function prepareList(&$items)
    {
        # code...
    }

    protected function customQuery($query, $filters)
    {
        return $query;
    }

    protected function prepareFilter(&$filters)
    {
        # code...
    }

    public function create($args = null) {
        if ($args == null) {
            throw new \InvalidArgumentException('Missing argument');
        }
        $retVal = false;
        try {
            $this->prepareEdit($args);
            $retVal = $this->model::create($args);
            $this->editSuccess($retVal, $args);
        } catch(Exception $ex) {
            \Log::info($ex->getMessage() . ' line: ' . $ex->getLine());
        }
        return $retVal;
    }

    public function update($id, $params) {
        if ($params == null) {
            throw new \InvalidArgumentException('Missing argument');
        }
        $retVal = null;
        try {
            $item = $this->model::find($id);
            if (!empty($item)) {
                $this->prepareEdit($params, $item);
                $item->update($params);
                $item->fresh();
                $this->editSuccess($item, $params, 'update');
            }
            $retVal = $item;
        } catch(Exception $ex) {
            \Log::info($ex->getMessage() . ' line: ' . $ex->getLine());
        }
        return $retVal;
    }

    protected function editSuccess($item, $params, $type = 'create')
    {
        # code...
    }

    protected function prepareEdit(&$params, $item = [])
    {
        if (isset($params['auth_key'])) {
            unset($params['auth_key']);
        }
    }

    public function delete($id = null) {
        if ($id == null) {
            throw new \InvalidArgumentException('Missing argument');
        }
        $retVal = false;
        try {
            if (!is_array($id)) {
                $item = $this->model::find($id);
                if ($item) {
                    $retVal = $item->delete();
                }
                if ($retVal) {
                    $this->deleteSuccess($id);
                }
            } else {
                $items = $this->model::whereIn('id', $id);
                if (!empty($items)) {
                    $retVal = $items->delete();
                }
            }
        } catch(Exception $ex) {

        }
        return $retVal;
    }

    public function selectById($id) {
        $item = [];
        if (!empty($id)) {
            $item = $this->model::find($id);
            if (!empty($item)) {
                $this->prepareSelect($item);
            }
        }
        return $item;
    }

    protected function prepareSelect(&$item) {
        // build data item before return
    }

    public function getFirst($args = null) {
        if ($args == null) {
            throw new \InvalidArgumentException('Missing argument');
        }
        $builder = (call_user_func(static::MODEL . '::query'));
        foreach ($args as $key => $value) {
            $builder->where($key, '=', $value);
        }
        return $builder->first();
    }

    public function getLast($args = null) {
        if ($args == null) {
            throw new \InvalidArgumentException('Missing argument');
        }
        $builder = (call_user_func(static::MODEL . '::query'));
        foreach ($args as $key => $value) {
            $builder->where($key, '=', $value);
        }
        return $builder->last();
    }

    protected function sendRequest($url, $method = "GET", $data = [], $validate = true) {
        $channel = curl_init();
        if($method == "GET"){
            $url .= '?' . http_build_query($data);
        }
        curl_setopt($channel, CURLOPT_URL, $url);
        curl_setopt($channel, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($channel, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($channel);
        curl_close($channel);
        if($validate) {
            $response = $this->getJsonFromString($response);
        }
        $responseInJson = json_decode($response);
        return isset($responseInJson->result) ? $responseInJson->result : $responseInJson;
    }

    private function getJsonFromString($text) {
        $retVal = $text;
        $pattern = '
/
\{              # { character
    (?:         # non-capturing group
        [^{}]   # anything that is not a { or }
        |       # OR
        (?R)    # recurses the entire pattern
    )*          # previous group zero or more times
\}              # } character
/x
';
        try {
            preg_match_all($pattern, $text, $matches);
            if (isset($matches[0]) && isset($matches[0][0])) {
                $retVal = $matches[0][0];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $retVal;
    }

    protected function removeOldImage($pathFile)
    {
        $oldImagePath = public_path() . '/' . $pathFile;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    protected function deleteSuccess($itemId)
    {
        # code...
    }

    public function getSlug($text, $allowUnder = false)
    {
        static $charMap = array(
            "à" => "a", "ả" => "a", "ã" => "a", "á" => "a", "ạ" => "a", "ă" => "a", "ằ" => "a", "ẳ" => "a", "ẵ" => "a", "ắ" => "a", "ặ" => "a", "â" => "a", "ầ" => "a", "ẩ" => "a", "ẫ" => "a", "ấ" => "a", "ậ" => "a",
            "đ" => "d",
            "è" => "e", "ẻ" => "e", "ẽ" => "e", "é" => "e", "ẹ" => "e", "ê" => "e", "ề" => "e", "ể" => "e", "ễ" => "e", "ế" => "e", "ệ" => "e",
            "ì" => "i", "ỉ" => "i", "ĩ" => "i", "í" => "i", "ị" => "i",
            "ò" => "o", "ỏ" => "o", "õ" => "o", "ó" => "o", "ọ" => "o", "ô" => "o", "ồ" => "o", "ổ" => "o", "ỗ" => "o", "ố" => "o", "ộ" => "o", "ơ" => "o", "ờ" => "o", "ở" => "o", "ỡ" => "o", "ớ" => "o", "ợ" => "o",
            "ù" => "u", "ủ" => "u", "ũ" => "u", "ú" => "u", "ụ" => "u", "ư" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ứ" => "u", "ự" => "u",
            "ỳ" => "y", "ỷ" => "y", "ỹ" => "y", "ý" => "y", "ỵ" => "y",
            "À" => "A", "Ả" => "A", "Ã" => "A", "Á" => "A", "Ạ" => "A", "Ă" => "A", "Ằ" => "A", "Ẳ" => "A", "Ẵ" => "A", "Ắ" => "A", "Ặ" => "A", "Â" => "A", "Ầ" => "A", "Ẩ" => "A", "Ẫ" => "A", "Ấ" => "A", "Ậ" => "A",
            "Đ" => "D",
            "È" => "E", "Ẻ" => "E", "Ẽ" => "E", "É" => "E", "Ẹ" => "E", "Ê" => "E", "Ề" => "E", "Ể" => "E", "Ễ" => "E", "Ế" => "E", "Ệ" => "E",
            "Ì" => "I", "Ỉ" => "I", "Ĩ" => "I", "Í" => "I", "Ị" => "I",
            "Ò" => "O", "Ỏ" => "O", "Õ" => "O", "Ó" => "O", "Ọ" => "O", "Ô" => "O", "Ồ" => "O", "Ổ" => "O", "Ỗ" => "O", "Ố" => "O", "Ộ" => "O", "Ơ" => "O", "Ờ" => "O", "Ở" => "O", "Ỡ" => "O", "Ớ" => "O", "Ợ" => "O",
            "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ú" => "U", "Ụ" => "U", "Ư" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ứ" => "U", "Ự" => "U",
            "Ỳ" => "Y", "Ỷ" => "Y", "Ỹ" => "Y", "Ý" => "Y", "Ỵ" => "Y"
        );

        $text = strtr($text, $charMap);

        $text = self::cleanUpSpecialChars($text, $allowUnder);
        return strtolower($text);
    }

    private static function cleanUpSpecialChars($text, $allowUnder = false)
    {
        $regExpression = "`\W`i";
        if ($allowUnder)
            $regExpression = "`[^a-zA-Z0-9-]`i";

        $text = preg_replace(array($regExpression, "`[-]+`",), "-", $text);
        return trim($text, "-");
    }

    public function validateImage($data)
    {
        $maxSize = 1024;
        $templates = config('setting.page_types');
        $type = isset($data['type']) ? $data['type'] : '';
        if (isset($type) && isset($templates[$type]) && isset($templates[$type]['max_image_size'])) {
            $maxSize = $templates[$type]['max_image_size'];
        }
        $rule = [
            'image' => [
                'required', 'image',
                'max:' . $maxSize,
            ],
        ];
        $messages = [
            'image.max' => 'The image may not be greater than 1 MB!',
        ];
        $validator = Validator::make($data, $rule, $messages);
        return [$validator->passes(), $validator->errors()->first()];
    }

    public function uploadImage($request)
    {
        $imageUrl = '';
        if (!empty($request['image'])) {
            $type = isset($request['type']) ? $request['type'] : '';
            $filename = 'news-'. time() . '.' . $request['image']->getClientOriginalExtension();
            $path = 'images/upload/images/' . $type;
            $request['image']->move(public_path() . $path, $filename);
            $imageUrl = env('APP_URL') . $path . '/' . $filename;
        }
        return $imageUrl;
    }
}
