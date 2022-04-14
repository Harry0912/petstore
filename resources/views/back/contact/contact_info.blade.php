@extends('back/layouts/main')

@section('contact_info')
<div class="container">
    <div class="row"><a href="/contact/table" class="col-2 btn btn-success">回上一頁</a></div><br>
    <form id="replyForm">
        <div class="row">
            <div class="col-2 bg-info bgblue"><label class="form-label" for="name">填表人</label></div>
            <div class="col-4"><input class="form-control" type="text" id="name" value="{{ $contact->name }}" readonly></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue"><label class="form-label" for="tel">聯絡電話</label></div>
            <div class="col-4"><input class="form-control" type="text" id="tel" value="{{ $contact->tel }}" readonly></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue"><label class="form-label" for="email">E-mail</label></div>
            <div class="col-4"><input class="form-control" type="text" id="email" name="email" value="{{ $contact->email }}" readonly></div>
        </div><br>
        <div class="row">
            <div class="col-2 bg-info bgblue"><label class="form-label" for="notes">留言內容</label></div>
            <div class="col-4"><input class="form-control" type="text" id="notes" value="{{ $contact->notes }}" readonly></div>
        </div><br>
        <div class="row">
            回覆內容 :
            <div class="col-6">
                <textarea class="form-control" name="content" rows="7"></textarea>
            </div>
        </div><br>
        <button class="col-2 btn btn-primary" type="submit">回覆訊息</button>
    </form>
</div>
@endsection