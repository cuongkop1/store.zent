<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		@include('home.link')
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
	@include('home.header')
	<!-- CONTENT section -->
		<div id="pageContent">
			<div style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 40px 0" class="container">				
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center text-uppercase title-under">Checkout</h1>
				</div>
				<!-- /title -->
				<div class="row">
					<section class="col-md-8 col-lg-8">
						<!-- checkout-step -->
						<div class="panel-group" id="checkout">
			              <div class="panel panel-checkout" role="tablist">
			              	<!-- panel heading -->
			                <div class="panel-heading active" role="tab">
			                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" href="#collapseFive">ORDER REVIEW</a> </h4>
			                  <div class="panel-heading__number">1</div>
			                </div>
			                <!-- /panel heading -->
			                <!-- panel body -->
			                <!-- panel body -->
			                <div id="collapseFive" class="panel-collapse in" role="tabpanel">
			                  <div class="panel-body">
			                    <p class="clearfix">
			                    </p>
			                    <div class="clearfix"></div>
			                    <div class="text-right link-top">
									<span class="color-dark">Forgot an Item?</span> <a class="link-underline" href="{{ asset('cart') }}">Edit Your Cart</a>
								</div>
			                    <div class="btn-top">
			                    	<!-- order-review-table -->
									<table class="order-review-table">
										<thead>
											<tr>
												<th>Product</th>								
												<th>Price</th>
												<th>Qty</th>
												<th>Total</th>		
											</tr>
										</thead>
										<tbody>
											@foreach($content as $product)
											<tr>												
												<td>
													<h5 class="order-review-table__product-name text-left text-uppercase">
														<a href="{{ asset('') }}{{$product->name}}">{{$product->name}}</a>
													</h5>
													<ul class="order-review-table__list-parameters">
														<li>
															<span>Color:</span>{{$product->options->color}}
														</li>
														<li>
															<span>Size:</span>{{$product->options->size}}
														</li>
													</ul>									
												</td>
												<td>
													<div class="order-review-table__product-price unit-price">
														{{number_format($product->price)}}đ
													</div>
												</td>
												<td>
													<span class="color">{{$product->qty}}</span>
												</td>
												<td>
													<div class="order-review-table__product-price subtotal">
														{{number_format($product->price*$product->qty)}}đ
													</div>
												</td>
											</tr>
											@endforeach											
										</tbody>
									</table>
									<!-- /order-review-table -->
									<!-- order-review-total -->
									<div class="row clearfix">
										<div class="pull-right col-xl-6 col-lg-9 col-md-9 col-xs-12 btn-top">
											<div class="order-review-total">
												<table class="table-total">
													<tfoot>
														<tr>
															<th>GRAND TOTAL:</th>
															<td>{{$total}}đ</td>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
									<!-- /order-review-total -->
			                    </div>
			                  </div>
			                </div>
			                <!-- /panel body -->
			                
			              </div>
			              <div class="panel panel-checkout" role="tablist">
			              </div>
			              <div class="panel panel-checkout" role="tablist">
			                <!-- panel heading -->
			                <!-- /panel heading -->
			              </div>
			              <div class="panel panel-checkout" role="tablist">
			              	<!-- panel heading -->
			                <!-- /panel heading -->
			                <!-- panel body -->
			              <div class="panel panel-checkout" role="tablist">
			              	<!-- panel heading -->
			                <div class="panel-heading active" role="tab">
			                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" href="#collapseOne">YOUR INFORMATION</a> </h4>
			                  <div class="panel-heading__number">2</div>
			                </div>
			                <!-- /panel heading -->
			                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel">
			                  <div class="panel-body">
			                  	@if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
			                    <form action="{{asset('')}}check-out/store" method="POST" role="form">
			                    	@csrf
			                    	<span class="note pull-right">* Required Fields</span>
			                    	<input type="hidden" name="total_price" value="{{$total}}">
			                    	{{-- <input type="hidden" name="product_id" value=""> --}}
			                    	<div class="form-group">
									    <label for="checkoutFormFirstName">Your Name<sup>*</sup></label>
									    <input name="customer_name" type="text" class="form-control" id="checkoutFormFirstName">
								    </div>
								    <div class="form-group">
									    <label for="checkoutFormLastName">ZIP CODE</label>
									    <input type="text" class="form-control">
								    </div>
								    <div class="form-group">
									    <label for="checkoutFormCompany">Company</label>
									    <input type="text" class="form-control">
								    </div>
								    <div class="form-group">
									    <label for="checkoutFormAddress1">Address<sup>*</sup></label>
									    <input name="customer_address" type="text" class="form-control" id="checkoutFormAddress1">
								    </div>								    
								    <div class="form-group">
									    <label for="checkoutFormTelephone">Telephone  <sup>*</sup></label>
									    <input name="customer_mobile" type="text" class="form-control" id="checkoutFormTelephone">
								    </div>
								    	
								    <p class="clearfix text-right">
										<button type="submit" class="btn btn-checkout btn--ys btn--xl">PLACE ORDER 
										<span class="icon icon--flippedX icon-reply"></span>
										</button>
									</p>
			                    </form>
			                  </div>
			                </div>
			                <!-- /panel body -->
			              </div>			              
			            </div>
						<!-- /checkout-step -->
					</section>
					<aside class="col-md-4 col-lg-4 shopping_cart-aside">
						<!--  -->
						<div class="box-border box-border--padding fill-bg">							
							<h4 class="mega title-bottom1">YOUR CHECKOUT PROGRESS</h4>
							<!--  -->
							<div class="block-underline-top">
								<a class="pull-right link-functional" href="#">Change</a>
								<h6 class="small">BILLING ADDRESS</h6>
								<ul class="categories-list">
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>
									<li><a href="#">Conse ctetur adipisicing </a></li>
									<li><a href="#">Elit sed do eiusmod tempor</a></li>
									<li><a href="#">Incididunt ut labore </a></li>
									<li><a href="#">Et dolore magna aliqua</a></li>
								</ul>
							</div>						
							<!-- / -->
							<!--  -->
							<div class="block-underline-top">
								<a class="pull-right link-functional" href="#">Change</a>
								<h6 class="small">SHIPPING ADDRESS</h6>
								<ul class="categories-list">
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>
									<li><a href="#">Conse ctetur adipisicing </a></li>
									<li><a href="#">Elit sed do eiusmod tempor</a></li>
									<li><a href="#">Incididunt ut labore </a></li>
									<li><a href="#">Et dolore magna aliqua</a></li>
								</ul>
							</div>						
							<!-- / -->
							<!--  -->
							<div class="block-underline-top">
								<a class="pull-right link-functional" href="#">Change</a>
								<h6 class="small">SHIPPING METHOD</h6>
								<ul class="categories-list">
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>									
								</ul>
							</div>						
							<!-- / -->
							<!--  -->
							<div class="block-underline-top">
								<a class="pull-right link-functional" href="#">Change</a>
								<h6 class="small">PAYMENT METHOD</h6>
								<ul class="categories-list">
									<li><a href="#">Lorem ipsum dolor sit amet </a></li>									
								</ul>
							</div>						
							<!-- / -->
						</div>
					
						
					</aside>
				</div>					
			</div>
		</div>
		<!-- End CONTENT section --> 
	@include('home.footer')
</body>
</html>
