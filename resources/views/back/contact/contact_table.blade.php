@extends('back/layouts/main')

@section('contact_table')
<div class="container">
    @if (count($contact) > 0)
    <div class="row">
        <table class="table table-primary table-striped table-bordered" style="vertical-align: middle;">
            <tr class="table-light">
                <th class="col-1"><input class="form-check-input" id="checkAll" type="checkbox"></th>
                <th class="col-2">填表人</th>
                <th class="col-2">電話</th>
                <th class="col-5">E-mail</th>
                <th class="col-2"></th>
            </tr>
            @foreach($contact as $key => $value)
            <tr>
                <td><input class="form-check-input" type="checkbox" value="{{ $value->id }}"></td>
                <td class="text-truncate" style="max-width: 150px;">{{ $value->name }}</td>
                <td class="text-truncate" style="max-width: 150px;">{{ $value->tel }}</td>
                <td class="text-truncate" style="max-width: 150px;">{{ $value->email }}</td>
                <td>
                    <a class="btn btn-primary" href="/contact/show/{{ $value->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-danger" name="contact_delete" href="/contact/delete/{{ $value->id }}"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="alert alert-primary" style="text-align:center;" role="alert">
        沒有任何資料!
    </div>
    @endif
</div>
@endsection