<?php

namespace App\Services;

class ImageService {

    public function uploadImage($params)
    {
        $imageUrl = '';
        if (!empty($params['image'])) {
            $type = isset($params['type']) ? $params['type'] : '';
            $filename = time() . '.' . $params['image']->getClientOriginalExtension();
            $path = '/images/upload/' . $type;
            $params['image']->move(public_path() . $path, $filename);
            $imageUrl = env('APP_URL') . $path . '/' . $filename;
        }
        return $imageUrl;
    }

    public function removeImage($request)
    {
        if (!empty($request['images'])) {
            foreach ($request['images'] as $item) {
                if (empty($item['image_url'])) {
                    if (strpos(env('APP_URL'), $item['image_url'])) {
                        $pathFile = str_replace(env('APP_URL'), '', $item['image_url']);
                        $oldImagePath = public_path() . '/' . $pathFile;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                }
            }
        }
    }

}