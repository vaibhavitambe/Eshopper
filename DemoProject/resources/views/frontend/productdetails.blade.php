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
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			@foreach($productDetails->childs as $image)
            		<img src="{{ asset('uploads/'. $image->image_name) }}" height="100px" width="100px" name="image" />
          	@endforeach
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
								
		<!-- Wrapper for slides -->
			<div class="carousel-inner">
								
			</div>
				<form action="{{ url('add-wishlist') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" value="{{$productDetails->id}}" name="product_id">
					<button type="Submit" class="btn btn-primary">Add to Wishlist</button>
				</form>			  
				
			</div>

		</div>
		<div class="col-sm-7">
			<form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="product_id" value="{{ $productDetails->id }}">

				<input type="hidden" name="product_name" value="{{ $productDetails->name }}">

				<input type="hidden" name="product_price" value="{{ $productDetails->price }}">

				<input type="hidden" name="product_quantity" value="{{ $productDetails->quantity }}">

				<div class="product-information"><!--/product-information-->
					<img src="" class="newarrival" alt="" />
					<h2>{{ $productDetails->name }}</h2>
					<p>Web ID: 1089772</p>
					<img src="{{ asset('frontend/images/product-details/rating.png')}}" alt="" />
					<span>
					<span>&#8377; {{ $productDetails->price }}</span>
					<button type="Submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
					Add to cart
					</button>
					</span>
					<p><b>Availability:</b> In Stock</p>
					<p><b>Condition:</b> New</p>
					<p><b>Brand:</b> E-SHOPPER</p>
					
					<a href=""><img src="{{ asset('frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
				</div><!--/product-information-->
			</form>

	
		</div>
</div><!--/product-details-->


	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#details" data-toggle="tab">Details</a></li>
					<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
					<li><a href="#tag" data-toggle="tab">Tag</a></li>
					<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade" id="details" >
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery2.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery3.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="images/home/gallery4.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
				<div class="tab-pane fade" id="companyprofile" >
				<div class="col-sm-3">
					<div class="product-image-wrapper">
							<div class="single-products">
							<div class="productinfo text-center">
							<img src="images/home/gallery1.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->