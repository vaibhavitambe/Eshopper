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
				 <li class="active">Orders</li>
			</ol>
		</div>
		<h2 class="title text-center">Orders</h2>
	</div>
</section>  

<section id="do_action">
	<div class="container">

		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
        		<thead>
            		<tr>
		                <th>Order ID</th>
		                <th>Ordered Products</th>
		                <th>Payment Method</th>
		                <th>grand Total</th>
		                <th>Track Order</th>
            		</tr>
            		</tr>
        		</thead>
        		<tbody>
            		@foreach($orders as $order)
            			<tr>
                			<td>{{ $order->id }}</td>
                			<td>
                				@foreach($order->userOrders as $pro)
                					<a href="{{ url('orders/'.$order->id) }}">{{ $pro->product_name }}</a><br>
                				@endforeach
                			</td>
                			<td>{{ $order->payment_method }}</td>
                			<td>{{ $order->grand_total }}</td>
                			<td>
                				@foreach($order->userOrders as $pro)
                					<a href="{{ url('track-order/'.$order->id) }}">Track Order</a><br>
                				@endforeach
                			</td>
            			</tr>
            		@endforeach
        		</tbody>
    		</table>
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