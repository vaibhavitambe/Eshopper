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
<?php
use App\Order;
?>

<body>
@include('frontend.header')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				 <li class="active">Thanks</li>
			</ol>
		</div>
	</div>
</section>  

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<h3>Your Order has been placed</h3>
			<p>Your Order Number is {{ Session::get('order_id') }} and Total Payable about is &#8377; {{ Session::get('grand_total') }}</p>
			<p>Please make payment by clicking on below Payment Button</p>

			<?php
				$orderDetails = Order::getOrderDetails(Session::get('order_id'));
				$orderDetails = json_decode(json_encode($orderDetails));
				$nameArr = explode(' ', $orderDetails->name);
			?>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  			<input type="hidden" name="cmd" value="_xclick">

  			<input type="hidden" name="business" value="vaibhavitambe0903@gmail.com">

  			<input type="hidden" name="item_name" value="{{ Session::get('order_id') }}">

  			<input type="hidden" name="currency_code" value="INR">

  			<input type="hidden" name="amount" value="{{ Session::get('grand_total') }}">

  			<input type="hidden" name="name" value="{{ $orderDetails->name }}">

  			<input type="hidden" name="address" value="{{ $orderDetails->address }}">

  			<input type="hidden" name="city" value="{{ $orderDetails->city }}">

  			<input type="hidden" name="state" value="{{ $orderDetails->state }}">

  			<input type="hidden" name="country" value="{{ $orderDetails->country }}">

  			<input type="hidden" name="email" value="{{ $orderDetails->email }}">

  			<input type="hidden" name="return" value="{{ url('paypal/thanks') }}">

  			<input type="hidden" name="cancel_return" value="{{ url('paypal/cancel') }}">

  			<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Buy Now">
  			<img alt="" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

			</form>
		</div>
	</div>
</section>


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

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>