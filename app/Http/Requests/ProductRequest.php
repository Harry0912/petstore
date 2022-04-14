<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_id' => 'required|integer',
            'product_name' => 'required',
            'product_intro' => 'nullable|string',
            'product_content' => 'nullable|string',
            'on_sale' => '',
            'product_price' => 'required|numeric',
            'product_sale' => 'nullable|numeric',
            'product_image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }
}
