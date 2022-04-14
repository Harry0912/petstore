@extends('back/layouts/main')

@section('product_info')
<div class="container">
    <div class="row"><a href="/product/table" class="col-2 btn btn-success">回上一頁</a></div><br>
    <form id="productForm">
        <div class="row">
            <div class="col-2 bg-info bgblue">產品名稱<span> *</span></div>
            <div class="col-4"><input type="text" class="form-control" name="product_name" value="{{ $product->product_name ?? '' }}"></div>
            <div class="col-2 bg-info bgblue">分類<span> *</span></div>
            <div class="col-4">
                <select class="form-select" name="type_id">
                    <option {{ $product->type_id ?? 'selected' }} disabled>請選擇產品分類</option>
                    @foreach ($type as $key => $value)
                        <option value="{{ $value->type_id }}" 
                            @if (isset($product) && ($product->type_id == $value->type_id)) {{ 'selected' }} @endif>
                            {{ $value->type_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div><br>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4 bg-info bgblue">產品描述</div>
                    <div class="col-8">
                        <textarea name="product_intro" class="form-control" rows="6">{{ $product->product_intro ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-4 bg-info bgblue">產品售價<span> *</span></div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="product_price" value="{{ $product->product_price ?? '' }}">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-4 bg-info bgblue">特價開關</div>
                    <div class="col-8 form-switch">
                        <input type="checkbox" name="on_sale" class="form-check-input form-control" 
                        style="margin-left: -1.5em; margin-top: 0.5em" 
                        @if (isset($product) && ($product->on_sale == 'Y')) {{ 'checked' }} @endif>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-4 bg-info bgblue">特價金額</div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="product_sale" value="{{ $product->product_sale ?? '' }}">
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">產品說明</div>
            <div class="col-10">
                <textarea name="product_content" class="form-control" rows="6">{{ $product->product_content ?? '' }}</textarea>
            </div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">產品圖片</div>
            <div class="col-4"><input type="file" class="form-control" name="product_image"></div>
        </div><br>
        <div>
            <img id="product_img" 
            src="{{ isset($product->product_image) ? '/storage/'.$product->product_image : asset('images/default.png') }}" 
            class="rounded" width="400" height="400">
        </div><br>
        <input type="hidden" id="product_id" value="{{ $product->product_id ?? '' }}">
        <button type="submit" class="col-1 btn btn-primary">儲存</button>
    </form>
</div>
@endsection