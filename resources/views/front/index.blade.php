@extends('front/layouts/main')

@section('main')
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8 col-sm-12">
            <h4>{{ $data->title }}</h4><br>
            <p><i class="fa fa-phone" aria-hidden="true"></i> : {{ $data->tel }}</p>
            <p><i class="fa fa-fax" aria-hidden="true"></i> : {{ $data->fax }}</p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> : {{ $data->email }}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> : {{ $data->address }}</p>
        </div>
    </div>
@endsection