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
				 <li class="active">Wishlist</li>
			</ol>
		</div>
		<h2 class="title text-center">Wishlist</h2>
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
						<td class="name">Name</td>
						<td class="price">Price</td>
						<td>Move To Cart</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				
					@foreach($usercart as $list)
					<tr>
						<td class="wishlist_product">
							<a href="">
								<img src="{{ asset('uploads/'. $list->image) }}" height="100px" width="100px" name="image" />
							</a>
						</td>
						<td>
							{{ $list->product_name }}
							<p>Code : {{ $list->product_sku }} </p>
						</td>
						<td>
							<p>&#8377; {{ $list->product_price }}</p>
						</td>
						<td><p>
							<a class="wishlist_quantity_delete" href="{{ url('/wishlist/add-to-cart/'.$list->id)}}"><button class="btn btn-primary">Add to Cart</button></p></a>
						</td>
						<td class="wishlist_delete">
							<a class="wishlist_quantity_delete" href="{{ url('/wishlist/delete-product/'.$list->id)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>

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