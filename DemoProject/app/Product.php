<?php

namespace App;
use Auth;
use Session;
use App\Cart;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','sku','short_description','long_description','price','special_price','special_price_from','special_price_to','status','quantity','meta_title','meta_description','meta_keywords','is_featured','category_id'];

    public function childs() 
    {
        return $this->hasMany('App\ProductImage') ;
    }

    public function association()
    {
    	return $this->belongsToMany(Attribute::class,'product_id','product_attribute_id','product_attribute_value_id');
    }

    public static function getProduct()
    {
        return $pro = Product::with('childs')->orderBy('id','DESC')->paginate(2);
    }

    public static function cartCount()
    {
        if(Auth::check())
        {
            $email = Auth::User()->email;
            $cartCount = Cart::where('email',$email)->sum('prod_quantity');
        }
        else
        {
            $session_id = Session::get('session_id');
            $cartCount = Cart::where('session_id',$session_id)->sum('prod_quantity');
        }
        return $cartCount;
    }
    
}
