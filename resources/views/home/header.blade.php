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
<div class="header-wrapper">
	<header id="header" class="header-layout-05">
		<!-- top-header -->
		<div class="container">
			<div class="row">
				<!-- col-left -->
				<div class="col-sm-3 text-left">
					<!-- slogan start -->
					<div class="slogan"> Welcome to Zent Store! </div>
					<!-- slogan end --> 	
				</div>
				<!-- /col-left -->
				<!-- col-right -->
				<div class="col-sm-9 text-right">
					<div class="settings">
						<!-- currency start -->
						<div class="currency dropdown text-right">
							<div class="dropdown-label hidden-sm hidden-xs">Currency:</div>
							<a class="dropdown-toggle" data-toggle="dropdown"> USD<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-menu--xs-full">
								<li><a href="#">GBP - British Pound Sterling</a></li>
								<li><a href="#">EUR - Euro</a></li>
								<li><a href="#">USD - US Dollar</a></li>
								<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
							</ul>
						</div>
						<!-- currency end --> 
						<!-- language start -->
						<div class="language dropdown text-right">
							<div class="dropdown-label hidden-sm hidden-xs">Language:</div>
							<a class="dropdown-toggle" data-toggle="dropdown"> English<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-menu--xs-full">
								<li><a href="#">English</a></li>
								<li><a href="#">German</a></li>
								<li><a href="#">Spanish</a></li>
								<li><a href="#">Russian</a></li>
								<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
							</ul>
						</div>
						<!-- language end --> 
					</div>
				</div>
				<!-- /col-right -->
			</div>
		</div>
		<!-- /top-header -->
		<div class="container">
			<div class="row text-center">
				<!--  -->
				<div class="text-right extra-right">
					<!-- search start -->
					<div class="search link-inline">
						<a href="#" class="search__open"><span class="icon icon-search"></span></a>
						<div class="search-dropdown">
							<form action="#" method="get">
								<div class="input-outer">
									<input type="search" name="search" value="" maxlength="128" placeholder="SEARCH:">
									<button type="submit" title="" class="icon icon-search"></button>
								</div>
								<a href="#" class="search__close"><span class="icon icon-close"></span></a>									
							</form>
						</div>
					</div>
					<!-- search end -->			
					<!-- account menu start -->
					<div class="account link-inline">
						<div class="dropdown text-right">
							<a class="dropdown-toggle" data-toggle="dropdown">
							<span class="icon icon-person "></span>
							</a>
							<ul class="dropdown-menu dropdown-menu--xs-full">
								<li><a href="login_form.html"><span class="icon icon-person"></span>My Account</a></li>
								<li><a href="wishlist.html"><span class="icon icon-favorite_border"></span>My Wishlist</a></li>
								<li><a href="compare.html"><span class="icon icon-sort"></span>Compare</a></li>
								<li><a href="checkout-step.html"><span class="icon icon-done_all"></span>Checkout</a></li>
								<li><a href="#"  data-toggle="modal" data-target="#modalLoginForm"><span class="icon icon-lock"></span>Log In</a></li>
								<li><a href="login_form.html"><span class="icon icon-person_add"></span>Create an account</a></li>
								<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
							</ul>
						</div>
					</div>	
				</div>
				<!-- / -->
				<!-- logo start --> 
				<a href="{{ asset('/') }}"><img class="logo replace-2x img-responsive" src="homestore/images/logo.png" alt=""/></a> 
				<!-- logo end --> 
			</div>
		</div>
		<!-- nav -->

		<div class="stuck-nav">
			<div class="container">
				<div class="col-stuck-menu">
					<div class="row text-center">					
						<!-- navigation start -->
						<nav class="navbar">
								<div class="responsive-menu mainMenu">									
								<!-- Mobile menu Button-->
								<div class="col-xs-2 visible-mobile-menu-on">
									<div class="expand-nav compact-hidden">
										<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
											<div class="navbar-toggle"> 
												<span class="icon-bar"></span> 
												<span class="icon-bar"></span> 
												<span class="icon-bar"></span> 
												<span class="menu-text">MENU</span> 
											</div>
										</a>
									</div>
								</div>
								<!-- //end Mobile menu Button -->
								<ul class="nav navbar-nav">
									<li class="dl-close"><a href="#"><span class="icon icon-close"></span>close</a></li>	
									<li class="dropdown dropdown-mega-menu">					
										<a href="{{ asset('/') }}" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">Home</span></a>
									</li>											
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="listing.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">LISTING</span></a>
									</li>
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="product.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">PRODUCT</span></a>
									</li>
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="gallery-layout-1.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">GALLERY</span></a>
									</li>
									<li class="dropdown dropdown-mega-menu dropdown-two-col">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="{{ asset('/admin/dashboard') }}" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">DASHBOARD</span></a>
									</li>
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="listing.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">WOMEN’s<span class="badge badge--menu">NEW</span></span></a>
									</li>
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="listing.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">MEN’s<span class="badge badge--menu badge--color">SALE</span></span></a>
									</li>
								</ul>
								<div style="margin-left: 20px;top: -5px" class="cart link-inline">
									<div class="dropdown text-right">
										<a href="{{ asset('cart') }}">
										<span class="icon icon-shopping_basket"></span>
										<div style="position: relative;" class="reload-div">
											<span style="top:-60px;right: -30px" class="badge badge--cart">{{$count}}</span>
										</div>
										
										</a>
									</div>
								</div>
							</div>
						</nav>
						<!-- navigation finish -->
					</div>
				</div>
			</div>
		</div>
		<!-- /nav -->
	</header>
</div>