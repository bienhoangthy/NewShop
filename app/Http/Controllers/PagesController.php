<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\ContactRequest;
use App\Category;
use App\Product;
use App\User;
use App\Province;
use App\Customer;
use App\Guest;
use App\OrderDetail;
use App\Transaction;
use App\Intro;
use App\Comment;
use App\ImagePages;
use App\Contact;
use App\Policy;
use Auth;
use Cart;
use DB;
use Mail;

class PagesController extends Controller
{
    public function index() {
    	$count_cart = Cart::count();
    	$cates = Category::select('id','name','alias','parent_id')->get()->toArray();
    	$new_products = Product::select('id','name','alias','price','newPrice','qty_input','image')->orderBy('id','DESC')->take(9)->get()->toArray();
    	$products = Product::select('id','name','alias','price','newPrice','image','cate_id')->orderBy('id','DESC')->get()->toArray();
        $index1 = ImagePages::find(1);
        $index2 = ImagePages::find(2);
        $index3 = ImagePages::find(3);
        $sale = ImagePages::find(15);
        $policy1 = Policy::find(1);
        $policy2 = Policy::find(2);
        $policy3 = Policy::find(3);
        $contact = Contact::find(1);
    	return view('front.index', compact('index1','index2','index3','sale','policy1','policy2','policy3','cates','new_products','products','count_cart','contact'));
    }

    public function intro() {
    	$count_cart = Cart::count();
        $intro = Intro::find(1);
        $image_header = ImagePages::find(4);
        $contact = Contact::find(1);
    	return view('front.intro',compact('contact','image_header','count_cart','intro'));
    }

    public function contact() {
    	$count_cart = Cart::count();
        $image_header = ImagePages::find(7);
        $contact = Contact::find(1);
    	return view('front.contact',compact('contact','image_header','count_cart'));
    }

    public function postContact(ContactRequest $request) {
        $cmt = new Comment();
        $cmt->name = $request->txtName_Contact;
        $cmt->email = $request->txtEmail_Contact;
        $cmt->message = $request->txtMessage;
        $cmt->view = 1;
        $cmt->save();

        $name = $request->txtName_Contact;
        $email = $request->txtEmail_Contact;
        $count_cart = Cart::count();
        $image_header = ImagePages::find(14);
        $contact = Contact::find(1);
        return view('front.thankscmt',compact('contact','image_header','count_cart','name','email'));
    }

    public function shop() {
    	$count_cart = Cart::count();
    	$cates = Category::select('id','name','alias','parent_id')->get()->toArray();
    	$all_products = Product::select('id','name','alias','price','newPrice','qty_input','image')->orderBy('id','DESC')->paginate(9);
        $image_header = ImagePages::find(5);
        $contact = Contact::find(1);
        $sale = ImagePages::find(15);
    	return view('front.shop',compact('contact','sale','image_header','cates','all_products','count_cart'));
    }

    public function sale() {
        $count_cart = Cart::count();
        $cates = Category::select('id','name','alias','parent_id')->get()->toArray();
        $all_products = Product::select('id','name','alias','price','newPrice','qty_input','image')->orderBy('id','DESC')->paginate(45);
        $image_header = ImagePages::find(6);
        $contact = Contact::find(1);
        $sale = ImagePages::find(15);
        return view('front.sale',compact('contact','sale','image_header','cates','all_products','count_cart'));
    }

    public function addCart($id ,Request $request) {
    	$qty = 1;
    	if (!empty($request->txtQty)) {
    		$qty = $request->txtQty;
    	}
    	$product = Product::find($id);
        if ($product['price'] > $product['newPrice']) {
            Cart::add($id,$product['name'],$qty,$product['newPrice'],['image'=>$product['image']]);
        } else {
            Cart::add($id,$product['name'],$qty,$product['price'],['image'=>$product['image']]);
        }
    	return redirect()->route('cart');
    }

    public function addCartajax(Request $request) {
    	if ($request->ajax()) {
    		$product = Product::find($request->id);
            if ($product['price'] > $product['newPrice']) {
                Cart::add($request->id,$product['name'],1,$product['newPrice'],['image'=>$product['image']]);
            } else {
                Cart::add($request->id,$product['name'],1,$product['price'],['image'=>$product['image']]);
            }
    		return "oke";
    	}
    }

    public function cart() {
    	$carts = Cart::content();
    	$count_cart = Cart::count();
    	$total = Cart::subtotal(0,"",".");
        $image_header = ImagePages::find(10);
        $contact = Contact::find(1);
    	return view('front.cart',compact('contact','image_header','count_cart','carts','total'));
    }

    public function delProductCart($rowId) {
    	Cart::remove($rowId);
    	return redirect()->route('cart');
    }

