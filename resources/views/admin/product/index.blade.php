@extends('admin.layouts.master')
@section('style')
	<style>
		.add-image:hover{
			background-color: #00D9BE !important;
		}
		.btn-detail:hover{
			background: #CC577D !important;
		}
		.image{
			position: relative;
			margin-right: 10px 
		}
		.btn-close{
			cursor: pointer;
			border: none;
			position: absolute;
			right: 0;
			border-radius: 5px;
			background-color: red;
		}
	</style>
@endsection
@section('content')
	<a href="{{ asset('admin/product/add') }}" class="btn btn-info">Add</a>
	@if(session()->has('flag'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thống báo!</strong> {{session()->get('flag')}}
		</div>
		@endif
	<div class="card-body table-reponsive">
		<table class="table table-reponsive table-striped table-bordered" id="product-table"">
		    <thead>
			     <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Price</th>
			        <th>Product Code</th>
			        <th>Image</th>
			        <th>Action</th>
			      </tr>
		    </thead>
		    <tfoot>
			     <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Price</th>
			        <th>Product Code</th>
			        <th>Image</th>
			        <th>Action</th>
			      </tr>
		    </tfoot>
		    
		</table>
	</div>
	{{-- modal-show --}}
	<div id="show" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    	<div class="modal-content" style="width:700px">
	      		<div class="modal-header">
	      			<h4 class="modal-title">Detail</h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	      		</div>
		      	<div class="modal-body">
		        	<h3 id="name"></h3>
		        	<h4 id="description"></h4>
		        	<center><img style="width: 50%;" id="featured_image" src=""></center>
		        	<p id="content"></p>
		        	<h4>Ngày tạo</h4>
		        	<p id="created_at"></p>
		        	<h4>Gía:</h4>
					<p id="price"></p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

	{{-- modal-add --}}
	<div class="modal fade" id="modal-images">
		<div class="modal-dialog">
			<div class="modal-content" style="width: 700px">
				<div class="modal-header">
					<h4 class="modal-title" >Pictures</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				 	<form class="form-inline images-preview" action="" method="post" role="form" id="form-upload-images" enctype="multipart/form-data">
				 		@csrf
					  	<div class="form-group">
					    	<div class="field" align="left">
			                	<input type="file" id="images_modal" name="link[]" multiple />
			              	</div>
					  	</div>
					 
					  	<button type="submit" class="btn btn-primary btn-upload" data-id=""> Upload</button>
					</form>
	              	<div class="row images" style="margin-top: 20px; border-top: 1px solid #ccc;padding-top: 10px" class="row"></div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('footer')
<script>
	var asset = '{{ asset('/storage') }}';
</script>
	<script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
	{{-- <script src="{{asset('js/simple.money.format.js')}}"></script>
	<script>
		$(function(){
			$('#price').simpleMoneyFormat();
		})
	</script> --}}
@endsection
