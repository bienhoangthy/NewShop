<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\Comment;
use App\Product;
use App\Category;
use App\User;
use App\Customer;
use App\Province;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getDashboard() {
    	$today = Carbon::today()->toDateString();
    	$count_order = Transaction::where('status',1)->count();
    	$count_comment = Comment::where('view',1)->count();
    	$count_out_of_stock = Product::where('qty_input',0)->count();

    	$count_product_sale = 0;
    	$products = Product::select('price','newPrice')->get();
    	foreach ($products as $item) {
    		if ($item->price > $item->newPrice) {
    			$count_product_sale++;
    		}
    	}

    	$count_all_transaction = Transaction::all()->count();
    	$count_all_category = Category::all()->count();
    	$count_all_product = Product::all()->count();
    	$count_all_user = User::all()->count();
    	$count_all_customer = Customer::all()->count();
    	$total_all_guest = Customer::where('user_id','=',null)->count();
    	$count_all_comment = Comment::all()->count();
    	$count_all_province = Province::all()->count();

    	$transactions = Transaction::where('status','=',0)->get();
    	$total_amount = 0;
    	foreach ($transactions as $item) {
    		$total_amount = $total_amount + $item->amount;
    	}

    	$transaction_today = Transaction::where('status','=',0)->whereDate('updated_at', '=', Carbon::today()->toDateString())->get();
    	$total_amount_today = 0;
    	foreach ($transaction_today as $item) {
    		$total_amount_today = $total_amount_today + $item->amount;
    	}

    	$transaction_month = Transaction::where('status','=',0)->whereMonth('created_at', '=', date('m'))->get();
    	$total_amount_month = 0;
    	foreach ($transaction_month as $item) {
    		$total_amount_month = $total_amount_month + $item->amount;
    	}

    	return view('admin.dashboard.dashboard',compact('today','count_order','count_comment','count_out_of_stock','count_product_sale','count_all_transaction','count_all_category','count_all_product','count_all_user','count_all_customer','total_all_guest','count_all_comment','count_all_province','total_amount','total_amount_today','total_amount_month'));
    }
}
