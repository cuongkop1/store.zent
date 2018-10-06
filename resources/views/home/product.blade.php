<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title>YOURStore - Responsive HTML5 Template</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="YOURStore - Responsive HTML5 Template">
		<meta name="author" content="etheme.com">
		<link rel="shortcut icon" href="favicon.ico">
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- External Plugins CSS -->
		<link rel="stylesheet" href="homestore/external/slick/slick.css">
		<link rel="stylesheet" href="homestore/external/slick/slick-theme.css">
		<link rel="stylesheet" href="homestore/external/magnific-popup/magnific-popup.css">
		<link rel="stylesheet" href="homestore/external/bootstrap-select/bootstrap-select.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="homestore/css/style.css">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="homestore/font/style.css">
		<!-- Head Libs -->
		<!-- Modernizr -->
		
		<style>
			.picksize{
				cursor: pointer;
			}
			.div_color.active{
				border: 2px solid #E25301 !important;
			}
			.picksize.active{
				background: black;
				color: white;
			}
		</style>
	</head>
	<body>
		<div id="loader-wrapper">
			<div id="loader">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
		<!-- Back to top -->
	    <div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	    <!-- /Back to top -->
	    <!-- mobile menu -->
	
	    <!-- /mobile menu -->
		<!-- HEADER section -->
		@include('home.header')
		<!-- End HEADER section -->
		<!-- breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="index.html" class="icon icon-home"></a></li>
					<li><a href="#">T-shirt</a></li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs --> 
		<!-- CONTENT section -->
		<div id="pageContent">
			<section class="content offset-top-0">
				<div class="container">
					<div class="row product-info-outer">
						<div id="productPrevNext" class="hidden-xs hidden-sm">
							<a href="#" class="product-prev"><img src="homestore/images/product/product-2.jpg" alt="" /></a>
							<a href="#" class="product-next"><img src="homestore/images/product/product-3.jpg" alt="" /></a>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="row">
								<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 hidden-xs">
									<div class="product-main-image">
										<div class="product-main-image__item">
											<img class="product-zoom" src='{{ asset('storage') }}/{{$product_views->featured_image}}' data-zoom-image="{{ asset('storage') }}/{{$product_views->featured_image}}" alt="" />
										</div>
										<div class="product-main-image__zoom"></div>
									</div>
									<div class="product-images-carousel">
										<ul id="smallGallery">
											@foreach($product_views->productGalleries as $image)
											<li><a href="#" data-image="{{ asset('storage') }}/{{$image->link}}" data-zoom-image="{{ asset('storage') }}/{{$image->link}}"><img src="{{ asset('storage') }}/{{$image->link}}" alt="" /></a></li>
											@endforeach
										</ul>
									</div>
									<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="video-link"><span class="icon icon-videocam"></span>Video</a>
								</div>
								<div class="product-info col-sm-8 col-md-8 col-lg-8 col-xl-8">
									<div class="wrapper hidden-xs">
										<div class="product-info__sku pull-left color-dark">SKU: <strong class="text-color">mtk012c</strong></div>
										<div class="product-info__availability pull-right color-dark">Availability:   <strong class="color">In Stock</strong> &nbsp; <strong class="color-red">Out stock</strong></div>
									</div>
									<div class="product-info__title">
										<h2>{{$product_views->name}}</h2>
									</div>
									
									<div class="wrapper visible-xs">
										<div class="product-info__sku pull-left">SKU: <strong>mtk012c</strong></div>
										<div class="product-info__availability pull-right">Availability:   <strong class="color">In Stock</strong></div>
									</div>
									<div class="price-box product-info__price"><span class="price-box__new">{{number_format($product_views->price)}}đ</span> <span class="price-box__old">{{number_format($product_views->original_price)}}đ</span></div>
									<div class="product-info__review">
										<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
										<a href="#">1 Review(s)</a> <a href="#">Add Your Review</a> 
									</div>
									<div class="divider divider--xs product-info__divider hidden-xs"></div>
									<div class="product-info__description hidden-xs">
										<div class="product-info__description__brand"><img src="homestore/images/custom/brand.png"  alt="" /> </div>
										<div class="product-info__description__text">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</div>
									</div>
									<div class="divider divider--xs product-info__divider"></div>
									<div class="product-info__description">
										<div class="color-red"><span class="font35 font-lighter">35% Off.</span> Hurry, there are only 33 item(s) left! </div>
										<!-- countdown_box -->
										<div class="countdown-product">
											<div id="countdown1"></div>
										</div>
										<!-- /countdown_box --> 										
									</div>
									<div class="divider divider--xs product-info__divider"></div>
									<form action="" method="POST" role="form">
										@csrf
										<div class="wrapper">
											<div class="pull-left"><span class="option-label">COLOR:</span><span class="required">*</span></div>
											<div class="pull-right required">* Required Fields</div>
										</div>
										<ul class="options-swatch options-swatch--color options-swatch--lg">
											@foreach($colors as $color)
											<div proId="{{$product_views->id}}" data-id="{{$color->color_id}}" class="div_color" style="width: 40px;height: 40px;padding:3px;background: white;display: inline-block">
												<div class="color1" style="width: 30px;height: 30px;background: {{$color->code}};border: 1px solid #ccc;cursor: pointer; margin-right: 5px;text-align: center;">
												</div></div>
											@endforeach
										</ul>
										<div class="wrapper">
											<div class="pull-left"><span class="option-label">SIZE:</span></div>
											<div class="pull-left required">*</div>
										</div>
										<ul class="listsize1 options-swatch options-swatch--size options-swatch--lg">
										</ul>
										<div class="divider divider--sm"></div>
										<div class="divider divider--sm"></div>
										<div class="wrapper">
											<div class="pull-left"><span class="qty-label">QTY:</span></div>
											<div class="pull-left">
												<!--  -->
												<input id="qty_12" type="hidden" value="">
												<div class="number input-counter">
												    <span class="minus-btn"></span>
												    <input id="qty_product" readonly name="qty" type="text" value="1" size="5"/>
												    <span class="plus-btn"></span>
												</div>
												<!-- / -->
											</div>
											<div class="pull-left"><button id="add-product" type="submit" productId="{{$product_views->id}}" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
										</div>
										{{-- <input type="hidden" id="pick_color">
										<input type="hidden" id="pick_size"> --}}
									</form>
									<ul class="product-link">
										<li class="text-right"><a href="#"><span class="icon icon-favorite_border  tooltip-link"></span><span class="text">Add to wishlist</span></a></li>
										<li class="text-left"><a href="#"><span class="icon icon-sort  tooltip-link"></span><span class="text">Add to compare</span></a></li>
									</ul>									
								</div>	
							</div>
						</div>						
					</div>
				</div>
			</section>			
			<!-- related products -->
			<section class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__center pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-left text-uppercase title-under pull-left">YOU MAY ALSO BE INTERESTED IN THE FOLLOWING PRODUCT(S)</h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
					<div class="carousel-products row" id="carouselRelated">
						@foreach($ranimages as $ranimage)
						<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-one-six">
							<!-- product -->
							<div class="product">
								<div class="product__inside">
									<!-- product image -->
									<div class="product__inside__image">
										<a href="{{ asset('') }}{{$ranimage->slug}}"> <img src="{{ asset('storage') }}/{{$ranimage->featured_image}}" alt=""> </a> 
									</div>
									<!-- /product image --> 
									<!-- product name -->
									<div class="product__inside__name">
										<h2><a href="{{ asset('') }}{{$ranimage->slug}}">{{$ranimage->name}}</a></h2>
									</div>
									<!-- /product name -->
									<!-- /product description --> 
									<div class="product__inside__price price-box">{{number_format($ranimage->price)}}đ</div>
									<!-- /product price -->
									<!-- /product review --> 
									<div class="product__inside__hover">
										<!-- product info -->
										<div class="product__inside__info">
											<div class="product__inside__info__btns"> <a href="{{ asset('') }}{{$ranimage->slug}}" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>BUY NOW</a>
												<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
												<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											</div>
											<ul class="product__inside__info__link hidden-xs">
												<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
												<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
											</ul>
										</div>
										<!-- /product info --> 
										<!-- product rating -->
										<div class="rating row-mode-hide"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
										<!-- /product rating --> 
									</div>
								</div>
							</div>
							<!-- /product --> 
						</div>
						@endforeach
					</div>
					<!-- /carousel --> 
				</div>
			</section>
			<!-- /related products -->
		</div>
		<!-- End CONTENT section --> 
		<!-- FOOTER section -->
		<footer>
			<!-- footer-data -->
			<div class="container inset-bottom-60">
				<div class="row" >
					<div class="col-sm-12 col-md-5 col-lg-6 border-sep-right">
						<div class="footer-logo hidden-xs">
							<!--  Logo  --> 
							<a class="logo" href="index.html"> <img class="replace-2x" src="homestore/images/logo.png"  alt="YOURStore"> </a> 
							<!-- /Logo --> 
						</div>
						<div class="box-about">
							<div class="mobile-collapse">
								<h4 class="mobile-collapse__title visible-xs">ABOUT US</h4>
								<div class="mobile-collapse__content">
									<p> No more need to look for other ecommerce themes. We provide huge number of different layouts. Yourstore comes packed with free and useful features developed to make your website creation easier. Innovative clean design, advanced functionality, UI made for humans, extensive documenta- tion and support i continue this list infinitely... </p>
								</div>
							</div>
						</div>
						<!-- subscribe-box -->
						<div class="subscribe-box offset-top-20">
							<div class="mobile-collapse">
								<h4 class="mobile-collapse__title">NEWSLETTER SIGNUP</h4>
								<div class="mobile-collapse__content">
									<form class="form-inline">
										<input class="subscribe-form__input" type="text" name="subscribe">
										<button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>
									</form>
								</div>
							</div>
						</div>
						<!-- /subscribe-box --> 
					</div>
					<div class="col-sm-12 col-md-7 col-lg-6 border-sep-left">
						<div class="row">
							<div class="col-sm-4">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title">INFORMATION</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="about.html">About Us</a></li>
											<li><a href="support-24.html">Customer Service</a></li>
											<li><a href="faq.html">Privacy Policy</a></li>
											<li><a href="site-map.html">Site Map</a></li>
											<li><a href="typography.html">Search Terms</a></li>
											<li><a href="warranty.html">Advanced Search</a></li>
											<li><a href="delivery-page.html">Orders and Returns</a></li>
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title">WHY BUY FROM US</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="warranty.html">Shipping &amp; Returns</a></li>
											<li><a href="typography.html">Secure Shopping</a></li>
											<li><a href="about.html">International Shipping</a></li>
											<li><a href="delivery-page.html">Affiliates</a></li>
											<li><a href="support-24.html">Group Sales</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mobile-collapse">
									<h4 class="text-left  title-under  mobile-collapse__title">MY ACCOUNT</h4>
									<div class="v-links-list mobile-collapse__content">
										<ul>
											<li><a href="login_form.html">Sign In</a></li>
											<li><a href="shopping_cart.html">View Cart</a></li>
											<li><a href="wishlist.html">My Wishlist</a></li>
											<li><a href="support-24.html">Track My Order</a></li>
											<li><a href="faq.html">Help</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /footer-data --> 
			<div class="divider divider-md visible-xs visible-sm visible-md"></div>
			<!-- social-icon -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="social-links social-links--large">
							<ul>
								<li><a class="icon fa fa-facebook" href="http://www.facebook.com/"></a></li>
								<li><a class="icon fa fa-twitter" href="http://www.twitter.com/"></a></li>
								<li><a class="icon fa fa-google-plus" href="http://www.google.com/"></a></li>
								<li><a class="icon fa fa-instagram" href="https://instagram.com/"></a></li>
								<li><a class="icon fa fa-youtube-square" href="https://www.youtube.com/"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /social-icon --> 
			<!-- footer-copyright -->
			<div class="container footer-copyright">
				<div class="row">
					<div class="col-lg-12"> <a href="index.html"><span>Your</span>Store</a> &copy; 2016 . All Rights Reserved. </div>
				</div>
			</div>
			<!-- /footer-copyright --> 
			<a href="#" class="btn btn--ys btn--full visible-xs" id="backToTop">Back to top <span class="icon icon-expand_less"></span></a> 
		</footer>
		<!-- END FOOTER section -->
		<!-- External JS --> 
		<!-- jQuery 1.10.1--> 
		{{-- <script src="homestore/external/jquery/jquery-2.1.4.min.js"></script>  --}}
		{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
		{{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
		{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script> --}}
		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script> --}}
		<!-- Bootstrap 3--> 
		<script src="homestore/external/bootstrap/bootstrap.min.js"></script> 
		<!-- Specific Page External Plugins --> 
		<script src="homestore/external/slick/slick.min.js"></script> 
		<script src="homestore/external/bootstrap-select/bootstrap-select.min.js"></script> 
		<script src="homestore/external/countdown/jquery.plugin.min.js"></script> 
		<script src="homestore/external/countdown/jquery.countdown.min.js"></script> 			
		<script src="homestore/external/magnific-popup/jquery.magnific-popup.min.js"></script> 
		<script src="homestore/external/nouislider/nouislider.min.js"></script>
		<script src="homestore/external/imagesloaded/imagesloaded.pkgd.min.js"></script> 
		<script src="homestore/external/elevatezoom/jquery.elevatezoom.js"></script>
		<script src="homestore/external/colorbox/jquery.colorbox-min.js"></script> 
		<script src="homestore/external/modernizr/modernizr.js"></script>
		<script type="text/javascript" src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<!-- Custom -->
		<script src="homestore/js/custom.js"></script> 
		<script src="homestore/js/js-product.js"></script>
		<script src="{{ asset('js/productview.js') }}"></script>
		{!! Toastr::render() !!}
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("demo");
			  var captionText = document.getElementById("caption");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
			      dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active";
			  captionText.innerHTML = dots[slideIndex-1].alt;
			}
		</script>
		<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
		  $.ajaxSetup({
		      headers: {
		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		  });
		});
		</script>
		<script>
			var asset = '{{ asset('') }}';
		</script>
	</body>
</html>