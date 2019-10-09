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
				<div class="login-form"><!--login form-->
					<h2>Forgot Password</h2>
					<form id="forgotPasswordForm" name="forgotPasswordForm" method="POST" action="{{ url('forgot-password') }}">
					{{ csrf_field() }}

					<input name="email" type="email" placeholder="Email Address" required="" />

					
					<button type="submit" id="submitlog" class="btn btn-default">Submit</button>
					</form>
				</div><!--/login form-->
			</div>

			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>

			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form id="registerForm" name="registerForm" method ="POST" action="{{ url('user-register') }}">
					{{ csrf_field() }}
					<br>	
					<input name="name" id="name" class="report" type="text" placeholder="First Name"/>

					<input name="email" id="email" type="email" placeholder="Email Address"/>

					<input name="password" id="password" type="password" placeholder="Password"/>

					<button type="submit" id="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
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