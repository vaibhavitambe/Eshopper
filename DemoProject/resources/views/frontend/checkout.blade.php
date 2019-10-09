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
	
<section id="form" style="margin-top: 20px;"><!--form-->
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				 <li class="active">Checkout</li>
			</ol>
			<h2 class="title text-center">Checkout</h2><br>
		</div>
		<form action="{{ url('checkout') }}" method="POST">
			{{ csrf_field() }}
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

			<div class="col-sm-4 col-sm-offset-1">
				<div class="billing-form">
					<h2>Bill To</h2>
					<div class="form-group">
						<input name="billing_name" id="billing_name" value="{{ $userDetails->firstname }}" type="text" placeholder="Billing Name" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_address1" id="billing_address1" value="{{ $address->address1 }}" placeholder="Billing Address1" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_address2" id="billing_address2" value="{{ $address->address2 }}" placeholder="Billing Address2" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_city" id="billing_city" value="{{ $address->city }}" placeholder="Billing City" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_state" id="billing_state" value="{{ $address->state }}" placeholder="Billing State" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_country" id="billing_country" value="{{ $address->country }}" placeholder="Billing Country" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="billing_pincode" id="billing_pincode" value="{{ $address->pincode }}" placeholder="Billing pincode" class="form-control" />
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="copyaddress">
						<label class="form-check-label" for="copyaddress">Shipping address same as Billing address</label>
					</div>
				</div>
			</div>

			<div class="col-sm-1">
				<h2></h2>
			</div>

			<div class="col-sm-4">
				<div class="shipping-form">
					<h2>Ship To</h2>
					<div class="form-group">
						<input type="text"   name="shipping_name" id="shipping_name" placeholder="Shipping Name" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="shipping_address1" id="shipping_address1" placeholder="Shipping Address1" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="shipping_address2" id="shipping_address2" placeholder="Shipping Address2" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="shipping_city" id="shipping_city" placeholder="Shipping City" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="shipping_state" id="shipping_state" placeholder="Shipping State" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="shipping_country" id="shipping_country" placeholder="Shipping Country" class="form-control" />
					</div>
					<div class="form-group">
						<input type="text" name="shipping_pincode" id="shipping_pincode" placeholder="Shipping pincode" class="form-control" />
					</div>

					<button type="submit" id="submit" class="btn btn-default">Chechout</button>
			
				</div>
			</div>
			</div>
		</form>
	</div>
</section><!--/form-->	

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