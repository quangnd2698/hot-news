<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function show($slug) {
        $category = Category::where('slug', $slug)->first();
        if (!empty($category)) {
            $items = News::join('news_n_categories as nnc', 'nnc.news_id', '=', 'news.id')
                            ->where('nnc.category_id', '=', $category->id)
                            ->where('published_at', '>=', date('Y-m-d H:i:s'))
                            ->orderBy('published_at', 'DESC')
                            ->limit(8)->get();
            $newsest = $items->first();
            $trendings = $items->slice(1,3);
            $rightTrendings = $items->skip(4);

        }

        return view('site.category.index', ['newsest' => $items]);
    }
}
