@extends('front/layouts/main')

@section('news_list')
    <div class="row">
        @include('front/news/news_side')
        <div class="col-md-9 col-ms-12">
            @if (count($news) > 0)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($news as $key => $value)
                    <div class="col-lg-4 col-md-6 col-ms-12">
                        <div class="card h-100">
                            <a href="/news/show/{{ $value->news_id }}"><img src="{{ isset($value->news_image) ? '/storage/'.$value->news_image : asset('images/default.png') }}" class="card-img-top" width="200" height="200"></a>
                            <div class="card-body">
                                <h4 class="card-title text-truncate" title="{{ $value->news_title }}"><a href="/news/show/{{ $value->news_id }}">{{ $value->news_title }}</a></h5><br>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i> {{ $value->news_time }}</p>
                                <p class="card-text text-truncate" title="{{ $value->news_intro }}">{{ $value->news_intro }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="/news/show/{{ $value->news_id }}" class="btn btn-outline-primary">閱讀更多 <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="alert alert-primary" style="text-align:center;" role="alert">
                    沒有任何消息!
                </div>
            @endif
        </div>
    </div>
@endsection