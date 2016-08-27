<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'txtUser'=>'required|unique:users,name',
            'txtPass'=>'required|min:6',
            'txtRePass'=>'required|same:txtPass',
            'txtEmail'=>'required|unique:users,email'
        ];
    }

    public function messages() {
        return [
            'txtUser.required'=>'Vui lòng nhập Tên Đăng Nhập!',
            'txtUser.unique'=>'Tên Đăng Nhập đã tồn tại!',
            'txtPass.required'=>'Vui lòng nhập Mật Khẩu!',
            'txtPass.min'=>'Mật Khẩu phải có ít nhất 6 ký tự!',
            'txtRePass.required'=>'Vui lòng nhập vào ô Nhập Lại Mật Khẩu!',
            'txtRePass.same'=>'Hai Mật Khẩu không trùng khớp!',
            'txtEmail.required'=>'Vui lòng nhập Email!',
            'txtEmail.unique'=>'Email đã tồn tại!'
        ];
    }  
}
