<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $newsRepo;
    public function __construct(NewsRepositoryInterface $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function index() {
        $hotNews = News::with('categories')->orderBy('published_at', 'DESC')->limit(10)->get();
        if (!empty($hotNews)) {
            $hotNews = $this->getFirstCategory($hotNews);
            $newsest = $hotNews->first();
            $trendings = $hotNews->slice(1,3);
            $rightTrendings = $hotNews->skip(4);
        }
        $categories = Category::take(7)->get();
        $ignoreIds = $hotNews->pluck('id')->toArray();
        $allNewsByCategories = $this->newsRepo->getHotNews(['ignore_ids' => $ignoreIds]);
        $allNewsByCategories = $this->getFirstCategory($allNewsByCategories);
        foreach ($categories as $category) {
            $category->news = $this->newsRepo->getHotNews(['ignore_ids' => $ignoreIds, 'category_id' => $category->id]);
            $category->news = $this->getFirstCategory($category->news);
        }
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
