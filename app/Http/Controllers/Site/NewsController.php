<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

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
        return view('site.news-detail', compact('news', 'trendings'));
    }
}
