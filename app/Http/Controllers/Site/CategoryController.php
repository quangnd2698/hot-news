<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Repositories\News\NewsRepositoryInterface;

class CategoryController extends BaseController
{

    protected $newsRepo;
    public function __construct(NewsRepositoryInterface $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function show($slug) {
        $category = Category::where('slug', $slug)->first();
        if (!empty($category)) {
            $items = News::join('news_n_categories as nnc', 'nnc.news_id', '=', 'news.id')
                            ->where('nnc.category_id', '=', $category->id)
                            ->where('published_at', '<=', date('Y-m-d H:i:s'))
                            ->orderBy('published_at', 'DESC')
                            ->limit(11)
                            ->get();
            $newsest = $items->first();
            $trendings = $items->slice(1,3);
            $rightTrendings = $items->skip(4);
            $listNews = $this->getListNews($category->id, $items->pluck('id')->toArray());
        }
        return view('site.category.index', [
            'newsest' => $newsest, 
            'category' => $category, 
            'trendings' => $trendings, 
            'rightTrendings' => $rightTrendings,
            'listNews' => $listNews
        ]);
    }

    protected function getListNews($categoryId, $ids = []) {
        return News::join('news_n_categories as nnc', 'nnc.news_id', '=', 'news.id')
                            ->where('nnc.category_id', '=', $categoryId)
                            ->whereNotIn('news.id', $ids)
                            ->where('published_at', '<=', date('Y-m-d H:i:s'))
                            ->orderBy('published_at', 'DESC')
                            ->paginate(15);
    }
}
