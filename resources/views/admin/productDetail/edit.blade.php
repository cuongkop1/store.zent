@extends('admin.layouts.master')
@section('content')
	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<p>{{$productDetails->id}}</p>
	<form enctype="multipart/form-data" action="{{asset('')}}admin/product-detail/{{$productDetails->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật chi tiết sản phẩm</legend>

		<div class="form-group">
			<label for="">Size</label>
			<select class="form-control" name="size_id">
				@foreach($sizes as $size)
				<option value="{{$size->id}}">{{$size->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Color</label><br>
			{{-- <input style="width:100px" name="color" type="color" value="{{$productDetails->color}}" id=""> --}}
			<select class="form-control" name="color_id">
				@foreach($colors as $color)
				<option value="{{$color->id}}">{{$color->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Quantity</label>
			<input name="quantity" value="{{$productDetails->quantity}}" type="number" class="form-control" id="">
		</div>
		<div class="form-group">
			<label for="">Image</label>
			<input name="product_detail_image" type="file" class="form-control" id="">
		</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
