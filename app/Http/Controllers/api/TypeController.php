<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeModel;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    public function store(TypeRequest $request)
    {
        $data = TypeModel::create([
            'type_name' => $request->type_name
        ]);

        return response()->json($data, 201);
    }

    public function update()
    {
        $type_id = $_POST['type_id'];
        $type_name = $_POST['type_name'];
        $type = array();
        foreach ($type_name as $key => $value) {
            $type[] = ['type_id' => $type_id[$key], 'type_name' => $value];
        }

        $data = TypeModel::upsert($type, ['type_id'], ['type_name']);

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        TypeModel::destroy($id);

        return response(null, 204);
    }
}
