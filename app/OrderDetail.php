<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['transaction_id','product_id','qty','amount','data'];

    public function product() {
    	return $this->belongsTo('App\Product','product_id');
    }

    public function transaction() {
    	return $this->belongsTo('App\Transaction','transaction_id');
    }
}
