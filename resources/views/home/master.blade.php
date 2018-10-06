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
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="homestore/external/rs-plugin/css/settings.css" media="screen" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="homestore/css/style.css">
		<!-- Icon Fonts  -->
		<link rel="stylesheet" href="homestore/font/style.css">
		<!-- Head Libs -->
		<!-- Modernizr -->
		<style>
			.color1{
				width: 30px;
				height: 30px;
				border: 1px solid #ccc;
				cursor: pointer;
				margin-right: 5px;
				text-align: center;
			}
			.div_color{
				width: 40px;
				height: 40px;
				padding: 3px;
				background: white;
				display: inline-block
			}
			.img_new{
				position: relative;
			}
			.btn-buy{
				position: absolute;
				top: 50%;
				left: 50%;
				opacity: 0;
  				transition: opacity .35s ease;
  				margin: auto;
				transform: translate(-50%, -50%);
			}
			.img_new:hover .btn-buy{
			  	opacity: 1;
			}
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
			toastr{
				z-index: 10000;
			}
		</style>
	</head>
	<body class="index">
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
		<!-- Slider section --> 
		<section class="content offset-top-0 tp-banner-button1 slider-layout-3" id="slider">
			<!--
				#################################
				- THEMEPUNCH BANNER -
				#################################
				--> 
			<!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
			<h2 class="hidden">Slider Section</h2>
			<div class="tp-banner-container">
				<div class="tp-banner">
					<ul>
						<!-- SLIDE -1 -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
							<!-- MAIN IMAGE --> 
							<img src="homestore/images/beautiful.jpg"  alt="slide2"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
							<!-- LAYERS -->
							<!-- TEXT -->
							<div class="tp-caption lfr stb" 
								data-x="right"              
								data-y="center"    
								data-voffset="-5"
								data-hoffset="-205" 
								data-speed="600" 
								data-start="900" 
								data-easing="Power4.easeOut" 
								data-endeasing="Power4.easeIn" 
								style="z-index: 2;">
								<div class="tp-caption2--wd-1">A great selection of superb brands </div>
								<div class="tp-caption2--wd-2">50% off</div>
								<div class="tp-caption2--wd-3">on all clothes</div>
								<div class="tp-caption2--wd-5"><a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a></div>
							</div>							
						</li>
						
						<!-- /SLIDE -1 -->
						<!-- SLIDE 2  -->            
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
							<!-- MAIN IMAGE --> 
							<img src="homestore/images/jensen.jpg"  alt="slide1"  data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" > 
							<!-- LAYERS --> 
							<!-- TEXT -->
							<div class="tp-caption lfl stb" 
								data-x="205"              
								data-y="center"    
								data-voffset="60" 
								data-speed="600" 
								data-start="900" 
								data-easing="Power4.easeOut" 
								data-endeasing="Power4.easeIn" 
								style="z-index: 2;">
								<div class="tp-caption1--wd-1">Spring -Summer 2016</div>
								<div class="tp-caption1--wd-2">Save 20% on</div>
								<div class="tp-caption1--wd-3">new arrivals </div>
								<a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
							</div>
						</li>
						<!-- /SLIDE 2  -->
						<!-- SLIDE 3  -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
							<!-- MAIN IMAGE --> 
							<img src="homestore/images/kristana.jpg"  alt="slide3"  data-bgposition="top left" data-bgfit="cover" data-bgrepeat="no-repeat"> 
							<!-- LAYERS --> 
							<!-- TEXT -->
							<div class="tp-caption lfb stb" 
								data-x="center"              
								data-y="center"    
								data-voffset="0"
								data-hoffset="0" 
								data-speed="600" 
								data-start="900" 
								data-easing="Power4.easeOut" 
								data-endeasing="Power4.easeIn" 
								style="z-index: 2;">
								<div class="tp-caption3--wd-1">Spring -Summer 2016</div>
								<div class="tp-caption3--wd-2">Season sale!</div>
								<div class="tp-caption3--wd-3">Get huge</div>
								<div class="tp-caption3--wd-3">savings!</div>
								<div class="text-center"><a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a></div>
							</div>	
						</li>
						<!-- /SLIDE 3  -->		  
					</ul>
				</div>
			</div>
		</section>
		<!-- END REVOLUTION SLIDER --> 
		<!-- CONTENT section -->
		<div id="pageContent">
			<!--=== box-baners ===-->
						<!-- category section -->
			<div class="content">
				<div class="container">
					<h2 class="text-left text-uppercase title-under">Latest T-shirt</h2>
					<div class="row">
						<div class="category-carousel">
							@foreach($latests as $latest)
							<div style="" class="img_new col-sm-4 col-md-4 col-lg-4">
								<a href="{{ asset('') }}{{$latest->slug}}" class="banner zoom-in">
									<span class="figure">
										<img src="{{ asset('storage') }}/{{$latest->featured_image}}" alt=""/> 
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell">
													<div class="product__label product__label--right product__label--new"> <span>new</span> </div>
													<a class="btn-buy btn btn--ys btn--xl" href="{{ asset('') }}{{$latest->slug}}"><span >
														<p>{{$latest->name}}</p>
													Buy now!</span></a>
												</span>
											</span>
										</span>
									</span>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<!-- /category section -->
			<!--=== /box-baners ===-->		
			<!-- featured products -->
			<div class="content">
				<div class="container">
					<!-- title -->
					<div class="title-with-button">
						<div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
						<h2 class="text-center text-uppercase title-under">FEATURED PRODUCTS</h2>
					</div>
					<!-- /title --> 
					<!-- carousel -->
					<div class="carousel-products row" id="carouselFeatured">
						@foreach($products as $product)
						<div class="col-lg-3">
							<!-- product -->
							<div class="product">
								<div class="product__inside">
									<!-- product image -->
									<div class="product__inside__image">
										<a href="{{ asset('')}}{{$product->slug}}"> <img src="{{ asset('/storage') }}/{{$product->featured_image}}" alt=""> </a> 
										<!-- quick-view --> 
										<a data-id="{{$product->id}}" class="btn quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>  
										<!-- /quick-view --> 
									</div>
									<!-- /product image --> 											
									<!-- product name -->
									<div class="product__inside__name">
										<h2><a href="{{ asset('')}}{{$product->slug}}">{{$product->name}}</a></h2>
									</div>
									<!-- /product name --> 
									<!-- product price -->
									<div class="product__inside__price price-box">{{number_format($product->price)}}đ</div>
									<!-- /product price --> 
									<div class="product__inside__hover">
										<!-- product info -->
										<div class="product__inside__info">
											<div class="product__inside__info__btns"> <a href="{{ asset('')}}{{$product->slug}}" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Buy This</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> </div>
											<ul class="product__inside__info__link hidden-xs">
												<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
												<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
											</ul>
										</div>
										<!-- /product info --> 
										<!-- product rating -->
										<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
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
			</div>
			<!--=== box-baners ===-->
			<div style="" class="container-fluid box-baners content">
				<div class="row">					
					<div class="col-xs-12">
						<!-- banner -->
						<a href="listing.html" class="banner banner-bg image-bg zoom-in" data-image="homestore/images/lauren.jpg">
							<span class="figure">
								<img style="" src="homestore/images/lauren.jpg" alt=""/>
								<span class="figcaption">
									<span class="block-table">
										<span class="block-table-cell text-center">
											<span class="block font-size88 text-dark text-uppercase font-bold">Buy 2 items</span>
											<span class="block text-uppercase  text-dark font-size38 font-light">get one for free!</span>
											<span class="btn top-indent-sm1 btn--ys btn--l">Shop now!</span>
										</span>
									</span>
								</span>
							</span>
						</a>
						<!-- /banner -->						
					</div>				
				</div>
			</div>
			<!--=== /box-baners ===-->

			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-xl-6">
							<div class="divider--lg visible-sm visible-xs"></div>
							<!-- title -->
							<div class="title-with-button">
								<div class="carousel-products__button  pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
								<h2 class="text-center text-uppercase title-under">Popular</h2>
							</div>
							<!-- /title --> 
							<!-- carousel -->
							<div class="carousel-products row" id="carouselNew">
								@foreach($ranimages as $last)
								<div class="col-lg-3">
									<!-- product -->
									<div class="product">
										<div class="product__inside">
											<!-- product image -->
											<div class="product__inside__image">
												<a href="{{asset('')}}{{$last->slug}}"> <img src="{{asset('/storage')}}/{{$last->featured_image}}" alt=""> </a> 
												<!-- quick-view --> 
												<a data-id="{{$last->id}}" class="btn quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>  
												<!-- /quick-view --> 
											</div>
											<!-- /product image --> 
											<!-- label news -->
											<div class="product__label product__label--right product__label--new"> <span>popular</span> </div>
											<!-- /label news -->
											<!-- product name -->
											<div class="product__inside__name">
												<h2><a href="{{ asset('') }}/{{$last->slug}}">{{$last->name}}</a></h2>
											</div>
											<!-- /product name --> 
											<!-- product price -->
											<div class="product__inside__price price-box">{{number_format($last->price)}}đ</div>
											<!-- /product price --> 
											<div class="product__inside__hover">
												<!-- product info -->
												<div class="product__inside__info">
													<div class="product__inside__info__btns"> <a href="{{ asset('') }}{{$last->slug}}" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>Buy This</a>
													<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
													<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> </div>
													<ul class="product__inside__info__link hidden-xs">
														<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
														<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
													</ul>
												</div>
												<!-- /product info --> 
												<!-- product rating -->
												<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
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
						<div class="divider divider--lg hidden  visible-sm visible-xs"></div>	
						<div class="col-sm-12 col-md-6 col-xl-6">							
							<!-- title -->
							<div class="title-with-button">
								<div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
								<h2 class="text-center text-uppercase title-under">HOT COLOR</h2>
							</div>
							<!-- /title --> 
							<!-- carousel -->
							<div class="carousel-products row" id="carouselSale">
								@foreach($hots as $hot)
								<div class="col-lg-6">
									<!-- product -->
									<div class="product">
										<div class="product__inside">
											<!-- product image -->
											<div class="product__inside__image">
												<a href="{{ asset('') }}{{$hot->slug}}"> <img src="{{ asset('storage') }}/{{$hot->link}}" alt=""> </a> 
												<!-- quick-view --> 
												<a data-id="{{$hot->id}}" class="btn quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
												<!-- /quick-view --> 
											</div>
											<!-- /product image --> 
											<!-- product name -->
											<div class="product__label product__label--right product__label--new"> <span>hot</span> </div>
											<div class="product__inside__name">
												<h2><a href="{{ asset('') }}{{$hot->slug}}">{{$hot->name}}</a></h2>
											</div>
											<!-- /product name --> 
											<!-- product price -->
											<div class="product__inside__price price-box">{{number_format($hot->price)}}đ<span class="price-box__old">{{number_format($hot->original_price)}}đ</span></div>
											<!-- /product price --> 
											<div class="product__inside__hover">
												<!-- product info -->
												<div class="product__inside__info">
													<div  class="product__inside__info__btns"> <a href="{{ asset('') }}{{$hot->slug}}" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span>Buy This</a>
													<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
													<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
													<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> </div>
													<ul class="product__inside__info__link hidden-xs">
														<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
														<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
													</ul>
												</div>
												<!-- /product info --> 
												<!-- product rating -->
												<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
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
					</div>
				</div>
			</div>
			<!-- banners -->
			<div class="content fullwidth indent-col-none">
				<div class="container">
					<div class="row">
						<div class="banner-carousel">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<a href="listing.html" class="banner zoom-in">
								<span class="figure">
									<img src="homestore/images/pink3.jpg" alt=""/>
									<span class="figcaption">
										<span class="block-table">
											<span class="block-table-cell">
												<span style="color:#1fc0a0" class="banner__title size3">hường</span>
												<span style="color:#1fc0a0" class="text text-uppercase">cá tính</span>
												<span class="text size3 color">20% OFF</span>
											</span>
										</span>
									</span>
								</span>
								</a>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<a href="listing.html" class="banner zoom-in">
									<span class="figure">
										<img src="homestore/images/yellow.jpg" alt=""/>
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell">
													<span class="banner__title size4">VÀNG<br> rực rỡ</span>
													<span class="text size2">CHÀO HÈ</span>
													<span class="btn btn--ys btn--xl offset-top">Shop now!</span>
												</span>
											</span>
										</span>										
									</span>
								</a>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<a href="listing.html" class="banner zoom-in">
									<span class="figure">
										<img src="homestore/images/black.jpg" alt=""/>
										<span class="figcaption">
											<span class="block-table">
												<span class="block-table-cell">
													<span class="banner__title size3-1">15% OFF</span>
													<span class="text size1"><em>đen đơn giản</em></span>
													<span class="btn btn--ys btn--xl">Shop now!</span>
												</span>
											</span>
										</span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /banners -->
			<!-- brands-carousel -->
			<div class="content section-indent-bottom">
				<div class="container">
					<div class="row">
						<div class="brands-carousel">
							<div><a href="#"><img src="homestore/images/custom/brand-01.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-02.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-03.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-04.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-05.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-06.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-07.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-08.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-09.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-10.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-01.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-02.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-03.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-04.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-05.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-06.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-07.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-08.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-09.png" alt=""></a></div>
							<div><a href="#"><img src="homestore/images/custom/brand-10.png" alt=""></a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- /brands-carousel -->
			<!-- banners -->
			<div class="content">
				<div class="container-fluid box-baners">
					<div class="row">
						<div class="banner-carousel-1">
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
								<!-- banner -->
								<a href="listing.html" class="banner banner-md bg-pink  zoom-in">
									<span class="figure bg-none">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell">
													<span class="block font-size90 text-uppercase font-light">75% off</span>
													<span class="btn btn--border btn--xl">Shop now!</span>
												</span>
											</span>
										</span>
									</span>
								</a>
								<!-- /banner -->
							</div>
							<!-- / -->
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
								<a href="listing.html" class="banner banner-md bg-green zoom-in">
									<span class="figure bg-none">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell">
												   <span class="block font-size40 text-uppercase font-medium">Order Return</span>
													<span class="block block-top-md font-size20 text-uppercase font-light">Returns within</span>
													<em class="block  block-top-sm font-size46 main-font">7 days</em>
												</span>
											</span>
										</span>
									</span>
								</a>
							</div>
							<!-- / -->
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
								<a href="listing.html" class="banner banner-md bg-green-dark zoom-in">
									<span class="figure bg-none">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell">
												   <span class="block font-size40 text-uppercase font-medium">Free<br>shipping</span>
													<span class="block font-size24 text-uppercase font-light block-top-md ">on orders over $99.</span>
													<em class="block block-top-md font-size16 main-font">This offer is valid on all our store items.</em>
												</span>
											</span>
										</span>
									</span>
								</a>
							</div>
							<!-- / -->
							<!--  -->
							<div class="col-md-3 col-sm-6 col-xs-12">
								<a href="listing.html" class="banner banner-md bg-green zoom-in">
									<span class="figure bg-none">
										<span class="figcaption text-center">
											<span class="block-table">
												<span class="block-table-cell">
												   <em class="block font-size26 text-uppercase main-font">COD</em>
													<span class="block block-top-md font-size40 text-uppercase font-medium">Cash<br>on delivery</span>
												</span>
											</span>
										</span>
									</span>
								</a>
							</div>
							<!-- / -->
						</div>
					</div>
				</div>
			</div>
			<!-- /banners -->			
		</div>
		<!-- End CONTENT section -->

      <!-- Modal (quickViewModal) -->		
		<div class="modal  modal--bg fade"  id="quickViewModal">
		  <div class="modal-dialog white-modal">
		    <div class="modal-content container">
		    	<div class="modal-header">
		       	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
		     	 </div>
		    	<!--  -->
		    	<div class="product-popup">
					<div class="product-popup-content">
					<div class="container-fluid">
						<div class="row product-info-outer">
							<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
								<div class="product-main-image">
									<div class="product-main-image__item"><img id="featured_image" src="" alt="" /></div>
								</div>
							</div>
							<div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
								<div class="wrapper">
									<div class="product-info__sku pull-left">SKU: <strong>mtk012c</strong></div>
									<div class="product-info__availabilitu pull-right">Availability:   <strong class="color">In Stock</strong></div>
								</div>
								<div class="product-info__title">
									<h2 id="name"></h2>
								</div>
								<div class="price-box product-info__price"><span id="price" class="price-box__new"></span>đ <span id="original_price" class="price-box__old"></span><span class="price-box__old">đ</span></div>
								<div class="divider divider--xs product-info__divider"></div>
								<div class="product-info__description">
									<div class="product-info__description__brand"><img src="homestore/images/custom/brand.png" alt=""> </div>
									<div id="content" class="product-info__description__text"></div>
								</div>
								<form action="" method="POST" role="form">
								@csrf
								<div class="divider divider--xs product-info__divider"></div>
								<div class="wrapper">
									<div class="pull-left"><span class="option-label">COLOR:</span></div>
									<div class="pull-right required">* Required Fields</div>
								</div>
								<ul class="options-swatch options-swatch--color options-swatch--lg">
									
								</ul>					
								<div class="wrapper">
									<div class="pull-left"><span class="option-label">SIZE:</span></div>
									<div class="pull-left required">*</div>
								</div>
								<ul class="options-swatch options-swatch--size options-swatch--lg listsize1">
								</ul>
								<div class="divider divider--sm"></div>
								<div class="wrapper">
									<div class="pull-left"><span class="qty-label">QTY:</span></div>
									<div class="pull-left">
										<div class="number input-counter">
										    <span class="minus-btn"></span>
										    <input id="qty_product" name="qty" readonly type="text" value="1" size="5"/>
										    <span class="plus-btn"></span>
										</div>
									</div>
									
									<div class="pull-left"><button id="add-product" productId="" type="submit" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
								</div>
								</form>
								<ul class="product-link">
									<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
									<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#"><span class="text">Add to compare</span></a></li>
								</ul>
							</div>
						</div>
					</div>
					</div>
				</div>
		    	<!-- / -->
		    </div>
		  </div>
		</div>
		<!-- / Modal (quickViewModal) -->
		<!-- Modal (newsletter) -->		
		{{-- <div class="modal  modal--bg fade"  id="newsletterModal" data-pause=2000>
		  <div class="modal-dialog white-modal">
		    <div class="modal-content modal-md">
		      <div class="modal-bg-image bottom-right"> 
			      <img  src="homestore/images/custom/newsletter-bg.png" alt="" class="img-responsive"> 
			  </div>
		      <div class="modal-block">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			      </div>
			      <div class="modal-newsletter text-center">
			      	    <img class="logo replace-2x img-responsive1" src="homestore/images/logo.png" alt=""/>
			            <h2 class="text-uppercase modal-title">JOIN US NOW!</h2>
			            <p class="color-dark">And get hot news about the theme</p>
			            <p class="color font24 custom-font font-lighter">
			            	YOURStore 
			            </p>
			            <form  method="post" name="mc-embedded-subscribe-form" target="_blank" class="subscribe-form">
			           		<div class="row-subscibe">			           				            		 
								<input  type="text" name="subscribe"   placeholder="Your E-mail">
								<button type="submit" class="btn btn--ys btn--xl">SUBSCRIBE</button>
			           		</div>
							<div class="checkbox-group form-group-top clearfix">
			                  <input type="checkbox" id="checkBox1">
			                  <label for="checkBox1"> 
			                  	<span class="check"></span>
			                  	<span class="box"></span>
			                  	&nbsp;&nbsp;DON&#39;T SHOW THIS POPUP AGAIN
			                  </label>
			                </div>			               			                
			                
			            </form>
			      </div>
		      </div>
		    </div>
		  </div>
		</div> --}}
		<!-- / Modal (newsletter) -->
		<!--================== /modal ==================-->
	@include('home.footer')
	<script src="js/jquery.number.min.js"></script>
	<script>
		var asset = '{{ asset('') }}';
	</script>
	<script src="js/home.js"></script>
	</body>
</html>