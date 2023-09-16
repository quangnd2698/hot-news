<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface {

    public function __construct()
    {
        $this->model = Category::class;
    }
}