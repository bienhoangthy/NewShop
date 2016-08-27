<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
            'txtFullName'=>'required',
            'txtPhone'=>['required','regex:/(\\01|0)\\d{9}/',],
            'txtAddress'=>'required'
        ];
    }

    public function messages() {
        return [
            'txtFullName.required'=>'Vui lòng nhập Họ Tên!',
            'txtPhone.regex'=>'Vui lòng nhập đúng Số Điện Thoại!',
            'txtPhone.required'=>'Vui lòng nhập Số Điện Thoại!',
            'txtAddress.required'=>'Vui lòng nhập Địa Chỉ cụ thể!'
        ];
    }
}
