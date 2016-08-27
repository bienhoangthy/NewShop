<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['status','customer_id','amount','message','created_at'];

    public function customer() {
    	return $this->belongsTo('App\Customer','customer_id');
    }

    public function order_detail() {
    	return $this->hasMany('App\OrderDetail');
    }
}
