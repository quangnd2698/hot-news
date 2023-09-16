<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsNCategory extends Model
{
    use HasFactory;
    protected $table = 'news_n_categories';
    protected $fillable = [
        'category_id', 'news_id'
    ];
}
