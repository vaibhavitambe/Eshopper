<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->       
<link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->


<body>
@include('frontend.header')
	
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				 <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<h2 class="title text-center">Cart</h2><br>
		<div class="row">
			@if(Session::has('flash_message_success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<p>{!! session('flash_message_success')!!}</p>
				</div>
			@endif

			@if(Session::has('flash_message_error'))
				<div class="alert alert-error alert-block" style="background-color: #f4d2d2">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<p>{!! session('flash_message_error')!!}</p>
				</div>
			@endif	
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $total_amount = 0; ?>
					@foreach($usercart as $cart)
					<tr>
						<td class="cart_product">
							<a href="">
								
								<img src="{{ asset('uploads/'. $cart->image) }}" height="100px" width="100px" name="image" />
				
							</a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $cart->prod_name }}</a></h4>
							<p>Code: 1089772</p>
						</td>
						<td class="cart_price">
							<p>&#8377; {{ $cart->prod_price }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->prod_quantity }}" autocomplete="off" size="2">
								@if($cart->prod_quantity)
									<a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
								@endif
							</div>
						</td>
							<td class="cart_total">
								<p class="cart_total_price">&#8377; {{ $cart->prod_price*$cart->prod_quantity }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
							</td>
					</tr>
					<?php $total_amount = $total_amount + ($cart->prod_price*$cart->prod_quantity); ?>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<label>Use Coupon Code</label>
								<form action="{{ url('/cart/apply-coupon') }}" method="POST">
									{{ csrf_field() }}
								<input type="text" name="coupon"><br>	
								<input type="submit" value="Apply" class="btn btn-primary">
								</form>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							@if(!empty(Session::get('CouponAmount')))

								<li>Sub Total <span>INR <?php  echo $total_amount; ?></span></li>
								<li>Coupon Discount <span>INR <?php echo Session::get('CouponAmount'); ?></span></li>
								<li>Grand Total <span>INR <?php echo $total_amount-Session::get('CouponAmount'); ?></span></li>
							@else
								<li>Grand Total <span>INR <?php echo $total_amount; ?></span></li>
							@endif
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{url('checkout')}} ">Check Out</a>
					</div>
				</div>			</div>
		</div>
	</section><!--/#do_action-->

@include('frontend.footer')
	
<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
	@yield('script')
</body>
</html>