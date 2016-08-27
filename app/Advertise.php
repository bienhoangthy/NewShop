<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $table = 'advertises';
    protected $fillable = ['name','url','width','height','link','postion','order','status'];
}
