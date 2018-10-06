<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<title>YOURStore - Responsive HTML5 Template</title>
		@include('home.link')
		<meta name="csrf-token" content="{{ csrf_token() }}">
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
	    @include('home.header')
		<!-- breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="index.html" class="icon icon-home"></a></li>					
					<li class="active">Cart</li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs --> 
		<!-- CONTENT section -->
		<div id="pageContent">
			<div class="container">				
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center text-uppercase title-under">MY CART</h1>
				</div>
				<!-- /title -->
				<!-- table -->
				<table id="cart-table" class="table-wishlist">
					<thead>
						<tr>
							<th>Product Details</th>
							<th>Price & Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $product)
						<tr style="width: 60%">
							<td style="">
								<table style="margin-bottom: 0;">								
									<tbody>
										<tr style="width: 60% !important">
											<td>
												<div class="table-wishlist__product-image">
													<a href="{{ asset('') }}{{$product->options->slug}}">
														<img style="width: 120px;height: 120px" class="img-reponsive" style="" src="{{asset('storage')}}/{{$product->options->img}}" alt="">
													</a>
												</div>													
											</td>
											<td>
												<h5 class="table-wishlist__product-name text-uppercase color">
													<a href="{{ asset('') }}{{$product->options->slug}}">{{$product->name}}</a></h5>
												<ul class="table-wishlist__list-parameters">
													<li>
														<span>Color: </span>{{$product->options->color}}
													</li>	
													<li>
														<span>Size:</span>{{$product->options->size}}
													</li>									
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td style="width: 30% !important; padding-top: 10px;padding-bottom: 0;vertical-align: middle">
								<p style="margin-bottom: 0">
									<span class="pro_price table-wishlist__product-price">{{number_format($product->price)}}đ</span>
								</p>
								<div class="wrapper">
									<div class=""><span class="qty-label">QTY:</span></div>
									<div class="">
										<!--  -->
										<div class="number input-counter">
										    <span class="btn-down minus-btn" data-id="{{$product->rowId}}"></span>
										    <input class="quantity update-qty" readonly name="qty" type="number" value="{{$product->qty}}" size="5"/>
										    <span data-id="{{$product->rowId}}" class="btn-up plus-btn"></span>
										</div>
										<!-- / -->
									</div>
								</div>
								<p style="margin-bottom: 0">
									<a class="btn btn--ys btn--light" href="{{asset('cart/delete')}}/{{$product->rowId}}"><span class="icon icon-create"></span>Delete</a>
								</p>
							</td>
							<td style="width: 10% !important;padding-top: 10px;padding-bottom: 0;text-align: right">
								<span class="total_price table-wishlist__product-price">{{number_format($product->price*$product->qty)}}đ</span>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<th colspan="2" style="text-align: right">Total Price:</th>
						<th class="table-wishlist__product-price" style="text-align: right">
							{{$total}}đ
						</th>
					</tfoot>
				</table>
				<!-- /table -->
				<!-- button -->
				<div class="divider divider--xs"></div>				
		        <div class="row wishlist-button">
		        	<div class="col-xs-12 col-lg-10 text-right">
		        		<a href="{{ asset('check-out') }}" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket "></span>CHECK OUT</a>
		        	</div> 	

		        </div>	
				<!-- /button -->
			</div>
		</div>
		<!-- End CONTENT section --> 
		<!-- FOOTER section -->
		@include('home.footer')
		{!! Toastr::render() !!}
	</body>
</html>
<script>
	jQuery( document ).ready(function( $ ) {

		$('.btn-down').on('click', function(e){
	    	e.preventDefault();
			rowId = $(this).data('id');
			$.ajax({
				type: 'post',
	            url:'/cart/minus',
	            data:{rowId:rowId},
	            success: function(response){
	            	location.reload();
	            }
			});
		});

		$('.btn-up').on('click', function(e){
			e.preventDefault();
			rowId = $(this).data('id');
			$.ajax({
				type: 'post',
	            url:'/cart/plus' ,
	            data:{rowId:rowId},
	            success: function(response){
	                location.reload();
	            }
			});
		});
	});
</script>
