<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','email','name','address','city','state','country','pincode','shipping_charges','coupon_code','order_status','payment_method','grand_total'];

    public function userOrders()
    {
    	return $this->hasMany('App\OrdersProduct');
    }

    public static function getOrderDetails($order_id)
    {
    	$getOrderDetails = Order::where('id',$order_id)->first();
    	return $getOrderDetails;
    }
}
