<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponUsed extends Model
{
    protected $table = 'coupon_used';
    protected $fillable = ['user_id','coupon_code','remaining'];
}
