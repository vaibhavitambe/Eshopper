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

<section id="form" style="margin-top: 10px;">
	<div class="container">
		<h2 class="title text-center">Address</h2>    
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
					<br>
					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  							Add Address
					</button>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  						<div class="modal-dialog" role="document">
    						<div class="modal-content">
      							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title" id="myModalLabel">New Address</h4>
      							</div>
      							<form action="{{ url('address') }}" method="post">
        							<div class="modal-body">
            							{{ csrf_field() }}
            				
            							@include('frontend.add-address')

									</div>
        						</div>
      							</form>
    						</div>
  						</div>
					</div>
				</div>
				<br>
				<div class="row">
              		<table class="table table-hover">
              			<tr>
      						<th>Address1</th>
      						<th>Address2</th>
      						<th>City</th>
      						<th>State</th>
      						<th>Country</th>
      						<th>Pincode</th>
      						<th width="100px">Actions</th>
    					</tr>
    					@foreach ($addr as $add)
    					 <tr>
        					<td>{{ $add->address1 }}</td>
        					<td>{{ $add->address2 }}</td>
        					<td>{{ $add->city }}</td>
        					<td>{{ $add->state }}</td>
        					<td>{{ $add->country }}</td>
        					<td>{{ $add->pincode }}</td>
        					<td>
        						<a class="btn btn-xs btn-primary" href="{{ url('delete-address/'.$add->id) }}">Delete</a></td>
    					</tr>
    					@endforeach
             		</table>
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