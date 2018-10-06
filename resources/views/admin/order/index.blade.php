@extends('admin.layouts.master')
@section('content')
	<a href="{{ asset('admin/order/add') }}" class="btn btn-info">Add</a>
	@if(session()->has('flag'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thống báo!</strong> {{session()->get('flag')}}
		</div>
		@endif
	<div class="card-body table-reponsive">
		<table class="table table-reponsive table-hover table-bordered" id="order-table"">
		    <thead>
			     <tr>
			        <th>ID</th>
			        <th>Code</th>
			        <th>Product ID</th>
			        <th>Total price</th>
			        <th>Customer name</th>
			        <th>Customer address</th>
			        <th>Action</th>
			      </tr>
		    </thead>
		    
		</table>
	</div>
	{{-- modal-show --}}
	<div id="show" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	      			<h4 class="modal-title">Detail</h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	
	      		</div>
		      	<div class="modal-body">
		        	<p id="name"></p>
		        	<p id="code"></p>
		        	<p id="product_id"></p>
		        	<p id="total_price"></p>
		        	<p id="user_id"></p>
		        	<p id="customer_name"></p>
		        	<p id="customer_address"></p>
		        	<p id="customer_mobile"></p>
		        	<p id="status"></p>
		        	<p id="created_at"></p>
		        	<p id="updated_at"></p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

@endsection
@section('footer')
	<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endsection
