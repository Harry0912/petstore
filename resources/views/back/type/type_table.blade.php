@extends('back/layouts/main')

@section('type')
<div class="container">
    <form id="typeAddForm">
        <div class="row">
            <div class="col-2 bg-info bgblue">分類名稱 : </div>
            <div class="col-3"><input type="text" class="form-control" name="type_name"></div>
            <button type="submit" class="col-1 btn btn-primary">新增</button>
        </div>
    </form><hr>
    @if(count($type) > 0)
        <form id="typeForm">
            @foreach($type as $key => $value)
                <div class="row">
                    <input type="hidden" name="type_id[]" value="{{ $value->type_id }}">
                    <div class="col-4"><input type="text" class="form-control" name="type_name[]" value="{{ $value->type_name }}"></div>
                    <div class="col-1"><a href="/api/type/delete/{{ $value->type_id }}" name="type_delete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></div>
                </div><br>
            @endforeach
            <div class="row">
                <div class="col-2"><button type="submit" class="btn btn-primary">儲存</button></div>
            </div>
        </form>
    @else
        <div class="alert alert-primary" style="text-align:center;" role="alert">
            沒有任何分類!
        </div>
    @endif
</div>
@endsection