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
				<div class="login-form">
					<h2>Update Account</h2>
					<form id="accountForm" name="accountForm" method="POST" action="{{ url('account') }}">
					{{ csrf_field() }}

					<input value="{{ $userDetails->firstname }}" id="name" name="name" type="text" placeholder="Name" />

					<input value="{{ $userDetails->email }}" id="email" name="email" type="email" placeholder="Email" />
					
					<button type="submit" id="submitlog" class="btn btn-default">Update</button>
					</form>
				</div>
			</div>

			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>

			<div class="col-sm-4">
				<div class="signup-form">
					<h2>Update Password</h2>
					<form id="passwordForm" name="passwordForm" method="POST" action="{{ url('update-user-pwd') }}">
					{{ csrf_field() }}

					<input id="current_pwd" name="current_pwd" type="password" placeholder="Current Password" />

					<span id="chkPwd"></span>

					<input id="new_pwd" name="new_pwd" type="password" placeholder="New Password" />
					
					<input id="confirm_pwd" name="confirm_pwd" type="password" placeholder="Confirm Password" />

					<button type="submit">Update</button>
					</form>
				</div>
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