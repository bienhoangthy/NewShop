<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    protected $fillable = ['id'];

    public function customer() {
    	return $this->hasOne('App\Customer');
    }
}
