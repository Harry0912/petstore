@extends('back/layouts/main')

@section('news_table')
<div class="container">
    <div class="row">
        <a href="/news/add" class="col-1 btn btn-primary" style="margin-right:5px;">新增</a>
        <button id="btnDelete" class="col-1 btn btn-danger">刪除</button>
    </div><hr>
    <div class="row">
        @if(count($news) > 0)
            <table class="table table-primary table-striped table-bordered" style="vertical-align: middle;">
                <tr class="table-light">
                    <th class="col-1"><input class="form-check-input" id="checkAll" type="checkbox"></th>
                    <th class="col-3">標題</th>
                    <th class="col-4">簡述</th>
                    <th class="col-2">發布日期</th>
                    <th class="col-2"></th>
                </tr>
                @foreach($news as $key => $value)
                <tr>
                    <td><input class="form-check-input" type="checkbox" value="{{ $value->news_id }}"></td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $value->news_title }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $value->news_intro }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $value->news_time }}</td>
                    <td>
                        <a class="btn btn-primary" href="/news/edit/{{ $value->news_id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger" name="news_delete" href="/news/delete/{{ $value->news_id }}"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-primary" style="text-align:center;" role="alert">
                沒有任何消息!
            </div>
        @endif
    </div>
</div>
@endsection