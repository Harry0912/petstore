@extends('layouts/main')

@section('main')
    <div class="container">
        <div class="row" id="infoList">
            <div class="col-md-4">
                <img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <h5><span id="info_title">{{ $data->title }}</span></h5><br>
                <p><i class="fa fa-phone" aria-hidden="true"></i> : <span id="info_tel">{{ $data->tel }}</span></p>
                <p><i class="fa fa-fax" aria-hidden="true"></i> : <span id="info_fax">{{ $data->fax }}</span></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> : <span id="info_email">{{ $data->email }}</span></p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <span id="info_address">{{ $data->address }}</span></p>
                <button class="btn btn-primary" id="btnEdit"><i class="fa-solid fa-pen-to-square"></i> 編輯</button>
            </div>
        </div>

        <form id="editForm" style="display: none;">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <h5><input type="text" name="title" value="{{ $data->title }}"></h5>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> : <input type="text" name="tel" value="{{ $data->tel }}"></p>
                    <p><i class="fa fa-fax" aria-hidden="true"></i> : <input type="text" name="fax" value="{{ $data->fax }}"></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> : <input type="text" name="email" value="{{ $data->email }}"></p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <input type="text" name="address" value="{{ $data->address }}"></p>
                    <button class="btn btn-primary">編輯完成</button>
                </div>
            </div>
        </form>
        <!-- <div class="row" id="infoEdit" style="display: none;">
            <div class="col-md-4">
                <img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <h5><input type="text" id="title" value="{{ $data->title }}"></h5><br>
                <p><i class="fa fa-phone" aria-hidden="true"></i> : <input type="text" id="tel" value="{{ $data->tel }}"></p>
                <p><i class="fa fa-fax" aria-hidden="true"></i> : <input type="text" id="fax" value="{{ $data->fax }}"></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> : <input type="text" id="email" value="{{ $data->email }}"></p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <input type="text" id="address" value="{{ $data->address }}"></p>
                <button class="btn btn-primary" id="btnUpdate"><i class="fa-regular fa-floppy-disk"></i> 儲存</button>
            </div>
        </div> -->
    </div>
@endsection