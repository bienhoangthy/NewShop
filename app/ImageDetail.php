<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    protected $table = 'image_details';
    protected $fillable = ['image','product_id'];

    public function product() {
    	return $this->belongsTo('App\Product','product_id');
    }
}
