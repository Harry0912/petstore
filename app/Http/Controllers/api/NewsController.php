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
        $title = trim($request->news_title);
        $intro = trim($request->news_intro);
        $time = $request->news_time;
        $content = trim($request->news_content);
        $image = ($request->news_image)?$request->news_image->store('upload/news', 'public'):null;

        $data = NewsModel::create([
            'news_title' => $title,
            'news_intro' => $intro,
            'news_time' => $time,
            'news_content' => $content,
            'news_image' => $image
        ]);

        return response()->json($data, 201);
    }
    
    public function update(NewsRequest $request, $id)
    {
        // $data = NewsModel::find($id)->update([
        //     'news_title' => $request->news_title,
        //     'news_intro' => $request->news_intro,
        //     'news_time' => $request->news_time,
        //     'news_content' => $request->news_content,
        //     'news_image' => $request->news_image->store('upload/news', 'public')
        // ]);

        $data = NewsModel::find($id);

        $title = trim($request->news_title);
        $intro = trim($request->news_intro);
        $time = $request->news_time;
        $content = trim($request->news_content);
        $image = $request->news_image;

        $data->news_title = $title;
        $data->news_intro = $intro;
        $data->news_time = $time;
        $data->news_content = $content;
        if ($image) $data->news_image = $image->store('upload/news', 'public');
        $data->save();

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = NewsModel::destroy($id);

        return response()->json(null, 204);
    }

    public function search($keyword)
    {
        $data = NewsModel::where('news_title', 'like', '%'.$keyword.'%')->get();

        return $data;
    }
}