    public function updateProductCart(Request $r) {
    	if ($r->ajax()) {
    		$rowId = $r->rowId;
    		$qty = $r->qty;
            $product = Product::find($r->idP);
            if ($qty > $product->qty_input) {
                return "no";
            } else {
                Cart::update($rowId,$qty);
                return "ok";
            }
    	}
    }

    public function delCart() {
    	Cart::destroy();
    	return redirect()->route('cart');
    }

    public function checkout() {
    	$count_cart = Cart::count();
    	$carts = Cart::content();
		$total = Cart::subtotal(0,"",".");
		$provinces = Province::all();
        $image_header = ImagePages::find(11);
        $contact = Contact::find(1);
		if (Auth::check()) {
			$customer = DB::table('customers')->where('user_id',Auth::user()->id)->first();
		}
    	return view('front.checkout',compact('contact','image_header','carts','total','count_cart','customer','provinces'));
    }

    public function postCheckout(CustomerRequest $request) {
    	$carts = Cart::content();
		$total = Cart::subtotal(0,"","");
    	if (Auth::check()) {
    		$cus_current = DB::table('customers')->where('user_id',Auth::user()->id)->first();
	    	if (!empty($cus_current)) {
                $customer = Customer::find($cus_current->id);
                $customer->fullname = $request->txtFullName;
                $customer->province = $request->sltProvince;
                $customer->address = $request->txtAddress;
                $customer->tel = $request->txtPhone;
                $customer->save();

                $user = User::find(Auth::user()->id);
                $user->fullname = $request->txtFullName;
                $user->save();

                $transaction = new Transaction();
                $transaction->status = 1;
                $transaction->customer_id = $customer->id;
                $transaction->amount = $total;
                $transaction->message = $request->txtMessage;
                $transaction->save();

                foreach ($carts as $item) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->transaction_id = $transaction->id;
                    $orderDetail->product_id = $item->id;
                    $orderDetail->qty = $item->qty;
                    $orderDetail->amount = ($item->price) * ($item->qty);
                    $orderDetail->data = null;
                    $orderDetail->save();

                    $product = Product::find($item->id);
                    $product->qty_input = $product->qty_input - $item->qty;
                    $product->save();
                }

	    	} else {
	    		$customer = new Customer();
                $customer->fullname = $request->txtFullName;
                $customer->province = $request->sltProvince;
                $customer->address = $request->txtAddress;
                $customer->email = $request->txtEmail;
                $customer->tel = $request->txtPhone;
                $customer->user_id = Auth::user()->id;
                $customer->guest_id = null;
                $customer->save();

                $user = User::find(Auth::user()->id);
                $user->fullname = $request->txtFullName;
                $user->save();

                $transaction = new Transaction();
                $transaction->status = 1;
                $transaction->customer_id = $customer->id;
                $transaction->amount = $total;
                $transaction->message = $request->txtMessage;
                $transaction->save();

                foreach ($carts as $item) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->transaction_id = $transaction->id;
                    $orderDetail->product_id = $item->id;
                    $orderDetail->qty = $item->qty;
                    $orderDetail->amount = ($item->price) * ($item->qty);
                    $orderDetail->data = null;
                    $orderDetail->save();

                    $product = Product::find($item->id);
                    $product->qty_input = $product->qty_input - $item->qty;
                    $product->save();
                }
	    	}
    	} else {
    		$guest = new Guest();
    		$guest->save();

    		$customer = new Customer();
	    	$customer->fullname = $request->txtFullName;
	    	$customer->province = $request->sltProvince;
	    	$customer->address = $request->txtAddress;
	    	$customer->email = $request->txtEmail;
	    	$customer->tel = $request->txtPhone;
	    	$customer->user_id = null;
	    	$customer->guest_id = $guest->id;
	    	$customer->save();

	    	$transaction = new Transaction();
				$transaction->status = 1;
				$transaction->customer_id = $customer->id;
				$transaction->amount = $total;
				$transaction->message = $request->txtMessage;
				$transaction->save();

				foreach ($carts as $item) {
					$orderDetail = new OrderDetail();
					$orderDetail->transaction_id = $transaction->id;
					$orderDetail->product_id = $item->id;
					$orderDetail->qty = $item->qty;
					$orderDetail->amount = ($item->price) * ($item->qty);
					$orderDetail->data = null;
					$orderDetail->save();

                    $product = Product::find($item->id);
                    $product->qty_input = $product->qty_input - $item->qty;
                    $product->save();
				}
    	}
    	Cart::destroy();
    	$count_cart = Cart::count();
        $image_header = ImagePages::find(14);
        $contact = Contact::find(1);
        return view('front.checkout-complete',compact('contact','image_header','count_cart'));
    }


    public function cate($id) {
    	$count_cart = Cart::count();
    	$cates = Category::select('id','name','alias','parent_id')->get()->toArray();
    	$products = Product::where('cate_id',$id)->orderBy('id','DESC')->paginate(9);
    	$cate = Category::find($id);
        $image_header = ImagePages::find(9);
        $contact = Contact::find(1);
        $sale = ImagePages::find(15);
    	return view('front.category',compact('contact','sale','image_header','cates','products','cate','count_cart'));
    }

    public function product($id) {
    	$count_cart = Cart::count();
    	$product = Product::find($id);
        $shopping= Intro::find(2);
    	$cates = Category::select('id','name','alias','parent_id')->get()->toArray();
    	$product_cates = Product::select('id','name','alias','price','newPrice','qty_input','image','cate_id')->where('cate_id',$product['cate_id'])->take(5)->get()->toArray();
    	$img_details = Product::find($id)->image_detail->toArray();
        $image_header = ImagePages::find(8);
        $contact = Contact::find(1);
        $sale = ImagePages::find(15);
    	return view('front.product_detail',compact('contact','sale','image_header','cates','product','product_cates','img_details','count_cart','shopping'));
    }

    public function userinfo($id, $name) {
    	if (Auth::user()->id == $id) {
    		$user = User::find($id);
    		$count_cart = Cart::count();
    		$customer = DB::table('customers')->where('user_id',$id)->first();
    		$provinces = Province::all();
            $image_header = ImagePages::find(12);
            $contact = Contact::find(1);
    		return view('front.userinfo', compact('contact','image_header','count_cart','cates','customer','user','provinces'));
    	} else {
    		return view('front.errorpage');
    	}
    	
    }

    public function postUserinfo(CustomerRequest $request) {
    	$cus_current = DB::table('customers')->where('user_id',$request->txtId)->first();
    	if (!empty($cus_current)) {
            $cus = Customer::find($cus_current->id);
            $cus->fullname = $request->txtFullName;
            $cus->province = $request->sltProvince;
            $cus->address = $request->txtAddress;
            $cus->tel = $request->txtPhone;
            $cus->save();

            $user = User::find($request->txtId);
            $user->fullname = $request->txtFullName;
            $user->save();
            

            return redirect()->route('userinfo',[$request->txtId,$request->txtUser])->with(['flash_message'=>'Cập nhật thông tin thành công!']);
    	} else {
    		$customer = new Customer();
            $customer->fullname = $request->txtFullName;
            $customer->province = $request->sltProvince;
            $customer->address = $request->txtAddress;
            $customer->email = $request->txtEmail;
            $customer->tel = $request->txtPhone;
            $customer->user_id = $request->txtId;
            $customer->guest_id = null;
            $customer->save();

            $user = User::find($request->txtId);
            $user->fullname = $request->txtFullName;
            $user->save();
            

            return redirect()->route('userinfo',[$request->txtId,$request->txtUser])->with(['flash_message'=>'Cập nhật thông tin thành công!']);
    	}
    }


    public function historyCheckout() {
        if (Auth::check()) {
            $count_cart = Cart::count();
            $customer = DB::table('customers')->where('user_id',Auth::user()->id)->first();
            $image_header = ImagePages::find(13);
            $contact = Contact::find(1);
            if (isset($customer)) {
                $transactions = Transaction::where('customer_id','=',$customer->id)->get()->toArray();
                return view('front.history-checkout', compact('contact','image_header','count_cart','transactions'));
            }
        }
        return view('front.errorpage');
    }

    public function search(Request $request) {
        $count_cart = Cart::count();
        $cates = Category::select('id','name','alias','parent_id')->get()->toArray();
        $search = $request->txtSearch;
        $products = Product::where("name", "LIKE", "%$search%")->get();
        $image_header = ImagePages::find(5);
        $contact = Contact::find(1);
        $sale = ImagePages::find(15);
        return view('front.search-result', compact('contact','sale','image_header','count_cart','cates','search','products'));
    }

    public function mail(Request $request) {
        if (!empty($request->txtMail)) {
            $mail = $request->txtMail;
            Mail::send('front.mail.mail', [], function ($m) use ($mail){
                $m->from('thybien93@gmail.com', 'NewShop');
                $m->to($mail, "Quý Khách")->subject('Chào mừng bạn đến với NewShop!');
                });
            $count_cart = Cart::count();
            $image_header = ImagePages::find(14);
            $contact = Contact::find(1);
            return view('front.send-mail',compact('contact','image_header','count_cart'));
        } else {
            return redirect()->route('home');
        }

    }

    public function errorPage() {
        return view('front.errorpage');
    }
}
