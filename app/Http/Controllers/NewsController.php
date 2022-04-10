<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;

class NewsController extends Controller
{
    public function index() {
        $data = NewsModel::orderBy('news_id', 'desc')->get();

        return view('back/news/news_table', [
            'news' => $data
        ]);
    }

    public function create()
    {
        return view('back/news/news_info');
    }

    public function edit($id)
    {
        $data = NewsModel::find($id);
        
        return view('back/news/news_info', [
            'news' => $data
        ]);
    }
}
