@extends('admin.layouts.master')
@section('style')
@endsection
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
	<form enctype="multipart/form-data" action="{{asset('')}}admin/product/{{$products->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật sản phẩm</legend>
	
		<div class="form-group">
			<label for="">Name</label>
			<input name="name" type="text" class="form-control" value="{{$products->name}}" id="">
		</div>
		<div class="form-group">
			<label for="">Original Price</label>
			<input name="original_price" type="number" class="form-control" value="{{$products->original_price}}" id="">
		</div>
		<div class="form-group">
			<label for="">Price</label>
			<input name="price" type="number" class="form-control" value="{{$products->price}}" id="">
		</div>
		<div class="form-group">
			<label for="">Description</label>
			<input name="description" value="{{$products->description}}" type="text" class="form-control" id="">
		</div>
		<div class="form-group">
			<label for="">Content</label>
			<input name="content" value="{{$products->content}}" type="text" class="form-control" id="">
		</div>
		<div class="form-group">
			<label for="">Product Code</label>
			<input name="product_code" value="{{$products->product_code}}" type="text" class="form-control" id="">
		</div>
		<div class="form-group">
			<label for="">Featured Image</label>
			{{-- <input name="featured_image" type="text" value="{{$products->featured_image}}" type="text" class="form-control" id="box1"> --}}
			<input name="featured_image" type="file" class="form-control" id="box2">
		</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection

@section('footer')
{{-- 	<script>
		$(function(){
			$('#check').on('change', function(){
				if (check.checked == false){
				    box1.disabled = false;
				    box2.disabled = true;
				}else{
				    box1.disabled = true;
				    box2.disabled = false;
				}
			});
		});
		
	</script> --}}
@endsection