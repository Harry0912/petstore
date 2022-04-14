@extends('back/layouts/main')

@section('news_info')
<div class="container">
    <div class="row">
        <a href="/news/table" class="col-2 btn btn-success">回上一頁</a>
    </div><br>
    <form id="newsForm">
        <div class="row">
            <div class="col-2 bg-info bgblue">標題<span> *</span></div>
            <div class="col-4"><input class="form-control" type="text" name="news_title" value="{{ $news->news_title ?? '' }}"></div>
            <div class="col-2 bg-info bgblue">發布日期</div>
            <div class="col-4"><input class="form-control" type="date" name="news_time" value="{{ $news->news_time ?? '' }}"></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">簡述</div>
            <div class="col-10"><input class="form-control" type="text" name="news_intro" value="{{ $news->news_intro ?? '' }}"></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">內容</div>
            <div class="col-10">
                <textarea class="form-control" name="news_content" style="border-radius:5px;" rows="6">{{ $news->news_content ?? '' }}</textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">圖片</div>
            <div class="col-4"><input class="form-control" type="file" name="news_image"></div>
        </div><br>
        <div>
            <img id="news_img" src="{{ isset($news->news_image) ? '/storage/'.$news->news_image : asset('images/default.png') }}" class="rounded" alt="..." width="400" height="400">
        </div><br>
        <div class="row">
            <input type="hidden" id="news_id" value="{{ $news->news_id ?? '' }}">
            <button class="col-1 btn btn-primary" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection