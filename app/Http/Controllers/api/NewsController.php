<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Models\NewsModel;

class NewsController extends Controller
{
    public function store(NewsRequest $request)
    {
        $data = NewsModel::create ([
            'news_title' => $request->news_title,
            'news_intro' => $request->news_intro,
            'news_time' => $request->news_time,
            'news_content' => $request->news_content,
            'news_image' => $request->news_image->store('upload/news', 'public')
        ]);

        return response()->json($data, 201);
    }
}
