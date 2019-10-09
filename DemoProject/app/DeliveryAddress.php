<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
     protected $table = 'delivery_address';
    protected $fillable = ['user_id','email','name','address','city','state','country','pincode'];
}
