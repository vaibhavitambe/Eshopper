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

<section id="cart_items" style="margin-top: 20px;">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Review</li>
				</ol>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
			<div class="billing-form">
				<h2>Billing Details</h2>
					<div class="form-group">
						{{ $userDetails->firstname }}
					</div>
					<div class="form-group">
						{{ $address->address1 }}
					</div>
					<div class="form-group">
						{{ $address->address2 }}
					</div>
					<div class="form-group">
						{{ $address->city }}
					</div>
					<div class="form-group">
						{{ $address->state }}
					</div>
					<div class="form-group">
						{{ $address->country }}
					</div>
					<div class="form-group">
						{{ $address->pincode }}
					</div>
			</div>
		</div>
			
		<div class="col-sm-1">
			<h2></h2>
		</div>

		<div class="col-sm-6">
			<div class="shipping-form">
				<h2>Shipping Details</h2>
					<div class="form-group">
						{{ $shippingDetails->name }}
					</div>
					<div class="form-group">
						{{ $shippingDetails->address }}
					</div>
					<div class="form-group">
						{{ $shippingDetails->address }}
					</div>
					<div class="form-group">
						{{ $shippingDetails->city }}
					</div>
					<div class="form-group">
						{{ $shippingDetails->state }}
					</div>
					<div class="form-group">
						{{ $shippingDetails->country }}
					</div>
					<div class="form-group">
						{{ $shippingDetails->pincode }}
					</div>
			</div>
		</div>			
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
								{{ $cart->prod_quantity }}
							</div>
						</td>
						<td class="cart_total">
								<p class="cart_total_price">&#8377; {{ $cart->prod_price*$cart->prod_quantity }}</p>
						</td>
					</tr>
					<?php $total_amount = $total_amount + ($cart->prod_price*$cart->prod_quantity); ?>
					@endforeach

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>&#8377; {{ $total_amount }}</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>&#8377; 0</td>	
									</tr>
									<tr class="discount">
										<td>Discount Cost</td>
										<td>
											@if(!empty(Session::get('CouponAmount')))
												&#8377; {{ Session::get('CouponAmount')}}
											@else
												&#8377; 0
											@endif
										</td>	
									</tr>
									<tr>
										<td>Grand Total</td>
										<td><span>&#8377; {{ $grand_total = $total_amount - Session::get('CouponAmount') }}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		<form name="paymentForm" id="paymentForm" action="{{ url('place-order') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="grand_total" value="{{ $grand_total }}">
			<div class="payment-options">
				<span>
					<label>Select Payment Method : </label><br> <span id="payment" class="report"></span>
				</span>
				<span>
					<label><input type="radio" name="payment_method" id="COD" value="COD">COD</label>
				</span>
				<span>
					<label><input type="radio" name="payment_method" id="paypal" value="paypal">Paypal</label>
				</span>
				<span style="float: right;">
					<button type="submit" class="btn btn-primary" onclick="paymentMethod();">Place Order</button>
				</span>
			</div>
		</form>
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