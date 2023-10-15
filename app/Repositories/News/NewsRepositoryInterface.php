<?php

namespace App\Repositories\News;

interface NewsRepositoryInterface {
    public function getHotNews($filters);
}