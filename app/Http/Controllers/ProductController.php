<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\TypeModel;

class ProductController extends Controller
{
    public function type_info()
    {
        $type = TypeModel::all();
        $total = 0;
        foreach ($type as $key => $value) {
            $count = ProductModel::where('type_id', $value->type_id)->get()->count();
            $type[$key]['count'] = $count;
            $total += $count;
        }

        return array(collect($type), $total);

    }

    public function index($type_id = 0)
    {
        if ($type_id > 0) {
            $data = ProductModel::where('type_id', $type_id)->orderBy('product_id', 'desc')->get();
        } else {
            $data = ProductModel::orderBy('product_id', 'desc')->get();
        }

        $type = $this->type_info();

        return view('front/product/product_list', [
            'product' => $data,
            'type' => $type[0],
            'total' => $type[1]
        ]);
    }

    public function create()
    {
        $data = TypeModel::all();

        return view('back/product/product_info', [
            'type' => $data
        ]);
    }

    public function edit($id)
    {
        $data = ProductModel::find($id);
        $type = TypeModel::all();

        return view('back/product/product_info', [
            'product' => $data,
            'type' => $type
        ]);
    }

    public function show($id)
    {
        $data = ProductModel::with('type')->find($id);
        $type = $this->type_info();

        return view('front/product/product_show', [
            'product' => $data,
            'type' => $type[0],
            'total' => $type[1]
        ]);
    }

    public function table()
    {
        $data = ProductModel::orderBy('product_id', 'desc')->get();

        return view('back/product/product_table', [
            'product' => $data
        ]);
    }

    public function search($keyword = '')
    {
        $keyword = trim($keyword);
        if ($keyword == '') {
            $data = ProductModel::orderBy('product_id', 'desc')->get();
        } else {
            $data = ProductModel::where('product_name', 'like', '%'.$keyword.'%')->orderBy('product_id', 'desc')->get();
        }
        
        $type = $this->type_info();

        return view('front/product/product_list', [
            'product' => $data,
            'type' => $type[0],
            'total' => $type[1]
        ]);
    }
}
