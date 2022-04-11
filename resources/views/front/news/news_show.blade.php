@extends('front/layouts/main')

@section('news_show')
    <div class="row">
        @include('front/news/news_side')
        <div class="col-8">
            <div class="row">
                <div class="col-5">
                    <img src="{{ isset($news->news_image) ? '/storage/'.$news->news_image : asset('images/default.png') }}" width="300" height="300">
                </div>
                <div class="col-7">
                    <h4 class="text-truncate" title="{{ $news->news_title }}">{{ $news->news_title }}</h4>
                    <hr>
                    <p style="word-wrap:break-word;" title="{{ $news->news_content }}">{{ $news->news_content }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection