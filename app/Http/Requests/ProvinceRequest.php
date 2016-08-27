<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProvinceRequest extends Request
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
            'txtProvince'=>'required|unique:provinces,name'
        ];
    }

    public function messages() {
        return [
            'txtProvince.required'=>'Please Input Province Name!',
            'txtProvince.unique'=>'This Province Does Exists!'
        ];
    }
}
