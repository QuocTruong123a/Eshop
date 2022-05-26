<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSlider extends FormRequest
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
            'name'=>'required|unique:sliders',
            'description'=>'sometimes',
            'image_path'=>'sometimes',
            'image_name	'=>'sometimes'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Chưa nhập tên slider',
            'name.unique'=>'Tên slider đã tồn tại',
        ];
    }
}
