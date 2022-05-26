<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMenu extends FormRequest
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
            'name'=>'required|unique:menus',
            'parent_id' =>'sometimes'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Chưa nhập tên menu',
            'name.unique'=>'Tên menu đã tồn tại'
        ];
    }
}
