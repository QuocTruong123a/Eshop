<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:products',
            'price'=>'required|integer',
            'feature_image_path'=>'sometimes',
            'content'=>'sometimes',
            'category_id'=>'sometimes',
            'feature_image_name'=>'sometimes'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Chưa nhập tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'price.required'=>'Chưa nhập giá tiền',
            'price.integer'=>'Giá tiền phải là số',
        ];
    }
}
