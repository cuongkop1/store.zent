@extends('admin.layouts.master')
@section('content')
	@if(session()->has('flag'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thống báo!</strong> {{session()->get('flag')}}
		</div>
		@endif
	<div class="card-body table-reponsive">
		<h3>Sản phẩm: {{$products->name}}</h3><br>
		<a style="margin-bottom: 20px" class="btn btn-primary" href="{{asset('admin/product-detail')}}/{{$products->id}}/add">Add</a>
		<table id="detail-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($product_details as $detail)
            <tr>
                <td>{{$detail->id}}</td>
                <td>
                	<center>
                		<div style="width: 100px;height: 100px; background:{{$detail->code}};border: 1px solid #ccc; border-radius: 15px">
	                	</div>
	                </center>
                </td>
                <td>{{$detail->name}}</td>
                <td>{{$detail->quantity}}</td>
                <td>
                	<center><img style="width: 126px; height: 126px" src="{{asset('/storage')}}/{{$detail->product_detail_image}}" alt=""></center>
                </td>
                <td>
					<button detailId="{{$detail->id}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
					<a href="{{ asset('admin/product-detail') }}/{{$detail->id}}/edit" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<button detailId="{{$detail->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Image</th>
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
		      		<h3>{{$products->name}}</h3><br>
					<center><img style="width: 80%" id="product_detail_image" src="" alt=""></center>
					<h4>Size: <span id="size"></span></h4>
		        	<h4>Số lượng: <span id="quantity"></span></h4>
		        	<h4>Ngày tạo: <span id="created_at"></span></h4>
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
		        	<form action="" method="post" role="form">
		        		@csrf
		        		{{method_field('put')}}
		        		{{-- <input name="product_id" id="edit_product_id" type="hidden" class="form-control" value=""> --}}
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
		        			<select class="form-control" name="color" id="edit_color">
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
	<script>
		$(document).ready(function() {
		    $('#detail-table').DataTable();
		});
	</script>
	<script type="text/javascript" src="{{ asset('js/detail.js') }}"></script>
@endsection
