<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','alias','price','newPrice','qty_input','intro','image','keywords','description','cate_id'];


    public function cate() {
    	return $this->belongsTo('App\Category');
    }

    public function image_detail() {
    	return $this->hasMany('App\ImageDetail');
    }

	public function order_detail() {
    	return $this->hasMany('App\OrderDetail');
    }    
}
