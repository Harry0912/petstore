@extends('front/layouts/main')

@section('product_show')
<div class="container">
    <div class="row">
        @include('front/product/product_side')
        <div class="col-md-9 col-ms-12">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <img src="{{ isset($product->product_image) ? '/storage/'.$product->product_image : asset('images/default.png') }}" width="300" height="300">
                </div>
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <h3>{{ $product->product_name }}</h3><br>
                    <p>產品分類 : {{ $product->type->type_name }}</p>
                    <p>產品描述 : {{ $product->product_intro }}</p>
                    <p>產品說明 : {{ $product->product_content }}</p><br>
                    產品售價 : 
                    @if ($product->on_sale == 'Y')
                        <del>${{ $product->product_price }}</del> <span>${{ $product->product_sale }}</span>
                    @else
                        <span>${{ $product->product_price }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection