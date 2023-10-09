<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends BaseModel
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'title', 'short_description', 'content', 'author_id', 'published_at', 'slug', 'image_url', 'view_count'
    ];

    protected $searchColumn = 'title';

    // protected $append = ['firstCategory'];

        /**
     * Get all of the deployments for the project.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_n_categories', 'news_id', 'category_id');
    }

    // public function getFirstCategoryAttribute() {
    //     $newsNCategory = DB::table('categories as c')
    //                         ->leftJoin('news_n_categories as nnc', 'n.id', '=', 'nnc.category_id')
    //                         ->
    // }

}
