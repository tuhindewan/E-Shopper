@extends('welcome')

@section('home_content')
	<div class="features_items"><!--features_items-->
		@foreach($product as $data)
	    <div class="product-details"><!--product-details-->
	    	<div class="col-sm-5">
	    		<div class="view-product">
	    			<img src="{{ asset($data->product_image) }}" alt="" />
	    			<h3>ZOOM</h3>
	    		</div>
	    		

	    	</div>
	    	<div class="col-sm-7">
	    		<div class="product-information"><!--/product-information-->
	    			<img src="{{ asset('frontend/assets/images/product-details/new.jpg') }}" class="newarrival" alt="" />
	    			<h2>{{ $data->product_name }}</h2>
	    			<p>Color: {{ $data->product_color }}</p>
	    			<img src="{{ asset('frontend/assets/images/product-details/rating.png') }}" alt="" />
	    			<span>
	    				<span>TK {{ $data->product_price }}</span>
	    				<label>Quantity:</label>
	    				<input type="text" value="3" />
	    				<button type="button" class="btn btn-fefault cart">
	    					<i class="fa fa-shopping-cart"></i>
	    					Add to cart
	    				</button>
	    			</span>
	    			<p><b>Availability:</b> In Stock</p>
	    			<p><b>Condition:</b> New</p>
	    			<p><b>Brand:</b> {{ $data->manufacture_name }}</p>
	    			<p><b>Size:</b> {{ $data->product_size }}</p>
	    			<a href=""><img src="{{ asset('frontend/assets/images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
	    		</div><!--/product-information-->
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
	    			<div class="col-sm-12">
	    				<div class="product-image-wrapper">
	    					<div class="single-products">
	    						<div class="productinfo">
	    							<p>{{ $data->product_long_description }}</p>
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
	    @endforeach
	</div><!--features_items-->
	
	<div class="category-tab"><!--category-tab-->
	    <div class="col-sm-12">
	        <ul class="nav nav-tabs">
	            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
	            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
	            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
	            <li><a href="#kids" data-toggle="tab">Kids</a></li>
	            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
	        </ul>
	    </div>
	    <div class="tab-content">
	        <div class="tab-pane fade active in" id="tshirt" >
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery4.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	        
	        <div class="tab-pane fade" id="blazers" >
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery4.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	        
	        <div class="tab-pane fade" id="sunglass" >
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery4.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	        
	        <div class="tab-pane fade" id="kids" >
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery4.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	        
	        <div class="tab-pane fade" id="poloshirt" >
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery2.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery4.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery3.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="product-image-wrapper">
	                    <div class="single-products">
	                        <div class="productinfo text-center">
	                            <img src="{{ asset('frontend/assets/images/home/gallery1.jpg')}}" alt="" />
	                            <h2>$56</h2>
	                            <p>Easy Polo Black Edition</p>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div><!--/category-tab-->
	
	<div class="recommended_items"><!--recommended_items-->
	    <h2 class="title text-center">recommended items</h2>
	    
	    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
	        <div class="carousel-inner">
	            <div class="item active">   
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ asset('frontend/assets/images/home/recommend1.jpg')}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ asset('frontend/assets/images/home/recommend2.jpg')}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ asset('frontend/assets/images/home/recommend3.jpg')}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="item">  
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ asset('frontend/assets/images/home/recommend1.jpg')}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ asset('frontend/assets/images/home/recommend2.jpg')}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ asset('frontend/assets/images/home/recommend3.jpg')}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
	            <i class="fa fa-angle-left"></i>
	          </a>
	          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
	            <i class="fa fa-angle-right"></i>
	          </a>          
	    </div>
	</div><!--/recommended_items-->
@endsection