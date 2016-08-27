<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Http\Requests\CateRequest;
use App\Http\Requests\EditCateRequest;
use Auth;

class CateController extends Controller
{
	public function getList() {
		$cates = Category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list', compact('cates'));
	}

    public function getAdd() {
    	$cates = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate.add', compact('cates'));
    }

    public function postAdd(CateRequest $request) {
    	//echo $request->sltParent;
    	$cate = new Category();
    	$cate->name = $request->txtCateName;
  		$cate->alias = changeTitle($request->txtCateName);
  		$cate->order = $request->txtOrder;
  		$cate->parent_id = $request->sltParent;
  		$cate->keywords = $request->txtKeywords;
  		$cate->description = $request->txtDescription;
  		$cate->save();
  		return redirect()->route('admin.cate.getDetail',$cate->id)->with(['flash_status'=>'success','flash_message'=>'Add Category Complete!']);
    }

    public function getDelete($id) {
      if (Auth::user()->id != 1) {
        return redirect()->back()->with(['flash_status'=>'danger','flash_message'=>'Access Denied for User!']);
      } else {
        Category::destroy($id);
        return redirect()->route('admin.cate.getList')->with(['flash_status'=>'success','flash_message'=>'Delete Category Complete!']);
      }
    }

    public function getEdit($id) {
    	$cates = Category::select('id','name','parent_id')->get()->toArray();
    	$cate = Category::find($id);
    	return view('admin.cate.edit', compact('cates','cate'));
    }

    public function postEdit($id,Request $request) {
    	$this->validate($request, [
    			'txtCateName'=>'required|unique:categories,name,'.$id,
          'txtOrder'=>'integer',
    		],
        [
          'txtCateName.required' => 'Please Inter Category Name!',
          'txtCateName.unique'=>'This Category Name Does Exists!',
          'txtOrder.integer'=>'Please Input Number on Oerder!'
        ]);
    	$cate = Category::find($id);
    	$cate->name = $request->txtCateName;
  		$cate->alias = changeTitle($request->txtCateName);
  		$cate->order = $request->txtOrder;
  		$cate->parent_id = $request->sltParent;
  		$cate->keywords = $request->txtKeywords;
  		$cate->description = $request->txtDescription;
  		$cate->save();
  		return redirect()->route('admin.cate.getDetail',$id)->with(['flash_status'=>'success','flash_message'=>'Update Category Complete!']);
    }

    public function getDetail($id) {
      $cates = Category::select('id','name','parent_id')->get()->toArray();
      $cate = Category::find($id);
      return view('admin.cate.detail', compact('cates','cate'));
    }
}
