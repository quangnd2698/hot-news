<?php

namespace App\Repositories\News;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsNCategory;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface {

    public function __construct()
    {
        $this->model = News::class;
    }

    protected function prepareEdit(&$params, $item = [])
    {
        if (empty($item)) {
            // $params['author_id'] = Auth::guard('admin')->user()->id;
            $params['author_id'] = 1;
        }
        if (!empty($params['title'])) {
            $params['slug'] = $this->getSlug($params['title']);
        }
        if (!empty($params['image'])) {
            $filename = time() . '.' . $params['image']->getClientOriginalExtension();
            $path = 'images/upload/news';
            $params['image']->move(public_path() . '/' . $path, $filename);
            $params['image_url'] = $path . '/' . $filename;
            // dd($params['image_url']);
            unset($params['image']);
            if (!empty($item) && !empty($item->image_url)) {
                $this->removeOldImage($item->image_url);
            }
        } else if (!empty($params['image_url'])) {
            unset($params['image_url']);
        }
    }

    protected function prepareFilter(&$filters)
    {
    }

    protected function customQuery($query, $filters)
    {
        if (!empty($filters['category_id'])) {
            $query->join('news_n_categories as nnc',  'news.id',  '=',  'nnc.news_id')
                    ->where('nnc.category_id', $filters['category_id'])
                    ->select('news.*');
        }
        $query->with('categories');
        return $query;
    }

    protected function editSuccess($item, $params, $type = 'create')
    {
        if (!empty($params['category_ids'])) {
            $oldCategoryIds = NewsNCategory::where('news_id', $item->id)->pluck('category_id')->toArray();
            $categoryIds = array_values($params['category_ids']);
            $removeCategoryIds = array_diff($oldCategoryIds, $categoryIds);
            $insertCategoryIds = array_diff($categoryIds, $oldCategoryIds);
           
            if (isset($insertCategoryIds)) {
                $insertCategoryIds = Category::whereIn('id', $insertCategoryIds)->pluck('id')->toArray();
                $insertParams = [];
                foreach ($insertCategoryIds as $categoryId) {
                    $insertParams[] = [
                        'news_id' => $item->id,
                        'category_id' => $categoryId
                    ];
                }

                if (isset($insertParams)) {
                    NewsNCategory::insert($insertParams);
                }
            }
            if (isset($removeCategoryIds)) {
                NewsNCategory::where('news_id', $item->id)->whereIn('category_id', $removeCategoryIds)->delete();
            }
        }
    }

    protected function deleteSuccess($itemId)
    {
        NewsNCategory::where('news_id', $itemId)->delete();
    }

    protected function prepareList(&$items)
    {
        foreach ($items as $key => $item) {
            if (!empty($item->categories)) {
                $categoryIds = $item->categories->pluck('id')->all();
                $categoryNames = $item->categories->pluck('name')->all();
                $item->category_ids = array_map('strval', $categoryIds);
                if (!empty($categoryNames)) {
                    $item->categoryNames = implode(', ', $categoryNames);
                }
            }
            $items[$key] = $item;
        }
    }

}