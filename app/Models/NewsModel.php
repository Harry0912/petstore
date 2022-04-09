<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'news_id';

    public $timestamps = false;

    protected $fillable = [
        'news_title', 'news_intro', 'news_time', 'news_content', 'news_image'
    ];
}
