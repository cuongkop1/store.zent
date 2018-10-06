@extends('admin.layouts.master')
@section('content')
	@if(session()->has('flag'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thống báo!</strong> {{session()->get('flag')}}
		</div>
		@endif
	<div class="card-body table-reponsive">
		<table class="table table-reponsive table-hover table-bordered" id="productDetail-table"">
		    <thead>
			    <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Color</th>
			        <th>Size</th>
			        <th>Image</th>
			        <th>Action</th>
			    </tr>
		    </thead>
		    <tfoot>
			    <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Color</th>
			        <th>Size</th>
			        <th>Created At</th>
			        <th>Action</th>
			    </tr>
		    </tfoot>
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
		      		<label id="name"></label>
					<center><img style="width: 80%" id="product_detail_image" src="" alt=""></center>
					<h4>Size:</h4>
		        	<p id="size"></p>
		        	<h4>Số lượng:</h4>
		        	<p id="quantity"></p>
		        	<h4>Ngày tạo:</h4>
		        	<p id="created_at"></p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

	

	{{-- modal-edit --}}
	<div id="edit" class="modal fade" role="dialog">
	  	<div class="modal-dialog" style="max-width: 800px; margin-left: 30%">
	    	<div class="modal-content" style="width: 80%">
	      		<div class="modal-header">
	      			<h4 class="modal-title">Edit</h4>
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
		      	<div class="modal-body">
		        	<form action="" method="" role="form">
		        		@csrf
		        		{{method_field('put')}}
		        		<input name="product_id" id="edit_product_id" type="hidden" class="form-control" value="">
		        		<div class="form-group">
		        			<label for="">Size</label>
		        			<select name="size" id="edit_size" class="form-control">
		        				<option value="S">S</option>
		        				<option value="M">M</option>
		        				<option value="L">L</option>
		        				<option value="XL">XL</option>
		        				<option value="XXL">XXL</option>
		        				<option value="3XL">3XL</option>
		        				<option value="4XL">4XL</option>
		        			</select>
		        		</div>
		        		<div class="form-group">
		        			<label for="">Color</label><br>
		        			<select class="form-control" name="edit_color" id="edit_color">
		        				@foreach($colors as $color)
		        					<option value="{{$color->code}}">{{$color->name}}</option>
		        				@endforeach
		        			</select>
		        		</div>
		        		<div class="form-group">
		        			<label for="">Quantity</label>
		        			<input value="" name="quantity" type="text" class="form-control" id="edit_quantity">
		        		</div>
		        		<div class="form-group">
		        			<label for="">Image</label>
		        			<input type="file" class="form-control" id="edit_product_detail_image" name="product_detail_image">
		        		</div>

		        		<button id="update" data-id="" type="submit" class="btn btn-primary">Update</button>
		        	</form>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

@endsection
@section('footer')
	<script type="text/javascript">
		var asset='{{asset('/')}}';
		var asset2 = '{{ asset('/storage') }}';
	</script>
	<script type="text/javascript" src="{{ asset('js/productDetail.js') }}"></script>
@endsection
