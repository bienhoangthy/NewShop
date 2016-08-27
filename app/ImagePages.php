<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePages extends Model
{
    protected $table = 'image_pages';
    protected $fillable = ['page','image','filter'];
}
