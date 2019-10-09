<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    protected $table = 'orders_products';
    protected $fillable = ['order_id','user_id','product_id','product_name','product_price','product_quantity'];
}
