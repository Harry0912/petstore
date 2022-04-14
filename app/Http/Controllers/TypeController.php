<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeModel;

class TypeController extends Controller
{
    public function index()
    {
        $data = TypeModel::all();

        return view('back/type/type_table', [
            'type' => $data
        ]);
    }
}
