@extends('front/layouts/main')

@section('product_list')
<div class="container">
    <div class="row">
        @include('front/product/product_side')
        <div class="col-md-9 col-ms-12">
            @if (count($product) > 0)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($product as $key => $value)
                    <div class="col-lg-4 col-md-6 col-ms-12">
                        <div class="card h-100">
                            <a href="/product/show/{{ $value->product_id }}">
                                <img src="{{ isset($value->product_image) ? '/storage/'.$value->product_image : asset('images/default.png') }}" 
                                class="card-img-top" width="200" height="200">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title text-truncate" title="{{ $value->product_name }}">
                                    <a href="/product/show/{{ $value->product_id }}">{{ $value->product_name }}</a>
                                </h5>
                                @if ($value->on_sale == 'Y')
                                    <del>${{ $value->product_price }}</del> <span>${{ $value->product_sale }}</span>
                                @else
                                    <span>${{ $value->product_price }}</span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="/product/show/{{ $value->product_id }}" class="btn btn-outline-primary">
                                    詳細資訊 <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="alert alert-primary" style="text-align:center;" role="alert">
                    沒有任何產品!
                </div>
            @endif
        </div>
    </div>
</div>
@endsection