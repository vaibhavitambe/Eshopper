
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">{{ $categoryDetails->name }}</h2>

		@foreach($productsAll as $products)
			<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						@foreach($products->childs as $image)
							<img src="{{ asset('frontend/images/home/'.$image->image_name)}}" height="250px" width="100px" alt="" />
						@endforeach
						<h2>&#8377; {{$products->price}}</h2>
						<p>{{$products->name}}</p>
						<a href="{{url('/productdetails/')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>&#8377; {{$products->price}}</h2>
							<p>{{$products->name}}</p>
							<a href="{{url('/productdetails/'.$products->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
						</div>
					</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
					</ul>
				</div>
			</div>
			</div>
		@endforeach
					
	</div><!--features_items-->
					
	
					
	

