@extends('back/layouts/main')

@section('news_table')
<div class="container">
    <div class="row">
        <a href="/news/add" class="col-1 btn btn-primary">新增</a>
        <button class="col-1 btn btn-danger">刪除</button>
    </div><hr>
    <div class="row">
        <table class="table table-primary table-striped table-bordered">
            <tr class="table-light">
                <th class="col-1"><input class="form-check-input" type="checkbox"></th>
                <th class="col-3">標題</th>
                <th class="col-5">簡述</th>
                <th class="col-2">發布日期</th>
                <th class="col-1"></th>
            </tr>
            @foreach($news as $key => $value)
            <tr>
                <td><input class="form-check-input" type="checkbox"></td>
                <td class="text-truncate" style="max-width: 150px;">{{ $value->news_title }}</td>
                <td class="text-truncate" style="max-width: 150px;">{{ $value->news_intro }}</td>
                <td class="text-truncate" style="max-width: 150px;">{{ $value->news_time }}</td>
                <td>
                    <a href="news/edit/{{ $value->news_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="news/delete/{{ $value->news_id }}"><i class="fa-solid fa-trash-can"></i></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection