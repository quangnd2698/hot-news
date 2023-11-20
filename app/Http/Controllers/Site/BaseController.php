<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
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
