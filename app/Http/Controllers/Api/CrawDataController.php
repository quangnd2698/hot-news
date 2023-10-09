<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class CrawDataController extends Controller
{
    public function buildData()
    {
        $items = \DB::table('news_crawls')->get();

        if (!empty($items)) {
            foreach ($items as $item) {
                if (!empty($item->category_1)) {
                    // dd($this->prepareContent($item->content));   
                    $category = $this->buildCategory($item->category_1);
                    $newSlug = Helper::getSlug($item->name);
                    $exits = \DB::table('news')->where('slug', $newSlug)->exists();
                    if (!$exits) {
                        $insertData = [
                            'title' => $item->name,
                            'short_description' => $item->description,
                            'content' => $this->prepareContent($item->content),
                            'slug' => Helper::getSlug($item->name),
                            'image_url' => $item->image_url,
                            'published_at' => date('Y-m-d H:i:s'),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            'author_id' => '-1'
                        ];
                        $newsId = \DB::table('news')->insertGetId($insertData);

                        if (!empty($category) && !empty($newsId)) {
                            \DB::table('news_n_categories')->insert([
                                'news_id' => $newsId,
                                'category_id' => $category
                            ]);
                        }
                    }
                    
                }
            }
        }
        return response([
            'status' => 'Success'
        ]);
    }

    function buildCategory($categoryName) {
        $slug = Helper::getSlug($categoryName);
        $category = \DB::table('categories')->where('slug', $slug)->value('id');
        if (empty($category)) {
            $category = \DB::table('categories')->insertGetId([
                'name' => $categoryName,
                'slug' => $slug,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return $category;
    }

    static function replaceImgSrc($match) {
        // $match[0] contains the entire matched img tag
        // $match[1] contains the src attribute value
        // $match[2] contains the data-src attribute value
        return str_replace($match[1], $match[2], $match[0]);
    }

    protected function prepareContent ($content) {


        $content = preg_replace_callback(
            '/<img.*?src=["\'](.*?)["\'].*?data-src=["\'](.*?)["\'].*?>/i',
            function ($match) {
                return str_replace($match[1], $match[2], $match[0]);
            },
            $content
        );


        return $content;

    }

    
}
