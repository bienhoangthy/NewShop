<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Province;
use App\Http\Requests\ProvinceRequest;

class ProvinceController extends Controller
{
    public function getList() {
    	$provinces = Province::select('id','name')->get()->toArray();
    	return view('admin.province.list', compact('provinces'));
    }

    public function getAdd() {
    	return view('admin.province.add');
    }

    public function postAdd(ProvinceRequest $request) {
    	$province = new Province();
    	$province->name = $request->txtProvince;
    	$province->save();
    	return redirect()->route('admin.province.getList')->with(['flash_status'=>'success','flash_message'=>'Add Province Complete!']);
    }

    public function getDelete($id) {
    	Province::destroy($id);
    	return redirect()->route('admin.province.getList')->with(['flash_status'=>'success','flash_message'=>'Delete Province Complete!']);
    }
}
