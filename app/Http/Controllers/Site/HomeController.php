<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $hotNews = News::with('categories')->orderBy('published_at', 'DESC')->limit(8)->get();
        if (!empty($hotNews)) {
            $hotNews = $this->getFirstCategory($hotNews);
            $newsest = $hotNews->first();
            $trendings = $hotNews->slice(1,3);
            $rightTrendings = $hotNews->skip(4);
        }
        $categories = Category::take(7)->get();
        $allNewsByCategories = $this->getAllNewsByCategory();
        $allNewsByCategories = $this->getFirstCategory($allNewsByCategories);
        return view('site.home', compact('trendings', 'newsest', 'rightTrendings', 'categories', 'allNewsByCategories'));
    }

    protected function getAllNewsByCategory() {
        return News::with('categories')->orderBy('published_at', 'DESC')->skip(0)->limit(9)->get();
    }

    protected function getFirstCategory($items) {
        foreach ($items as $item) {
            if (!empty($item->categories)) {
                $item->firstCategory = !empty($item->categories->first()->name) ? $item->categories->first()->name : '';
            }
        }
        return $items;
    }
}
