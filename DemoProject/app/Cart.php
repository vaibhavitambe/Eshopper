<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['product_id','prod_name','prod_price','prod_quantity','email','session_id'];
}
