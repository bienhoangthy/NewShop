<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['fullname','province','address','email','tel','user_id','guest_id','created_at'];

    public function user() {
    	return $this->belongsTo('App\User','user_id');
    }


    public function guest() {
    	return $this->belongsTo('App\Guest','guest_id');
    }

    public function transaction() {
    	return $this->hasMany('App\Transaction');
    }
}
