<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Request;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Category;
use App\Product;
use App\ImageDetail;
use File;

class ProductController extends Controller
{
    public function getList() {
    	$products = Product::select('id','name','price','qty_input','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.product.list', compact('products'));
    }

    public function getSale() {
        $products = Product::select('id','name','price','newPrice','image','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.sale', compact('products'));
    }

    public function getAdd() {
    	$cates = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.product.add', compact('cates'));
    }

    public function postAdd(ProductRequest $request) {
    	$image = $request->file('fImages');
    	$image_name = $image->getClientOriginalName();
    	$product = new Product();
    	$product->name = $request->txtName;
    	$product->alias = changeTitle($request->txtName);
    	$product->price = $request->txtPrice;
    	$product->newPrice = $request->txtPrice;
    	$product->qty_input = $request->txtQuantity;
    	$product->intro = $request->txtIntro;
    	$product->image = $image_name;
    	$product->keywords = $request->txtKeywords;
    	$product->description = $request->txtDescription;
    	$product->cate_id = $request->sltParent;
    	$product->save();

    	$product_id = $product->id;
    	$image->move("upload/product_img/$product_id",$image_name);

    	if ($request->fProductDetail) {
    		foreach ($request->fProductDetail as $file) {
    			$img_detail = new ImageDetail();
    			if (isset($file)) {
    				$img_detail->image = $file->getClientOriginalName();
    				$img_detail->product_id = $product_id;
    				$file->move("upload/product_img/$product_id/img_detail", $img_detail->image);
    				$img_detail->save();
    			}
    		}
    	}

    	return redirect()->route('admin.product.getDetail',$product->id)->with(['flash_status'=>'success','flash_message'=>'Add Product Complete!']);

    }

    public function getDelete($id) {
    	$img_details = ImageDetail::where('product_id','=',$id)->get()->toArray();
    	if (!empty($img_details)) {
    		foreach ($img_details as $item) {
    			File::delete("upload/product_img/$id/img_detail/".$item['image']);
    			//echo $item['image'];
    		}
    		if (is_dir("upload/product_img/$id/img_detail")) {
    			rmdir("upload/product_img/$id/img_detail");
    		}
    	}
    	$product = Product::find($id);
    	File::delete("upload/product_img/$id/".$product->image);
    	$product->delete();
    	if (is_dir("upload/product_img/$id")) {
    			rmdir("upload/product_img/$id");
    		}
    	
    	return redirect()->route('admin.product.getList')->with(['flash_status'=>'success','flash_message'=>'Delete Product Complete!']);
    }

    public function getEdit($id) {
    	$cates = Category::select('id','name','parent_id')->get()->toArray();
    	$product = Product::find($id);
    	$img_details = ImageDetail::where('product_id','=',$id)->get()->toArray();
    	return view('admin.product.edit', compact('cates','product','img_details'));
    }

    public function postEdit($id, Request $request) {
    	$this->validate($request,
    		[
    			'sltParent'=>'required',
	            'txtName'=>'required|unique:products,name,'.$id,
	            'txtPrice'=>'required|integer',
	            'txtQuantity'=>'required|integer',
	            'fImages'=>'image'
    		],[
    			'sltParent.required'=>'Please Choose Category!',
	            'txtName.required'=>'Please Input Product Name!',
	            'txtName.unique'=>'This Name Does Exists!',
	            'txtPrice.required'=>'Please Input Price!',
	            'txtPrice.integer'=>'Please enter the number on Price!',
	            'txtQuantity.required'=>'Please Input Quantity!',
	            'txtQuantity.integer'=>'Please enter the number on Quantity!',
	            'fImages.image'=>'This File Is Not Image'
    		]);

    	$product =Product::find($id);
    	$product->name = $request->txtName;
    	$product->alias = changeTitle($request->txtName);
    	$product->price = $request->txtPrice;
    	$product->qty_input = $request->txtQuantity;
    	$product->intro = $request->txtIntro;
    	$product->keywords = $request->txtKeywords;
    	$product->description = $request->txtDescription;
    	$product->cate_id = $request->sltParent;

    	$img_current = "upload/product_img/$id/".$product->image;
    	$img_new = $request->file('fImages');
    	if (!empty($img_new)) {
    		$image_name = $img_new->getClientOriginalName();
    		$product->image = $image_name;
    		$img_new->move("upload/product_img/$id",$image_name);
    		if (File::exists($img_current)) {
    			File::delete($img_current);
    		}
    	}

    	$product->save();

    	if ($request->fEditDetail) {
    		foreach ($request->fEditDetail as $file) {
    			$img_detail = new ImageDetail();
    			if (isset($file)) {
    				$img_detail->image = $file->getClientOriginalName();
    				$img_detail->product_id = $id;
    				$file->move("upload/product_img/$id/img_detail", $img_detail->image);
    				$img_detail->save();
    			}
    		}
    	}

    	return redirect()->route('admin.product.getDetail',$id)->with(['flash_status'=>'success','flash_message'=>'Edit Product Complete!']);

    }

    public function getDelete_img($id, Request $r) {
    	if ($r->ajax()) {
    		$img_detail = ImageDetail::find($id);
    		if (!empty($img_detail)) {
    			$product_id = $img_detail->product_id;
    			$img = "upload/product_img/$product_id/img_detail/".$img_detail->image;
    			if (File::exists($img)) {
    				File::delete($img);
    			}
    			$img_detail->delete();
    		}
    		return "ok";
    	}
    }

    public function saveSale(Request $request) {
        if ($request->ajax()) {
            $product = Product::find($request->idP);
            $product->newPrice = $request->priceSale;
            $product->save();
            return "ok";
        }
    }

    public function restorePrice($id) {
        $product = Product::find($id);
        $product->newPrice = $product->price;
        $product->save();
        return redirect()->route('admin.product.getSale')->with(['flash_status'=>'success','flash_message'=>'Restore Complete!']);
    }

    public function getListSale() {
        $products = Product::select('id','name','price','newPrice','image')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.listsale', compact('products'));
    }

    public function getDetail($id) {
    	$product = Product::find($id);
    	$img_details = ImageDetail::where('product_id','=',$id)->get()->toArray();
    	return view('admin.product.detail', compact('product','img_details'));
    }

    public function getOutofStock() {
        $products = Product::where('qty_input','<',1)->get()->toArray();
        return view('admin.product.out-of-stock', compact('products'));
    }
}
