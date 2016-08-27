<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'sltParent'=>'required',
            'txtName'=>'required|unique:products,name',
            'txtPrice'=>'required|integer',
            'txtQuantity'=>'required|integer',
            'fImages'=>'required|image'
        ];
    }

    public function messages() {
        return [
            'sltParent.required'=>'Please Choose Category!',
            'txtName.required'=>'Please Input Product Name!',
            'txtName.unique'=>'This Name Does Exists!',
            'txtPrice.required'=>'Please Input Price!',
            'txtPrice.integer'=>'Please enter the number on Price!',
            'txtQuantity.required'=>'Please Input Quantity!',
            'txtQuantity.integer'=>'Please enter the number on Quantity!',
            'fImages.required'=>'Please Choose Image!',
            'fImages.image'=>'This File Is Not Image'
        ];
    }
}
