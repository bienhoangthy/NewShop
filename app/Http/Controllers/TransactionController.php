<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\OrderDetail;
use App\Customer;
use App\Ship;
use DB;

class TransactionController extends Controller
{
    public function getList() {
    	$transactions = Transaction::orderBy('id', 'DESC')->get();
    	return view('admin.transaction.list',compact('transactions'));
    }

    public function getListOrderDetail() {
    	$orderDetail = OrderDetail::orderBy('id', 'DESC')->get();
    	return view('admin.transaction.list-detail', compact('orderDetail'));
    }

    public function orderDetail($id) {
    	$transaction = Transaction::find($id);
    	$customer = DB::table('customers')->where('id',$transaction->customer_id)->first();
    	$orderDetails = OrderDetail::where('transaction_id','=',$id)->get()->toArray();
        $ship = DB::table('ships')->where('transaction_id',$id)->first();
    	return view('admin.transaction.transaction-detail',compact('transaction','customer','orderDetails','ship'));
    }

    public function sent($id) {
    	$transaction = Transaction::find($id);
    	$transaction->status = 0;
    	$transaction->save();
    	return redirect()->route('admin.transaction.orderDetail',$id)->with(['flash_status'=>'success','flash_message'=>'Being sent to Customer!']);
    }

    public function delay($id) {
    	$transaction = Transaction::find($id);
    	$transaction->status = 1;
    	$transaction->save();
    	return redirect()->route('admin.transaction.orderDetail',$id)->with(['flash_status'=>'success','flash_message'=>'Delay!']);
    }

    public function delete($id) {
    	Transaction::destroy($id);
    	return redirect()->route('admin.transaction.getList')->with(['flash_status'=>'success','flash_message'=>'Delete Transaction Complete!']);
    }

    public function ship(Request $request) {
        if ($request->ajax()) {
            $ship_old = DB::table('ships')->where('transaction_id',$request->idTran)->first();
            if (!empty($ship_old)) {
                $ship = Ship::find($ship_old->id);
                $ship->price_ship = $request->priceShip;
                $ship->transaction_id = $request->idTran;
                $ship->save();
                return "ok";
            } else {
                $ship = new Ship();
                $ship->price_ship = $request->priceShip;
                $ship->transaction_id = $request->idTran;
                $ship->save();
                return "ok";
            }
            
        }
    }
}
