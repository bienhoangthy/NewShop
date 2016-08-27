<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'txtName_Contact'=>'required',
            'txtEmail_Contact'=>'required',
            'txtMessage'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'txtName_Contact.required'=>'Vui lòng nhập Họ Tên',
            'txtEmail_Contact.required'=>'Vui lòng nhập Email',
            'txtMessage.required'=>'Vui lòng nhập nhận xét'
        ];
    }
}
