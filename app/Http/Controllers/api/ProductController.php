<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function store(ProductRequest $request)
    {
        $data = ProductModel::create([
            'type_id' => $request->type_id,
            'product_name' => trim($request->product_name),
            'product_intro' => trim($request->product_intro),
            'product_content' => trim($request->product_content),
            'on_sale' => ($request->on_sale)?'Y':'N',
            'product_price' => trim($request->product_price),
            'product_sale' => trim($request->product_sale),
            'product_image' => ($request->product_image)?$request->product_image->store('upload/product', 'public'):null
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = ProductModel::find($id);

        $data->type_id = $request->type_id;
        $data->product_name = trim($request->product_name);
        $data->product_intro = trim($request->product_intro);
        $data->product_content = trim($request->product_content);
        $data->on_sale = ($request->on_sale=='on')?'Y':'N';
        $data->product_price = trim($request->product_price);
        $data->product_sale = $request->product_sale;
        if ($request->product_image) $data->product_image = $request->product_image->store('upload/product', 'public');
        $data->save();

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = ProductModel::destroy($id);

        return response()->json($data, 204);
    }
}
