@extends('back/layouts/main')

@section('product_table')
<div class="container">
    <div class="row">
        <a href="/product/add" class="col-1 btn btn-primary" style="margin-right:5px;">新增</a>
        <button id="btnDelete" class="col-1 btn btn-danger">刪除</button>
    </div><hr>
    <div class="row">
        @if(count($product) > 0)
            <table class="table table-primary table-striped table-bordered" style="vertical-align: middle;">
                <tr class="table-light">
                    <th class="col-1"><input class="form-check-input" id="checkAll" type="checkbox"></th>
                    <th class="col-9">產品名稱</th>
                    <th class="col-2"></th>
                </tr>
                @foreach($product as $key => $value)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="{{ $value->product_id }}"></td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $value->product_name }}</td>
                    <td>
                        <a class="btn btn-primary" href="/product/edit/{{ $value->product_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger" name="product_delete" href="/product/delete/{{ $value->product_id }}"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-primary" style="text-align:center;" role="alert">
                沒有任何產品!
            </div>
        @endif
    </div>
</div>
@endsection