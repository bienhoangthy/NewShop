<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtFullname'=>'required',
            'txtPass'=>'required|min:6',
            'txtRePass'=>'required|same:txtPass',
            'txtEmail'=>'required|unique:users,email'
        ];
    }

    public function messages() {
        return [
            'txtUser.required'=>'Please Input UserName!',
            'txtUser.unique'=>'Username Already Exists!',
            'txtFullname.required'=>'Please Input Fullname!',
            'txtPass.required'=>'Please Input Password!',
            'txtPass.min'=>'Password Be At Least 6 Characters',
            'txtRePass.required'=>'Please Input Re-Password!',
            'txtRePass.same'=>'Two Password Does Not Match!',
            'txtEmail.required'=>'Please Input Email!',
            'txtEmail.unique'=>'Email Already Exists!'
        ];
    }    
}
