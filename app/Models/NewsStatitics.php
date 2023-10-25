<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsStatitics extends Model
{
    use HasFactory;

    protected $table = 'news_statictis';

    protected $fillable = [
        'news_id',
        'ip',
        'created_at',
        'source',
        'user_agent'
    ];
}
