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
	
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
				<h2 class="title text-center">Contact-Us</h2><br><br>
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
				<div class="col-sm-6">
	    			<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    		<form action="{{ url('contact-us') }}" id="main-contact-form" class="contact-form row" name="contact-form" method="POST">
				    			{{ csrf_field() }}
				            	<div class="form-group col-md-6">
				                	<input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            	</div>
				            	<div class="form-group col-md-6">
				                	<input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            	</div>
				            	<div class="form-group col-md-6">
				                	<input type="text" name="contact_no" class="form-control" required="required" placeholder="Contact No">
				            	</div>
				            	<div class="form-group col-md-6">
				                	<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            	</div>                        
				            	<div class="form-group col-md-6">
				                	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
				            	</div>
				        	</form>
	    				</div>
				</div>
			</div>
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