<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class EditAttrRequest extends FormRequest
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
            'name'=>'required|unique:values,value,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Chưa nhập thuộc tính',
            'name.unique'=>'Đã tồn tại thuộc tính'
        ];
    }
}
