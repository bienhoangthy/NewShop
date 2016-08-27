<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $table = 'ships';
    protected $fillable = ['id','price_ship','transaction_id'];

    public function transaction() {
    	return $this->hasOne('App\Transaction');
    }
}
