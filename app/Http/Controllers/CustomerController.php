<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;

class CustomerController extends Controller
{
    public function getList() {
    	$customers = Customer::all();
    	return view('admin.customer.list', compact('customers'));
    }

    public function getDelete($id) {
    	Customer::destroy($id);
    	return redirect()->route('admin.customer.getList')->with(['flash_status'=>'success','flash_message'=>'Delete Customer Complete!']);
    }

    public function totalGuest() {
    	$total_guest = Customer::where('user_id','=',null)->count();
    	return view('admin.customer.total-guest', compact('total_guest'));
    }
}
