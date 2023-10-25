<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\NewsStatitics;

class NewsController extends Controller
{
    public function show($slug) {
        $news = News::where('slug', $slug)->first();
        $trendings = News::with('categories')->where('published_at', '<', date('Y-m-d H:i:s'))->orderBy('published_at', 'DESC')->limit(6)->get();
        foreach ($trendings as $item) {
            if (!empty($item->categories)) {
                $item->firstCategory = !empty($item->categories->first()->name) ? $item->categories->first()->name : '';
            }
        }
        $news->update([
            'view_count' => !empty($news->view_count) ? $news->view_count + 1 : 1
        ]);
        // try {
            NewsStatitics::create([
                'news_id' => $news->id,
                'created_at' => date('Y-m-d H:i:s'),
                'ip' => $this->getIP(),
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'source' => !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''
            ]);
        // } catch (\Throwable $th) {
        // }
        
        return view('site.news-detail', compact('news', 'trendings'));
    }

    public static function getIP()
    {
        $retVal = 'UNKNOWN';
        if (key_exists("CF-Connecting-IP", $_SERVER))
            $retVal = $_SERVER['CF-Connecting-IP'];
        else if (key_exists("HTTP_CLIENT_IP", $_SERVER))
            $retVal = $_SERVER['HTTP_CLIENT_IP'];
        else if (key_exists("HTTP_X_FORWARDED_FOR", $_SERVER))
            $retVal = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (key_exists("HTTP_X_FORWARDED", $_SERVER))
            $retVal = $_SERVER['HTTP_X_FORWARDED'];
        else if (key_exists("HTTP_FORWARDED_FOR", $_SERVER))
            $retVal = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (key_exists("HTTP_FORWARDED", $_SERVER))
            $retVal = $_SERVER['HTTP_FORWARDED'];
        else if (key_exists("REMOTE_ADDR", $_SERVER))
            $retVal = $_SERVER['REMOTE_ADDR'];
        return $retVal;
    }
}
