@extends('frontEnd.master')

@section('title')
Product Details
@endsection

@section('mainContent')

<div class="page-head">
	<div class="container">
		<h3>Single</h3>
	</div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li data-thumb="{{ asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{ asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{ asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{ asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="{{ asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{ asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
							
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3>{{ $productById->product_name}}</h3>
					<p><span class="item_price">BDT {{ $productById->product_price}}</span> </p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					
					
					<div class="occasional">
						<form action="{{ url('add-to-cart/') }}" method="post" class="form-inline">
								{{ csrf_field() }}
								<div class="form-group ">
									<input type="number" value="1" min="1" name="product_quantity" class="form-control">
									<input type="hidden" value="{{  $productById->id }}"  name="product_id" class="form-control">
								</div>
								<div class="form-group ">
									<input type="submit" name="btn" class="btn btn-success submitbtn" value="Add To Cart">
								</div>
						</form>
						
					</div>


					
		</div>
				<div class="clearfix"> </div>

				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Short Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Long Description</a></li>
							
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Short Description</h5>
								<p>{{$productById->product_short_description}}</p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										
										<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
											<h5>Product Long Description</h5>
											<p>{{$productById->product_long_description}}</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
	</div>
</div>

@endsection