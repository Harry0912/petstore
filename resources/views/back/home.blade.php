@extends('back/layouts/main')

@section('home')
<form id="editForm">
    <div class="container">
        <div class="row">
            <div class="col-2 bg-info bgblue">網站名稱</div>
            <div class="col-4"><input class="form-control" type="text" name="title" value="{{ $data->title }}"></div>
            <div class="col-2 bg-info bgblue">連絡電話</div>
            <div class="col-4"><input class="form-control" type="text" name="tel" value="{{ $data->tel }}"></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">傳真號碼</div>
            <div class="col-4"><input class="form-control" type="text" name="fax" value="{{ $data->fax }}"></div>
            <div class="col-2 bg-info bgblue">Email</div>
            <div class="col-4"><input class="form-control" type="text" name="email" value="{{ $data->email }}"></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue">地址</div>
            <div class="col-10"><input class="form-control" type="text" name="address" value="{{ $data->address }}"></div>
        </div><br>
        <div class="row">
            <button class="col-1 btn btn-primary" type="submit">儲存</button>
        </div>
    </div>
</form>
@endsection