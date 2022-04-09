<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;

class NewsController extends Controller
{
    public function index() {
        $news = NewsModel::all();

        return view('back/news/news_table', [
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('back/news/news_add');
    }
}
