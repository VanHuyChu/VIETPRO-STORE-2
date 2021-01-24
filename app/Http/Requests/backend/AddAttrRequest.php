<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class AddAttrRequest extends FormRequest
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

    public function rules()
    {
        return [
            'attr_name'=>'required|unique:attributes,name'
        ];
    }
    public function messages()
    {
        return [
            'attr_name.required'=>'Chưa nhập thuộc tính!',
            'attr_name.unique'=>'Thuộc tính đã tồn tại'
        ];
    }
}
