@extends('front/layouts/main')

@section('contact')
    <div class="row">
        <div class="col-3">
            <h3>{{ $data->title }}</h3><br>
            <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $data->tel }}</p>
            <p><i class="fa fa-fax" aria-hidden="true"></i> {{ $data->fax }}</p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> {{ $data->email }}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $data->address }}</p>
        </div>
        <div class="col-1"></div>
        <div class="col-8">
            <h3>留言給我們</h3><br>
            <form class="row g-3" id="contactForm">
                <div class="col-6">
                    <label class="form-label" for="name">填表人<span> *</span></label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="col-6">
                    <label class="form-label" for="tel">聯絡電話<span> *</span></label>
                    <input class="form-control" type="text" name="tel" id="tel" required>
                </div>
                <div class="col-12">
                    <label class="form-label" for="email">E-mail<span> *</span></label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="col-12">
                    <label class="form-label" for="notes">留言內容<span> *</span></label>
                    <textarea class="form-control" name="notes" id="notes" rows="7" required></textarea>
                </div>
                <button type="submit" class="col-1 btn btn-primary">送出</button>
            </form>
        </div>
    </div>
@endsection