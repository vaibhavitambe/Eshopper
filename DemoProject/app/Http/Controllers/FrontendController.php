<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Banner;
use App\Category;
use App\ProductCategory;
use App\Product;
use App\ProductImage;
use App\User;
use App\Attributevalue;
use App\Attribute;
use App\ProductAssoc;
use App\Coupon;
use App\CouponUsed;
use App\DeliveryAddress;
use App\Address;
use App\Cart;
use App\Order;
use App\OrdersProduct;
use App\Wishlist;
use App\NewsLetter;
use App\ContactUs;
use App\Cms;
use Auth;
use DB;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
    	$banners = Banner::getBanner();
        $categ = Category::getCategory();
       	$productAll = Product::getProduct();
    	return view('frontend.index')->with(compact('banners','categ','productAll'));
    }

    public function producturl($url)
    {
        $banners = Banner::getBanner();
        $categ = Category::getCategory();
        $product = Product::with('childs')->get();
        $countCategory = Category::where(['url'=>$url])->count();
        if($countCategory==0)
        {
            return view('frontend.404');
        }
        $categoryDetails = Category::where(['url'=>$url])->first();
        if($categoryDetails->parent_id == 0)
        {
            $subCategories = Category::where(['parent_id' => $categoryDetails->id])->get();
            foreach ($subCategories as $subcat)
            {
                $cat_ids[] = $subcat->id.",";
            }
            $productsAll = Product::whereIn('category_id',$cat_ids)->get();
            $productsAll = json_decode(json_encode($productsAll));
        }
        else
        {
            $productsAll = Product::where(['category_id' => $categoryDetails->id])->get();
        }
        return view('frontend.listing')->with(compact('categoryDetails','banners','categ','productsAll','product'));  
    }

    public function productid($id)
    {
        $banners = Banner::getBanner();
        $categ = Category::getCategory();
        $img = ProductImage::with('product')->get();
        $prod = Product::with('childs')->get();
        $productDetails = Product::with('childs')->where('id',$id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        $user = User::find($id);
        return view('frontend.details')->with(compact('productDetails','banners','categ','prod','img'));
    }

    public function login(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
    		{
                Session::put('frontSession',$data['email']);
    			return redirect('Eshopper');
    		}
    		else 
            {
    			return redirect()->back()->with('flash_message_error','Invalid Username or password!!!');
    		}
    	}
    }

    public function userLoginRegister()
    {
       return view('frontend.login_register');
    }


    public function register(Request $request)
    {
    	if($request->isMethod('post'))
        {
    	   $data = $request->all();
    	   $usersCount = User::where('email',$data['email'])->count();

    		if($usersCount>0)
            {
    		    return redirect()->back()->with('flash_message_error','Email already exists..!!!');
    		}
    		else
            {
    			$user = new User();
    			$user->firstname = $data['name'];
    			$user->email = $data['email'];
    			$user->password = bcrypt($data['password']);
    			$user->save();

                $email = $data['email'];

                $messageData = [
                'firstname'=>$data['name'],
                'email'=>$data['email'],
                'password'=>$data['password']
                ];

                Mail::send('emails.register',$messageData,function($message)use($email){
                $message->to($email)->subject('Registration login credentials from E-com Website');
                });

                $emailid = "vaibhavitambe95@gmail.com";

                $Data = [
                'firstname'=>$data['name'],
                'email'=>$data['email']
                ];

                Mail::send('emails.register-admin',$Data,function($message)use($emailid){
                $message->to($emailid)->subject('Registration login credentials from E-com Website');
                });

    			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
    			{
                    Session::put('frontSession',$data['email']);
    				return redirect('Eshopper')->with(compact('emailid'));
    			}
                
            }
    	}
    	
    }

    public function chkUserPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password))
        {
            echo "true"; die;
        }
        else
        {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request)
    {
        if($request->isMethod('post'))
        {
           $data = $request->all();
           $old_pwd = User::where('id',Auth::User()->id)->first();
           $current_pwd = $data['current_pwd'];
           if(Hash::check($current_pwd,$old_pwd->password))
           {
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('flash_message_success','current updated successfully');
           }
           else
           {
                return redirect()->back()->with('flash_message_error','current password is incorrect');
           }
        }
    }

    public function logout()
    {
    	Auth::logout();
        Session::forget('frontSession');
    	return redirect('Eshopper');
    }


    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0)
            {
                echo "false";
            }
            else
            {
                echo "true"; die;
        }
    }

    public function forgotPassword(Request $request)
    {
        if($request->isMethod('post'))
        {
           $data = $request->all();
            $usersCount = User::where('email',$data['email'])->count();
            if($usersCount == 0)
            {
                return redirect()->back()->with('flash_message_error','Email does not exists..!!!');
            }
            $userDetails = User::where('email',$data['email'])->first();
            $random_password = str_random(8); 
            $new_password = bcrypt($random_password); 

            User::where('email',$data['email'])->update(['password'=>$new_password]);

            $email = $data['email'];
            $messageData = [
                'email' => $email,
                'password' => $random_password
            ];
            Mail::send('emails.forgot_password',$messageData,function($message)use($email){
                $message->to($email)->subject('New Password - Eshopper Website');
            });
            return redirect('login-register')->with('flash_message_success','Please check email for new password');
        }
        return view('frontend.forgot_password');
    }


    public function account(Request $request)
    {
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        if($request->isMethod('post'))
        {
           $data = $request->all();
           $user = User::find($user_id);
           $user->firstname = $data['name'];
           $user->email = $data['email'];
           $user->save();
           return redirect()->back()->with('flash_message_suucess','Your account details has been updated.');
        }
        return view('frontend.account')->with(compact('user_id','userDetails'));
    }


    public function addtocart(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        if(empty(Auth::User()->email))
        {
            $data['email'] = '';
        }
        else
        {
            $data['email'] = Auth::User()->email;
        }

        $session_id = Session::get('session_id');
        if(!isset($session_id))
        {
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }

        $countProducts = Cart::where(['product_id'=>$data['product_id'],'session_id'=>$session_id])->count();

        if($countProducts>0)
        {
            return redirect()->back()->with('flash_message_error','Product already exists in cart');
        }
        else
        {
            Cart::insert(['product_id'=>$data['product_id'],'prod_name'=>$data['product_name'],'prod_price'=>$data['product_price'],'prod_quantity'=>$data['product_quantity'],'email'=>$data['email'],'session_id'=>$session_id]);
        }
        
        return redirect('cart')->with('flash_message_success','Product has been added to cart');
    }

    public function cart()
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        $session_id = Session::get('session_id');
        if(Auth::check())
        {
            $email = Auth::User()->email;
            $usercart = Cart::where(['email'=>$email])->get();
        }
        else
        {
            Cart::where(['session_id'=>$session_id])->update(['email'=>$userDetails->email]);
            $usercart = Cart::where(['session_id'=>$session_id])->get();
        }
        
        foreach ($usercart as $key => $product) 
        {
            $productDetails = Product::where('id',$product->product_id)->first();
            $image = ProductImage::where('product_id',$productDetails->id)->first();
            $usercart[$key]->image = $image->image_name;
            
        }
        return view('frontend.cart')->with(compact('usercart','productDetails'));
    }


    public function deleteCartProduct($id)
    {
        Cart::where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success','Product has been deleted');
    }

    public function updateCartQuantity($id, $prod_quantity)
    {
        Cart::where('id',$id)->increment('prod_quantity',$prod_quantity);
        return redirect('cart');
    }

    public function applyCoupon(Request $request)
    {
        
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        $data = $request->all();
        $userId = Auth::User()->id;
        $couponCount = Coupon::where('code', $data['coupon'])->count();
        if ($couponCount == 0) 
        {
            return redirect()->back()->with('flash_message_error', 'Invalid coupon code');
        } 
        else 
        {
            $couponDetails = Coupon::where('code', $data['coupon'])->first();
            $couponUsedDetails = CouponUsed::where([
                ['user_id', '=', $userId],
                ['coupon_code', '=', $couponDetails->code]
            ])->first();

            if ($couponDetails->no_of_uses == 0) 
            {
                return redirect()->back()->with('flash_message_error', 'Coupon is not Available');

            } 
            else 
            {
                $session = Session::get('session_id');
                $userCart = Cart::where('session_id', $session)->get();

                if(Auth::check())
                {
                    $email = Auth::User()->email;
                    $usercart = Cart::where(['email'=>$email])->get();
                }
                else
                {
                    $session_id = Session::get('session_id');
                    Cart::where(['session_id'=>$session_id])->update(['email'=>$userDetails->email]);
                    $usercart = Cart::where(['session_id'=>$session_id])->get();
                }

                $total_amount = 0;
                foreach ($usercart as $item) 
                {
                    $total_amount = $total_amount + ($item->prod_price*$item->prod_quantity);

                }

                if(empty($couponUsedDetails->id)) 
                {

                    $available_coupon = $couponDetails->no_of_uses;
                    $couponAmount = $total_amount * ($couponDetails->percent_off / 100);
                     
                    $remCoupon = $available_coupon - 1;
                    CouponUsed::insert(['user_id' => $userId, 'coupon_code' => $data['coupon'], 'remaining' => $remCoupon]);


                } 
                else if ($couponUsedDetails->remaining == 0) 
                {
                    return redirect()->back()->with('flash_message_error', 'All Coupons is Already used');
                } 
                else 
                {
                    $available_coupon = $couponUsedDetails->remaining;
                    $couponAmount = $total_amount * ($couponDetails->percent_off / 100);
                   
                   
                    $remCoupon = $available_coupon - 1;

                    $couponUsedDetails->user_id = $userId;
                    $couponUsedDetails->coupon_code = $data['coupon'];
                    $couponUsedDetails->remaining = $remCoupon;
                    $couponUsedDetails->save();
                    
                }

                Session::put('CouponAmount', $couponAmount);
                Session::put('CouponCode', $data['coupon']);
               

                   
                return redirect()->back()->with('flash_message_success', 'Discount Coupon is applied successfully.You are availing discount');
            }

        }
    }
    

    public function checkout(Request $request)
    {
        $user_id = Auth::User()->id;
        $email = Auth::User()->email;
        $userDetails = User::find($user_id);
        $address = Address::where('user_id',$user_id)->first();
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();

        $shippingDetails = array();

        if($shippingCount>0)
        {
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        $session_id = Session::get('session_id');
        

        if($request->isMethod('post'))
        {
            $data = $request->all();   
            if((empty($data['billing_name'])) || (empty($data['billing_address1'])) || (empty($data['billing_address2'])) || (empty($data['billing_city'])) || (empty($data['billing_state'])) || (empty($data['billing_country'])) || (empty($data['billing_pincode'])) || (empty($data['shipping_name'])) || (empty($data['shipping_address1'])) || (empty($data['shipping_address2'])) || (empty($data['shipping_city'])) || (empty($data['shipping_state'])) || (empty($data['shipping_country'])) || (empty($data['shipping_pincode'])))
            {
                return redirect()->back()->with('flash_message_error','Please fill all the fields');
            }

            Address::where('id',$user_id)->update(['address1'=>$data['billing_address1'],'address2'=>$data['billing_address2'],'city'=>$data['billing_city'],'state'=>$data['billing_state'],'country'=>$data['billing_country'],'pincode'=>$data['billing_pincode']]);


            if($shippingCount>0)
            {
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address1'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],'pincode'=>$data['shipping_pincode']]);
            }
            else
            {
                $shipping = new DeliveryAddress;
                $shipping->user_id = $user_id;
                $shipping->email = $userDetails->email;
                $shipping->name = $data['shipping_name'];;
                $shipping->address = $data['shipping_address1'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->country = $data['shipping_country'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->save();
            }  
            return redirect('order-review');
        }      
       
            return view('frontend.checkout')->with(compact('userDetails','address','user_id','shippingCount','shippingDetails'));   
    }


    public function address(Request $request)
    {
        $addr = Address::get();
        $user_id = Auth::User()->id;
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $address = new Address();
            $address->user_id = $user_id;
            $address->address1 = $data['address1'];
            $address->address2 = $data['address2'];
            $address->city = $data['city'];
            $address->state = $data['state'];
            $address->country = $data['country'];
            $address->pincode = $data['pincode'];
            $address->save();

            return redirect()->back()->with('flash_message_success','Address has been added.');
    }
        return view('frontend.address')->with(compact('user_id','addr'));
    }

    public function deleteAddress($id)
    {
        $add = Address::where('id',$id)->delete();
        return redirect('address')->with('flash_message_success','Product has been deleted')->with(compact('add'));
    }

    public function contactUs(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $email = "vaibhavitambe95@gmail.com";

            $contact = new ContactUs;
            $contact->name = $data['name'];
            $contact->email = $data['email'];
            $contact->contact_no = $data['contact_no'];
            $contact->message = $data['message'];
            $contact->save();

            $messageData = [
                'name'=>$data['name'],
                'email'=>$data['email'],
                'contact_no'=>$data['contact_no'],
                'messages'=>$data['message']
            ];

            Mail::send('emails.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject('Enquiry from E-com Website');
            });
            
            return redirect()->back()->with('flash_message_success','Thanks for your enquiry');
        }
        return view('frontend.contact-us');
    }


    public function addtoWishtList(Request $request)
    {
        $data = $request->all();
        $email = Auth::User()->email;
        $countProducts = Wishlist::where(['product_id'=>$data['product_id'],'email'=>$email])->count();

        if($countProducts>0)
        {
            return redirect()->back()->with('flash_message_error','Product already exists in Wishlist');
        }
        else
        {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::User()->id;
            $wishlist->product_id = $data['product_id'];
            $wishlist->email = $email;
            $wishlist->save();
        }

        return redirect('wishlist')->with('flash_message_success','Product has been added to wishlist');
       
    }


    public function wishtList(Request $request)
    {
        $user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        if(Auth::check())
        {
            $email = Auth::User()->email;
            $usercart = Wishlist::where(['email'=>$email])->get();
        }

        foreach ($usercart as $key => $product) 
        {
            $productDetails = Product::where('id',$product->product_id)->first();
            $image = ProductImage::where('product_id',$productDetails->id)->first();
            $usercart[$key]->image = $image->image_name;
            $usercart[$key]->product_name = $productDetails->name;
            $usercart[$key]->product_sku = $productDetails->price;
            $usercart[$key]->product_price = $productDetails->price;
            
        }
        return view('frontend.wishlist')->with(compact('usercart','productDetails'));
    }

    public function addWishlistProduct($id, Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $email=Auth::User()->email;
        $user_id=Auth::User()->id;
        $session = Session::get('session_id');
        $getWishlistDetails = Wishlist::where('id', $id)->first();
         $getProduct = Product::where('id', $getWishlistDetails->product_id)->first();
         $countProduct = Cart::where(['product_id' => $getProduct->id,'email'=>$email])->count();
        if ($countProduct > 0)
        {
           return redirect()->back()->with('flash_message_error', 'Product already exists in the cart');
        } 
        else 
        {
            Cart::insert(['product_id'=>$getProduct->id,'prod_name'=>$getProduct->name,'prod_price'=>$getProduct->price,'prod_quantity'=>$getProduct->quantity,'email'=>$email,'session_id'=>$session]);
            wishlist::where('product_id',$getProduct->id)->delete();
        }
        return redirect('wishlist')->with('flash_message_success', 'Product has been moved to cart|');
    }


    public function deleteWishlistProduct($id)
    {
       
        Wishlist::where('id',$id)->delete();
        return redirect('wishlist')->with('flash_message_success','Product has been deleted');
    }

    public function orderReview()
    {
        $user_id = Auth::User()->id;
        $email = Auth::User()->email;
        $address = Address::where('user_id',$user_id)->first();
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();

        $usercart = Cart::where(['email'=>$email])->get();
            foreach ($usercart as $key => $product) 
        {
            $productDetails = Product::where('id',$product->product_id)->first();
          
            $image = ProductImage::where('product_id',$productDetails->id)->first();
            
            $usercart[$key]->image = $image->image_name;
            
        }

        return view('frontend.order-review')->with(compact('userDetails','shippingDetails','address','usercart'));
    }


    public function placeOrder(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $user_id = Auth::User()->id;
            $email = Auth::User()->email;

            if(empty(Session::get('CouponCode')))
            {
                $coupon_code = '';
            }
            else
            {
                $coupon_code = Session::get('CouponCode');
            }

            if(empty(Session::get('CouponAmount')))
            {
                $coupon_amount = '';
            }
            else
            {
                $coupon_amount = Session::get('CouponAmount');
            }

            $shippingDetails = DeliveryAddress::where(['email'=> $email])->first();

            $order = new Order;
            $order->user_id = $user_id;
            $order->email = $email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->country = $shippingDetails->country;
            $order->pincode = $shippingDetails->pincode;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->order_status = "Pending";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = Cart::where(['email'=> $email])->get();

            foreach ($cartProducts as $pro) {
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_name = $pro->prod_name;
                $cartPro->product_price = $pro->prod_price;
                $cartPro->product_quantity = $pro->prod_quantity;
                $cartPro->save();
            }

            $productDetails = Order::with('userOrders')->where('id',$order_id)->first();
            
            

            $userDetails = DeliveryAddress::where('user_id',$user_id)->first();
         
             

            $messageData = [
                'order_id'=>$order_id,
                'product_name'=>$cartPro->product_name,
                'product_quantity'=>$cartPro->product_quantity,
                'product_price'=>$cartPro->product_price,
                'grand_total'=>$order->grand_total,
                'useraddress'=>$order->address,
                'usercity'=>$order->city,
                'userstate'=>$order->state,
                'usercountry'=>$order->country,
                'userpincode'=>$order->pincode,
                'paymentmethod'=>$order->payment_method,
                'productDetails'=>$productDetails,
                'userDetails'=>$userDetails
            ];

            Mail::send('emails.place-order',$messageData,function($message)use($email){
                $message->to($email)->subject('Order Details from E-com Website');
            });


            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);

            if($data['payment_method']=="COD")
            {
                $email = Auth::User()->email;
                return redirect('thanks')->with(compact('productDetails','userDetails'));
            }
            else
            {
                return redirect('paypal')->with(compact('productDetails','userDetails'));
            }
        }
    }


    public function trackOrder($order_id)
    {
        $user_id = Auth::User()->id;
        $email = Auth::User()->email;
        $orderDetails = Order::where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        return view('frontend.track-order')->with(compact('order_id','orderDetails'));
    }


    public function thanks(Request $request)
    {
        $email = Auth::User()->email;
        Cart::where('email',$email)->delete();
        return view('frontend.thanks');
    }


    public function paypalThanks()
    {
        return view('frontend.thanks-paypal');
    }

    public function paypalCancel()
    {
        return view('frontend.cancel-paypal');
    }

    public function paypal(Request $request)
    {
        $email = Auth::User()->email;
        Cart::where('email',$email)->delete();
        return view('frontend.paypal');
    }


    public function orders()
    {
        $user_id = Auth::User()->id;
        $orders = Order::with('userOrders')->where('user_id',$user_id)->orderBy('id','DESC')->get();

        return view('frontend.orders')->with(compact('orders'));
    }


    public function orderDetails($order_id)
    {
        $user_id = Auth::User()->id;
        $orderDetails = Order::with('userOrders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));

        return view('frontend.order-details')->with(compact('orderDetails'));
    }


    public function checkSubscriber(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $subscriberCount = NewsLetter::where(['email'=>$data['subscriber_email']])->count();

            if($subscriberCount>0)
            {
                echo "exists";
            }
        }
    }

    public function addSubscriber(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $subscriberCount = NewsLetter::where(['email'=>$data['subscriber_email']])->count();

            if($subscriberCount>0)
            {
                echo "exists";
            }
            else
            {
                $newsletter = new NewsLetter;
                $newsletter->email = $data['subscriber_email'];
                $newsletter->status = 1;
                $newsletter->save();

                echo "saved";
            }
        }
    }


    public function cmsPage($title)
    {
        $cmsPageDetails = Cms::where('title',$title)->first();

        return view('frontend.cms-page')->with(compact('cmsPageDetails'));
    }
}
