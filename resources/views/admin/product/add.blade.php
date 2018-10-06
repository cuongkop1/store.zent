@extends('admin.layouts.master')
@section('content')
	<div class="container">
		@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		<form enctype="multipart/form-data" action="{{asset('')}}admin/product/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới sản phẩm</legend>
		
			<div class="form-group">
				<label for="">Name</label>
				<input name="name" type="text" value="{{ old('name') }}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Original Price</label>
				<input name="original_price" value="{{ old('original_price') }}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Price</label>
				<input name="price" type="number" value="{{ old('price') }}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Description</label>
				<input name="description" type="text" value="{{ old('description') }}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Content</label>
				<textarea name="content" value="{{ old('content') }}" rows="10"></textarea>
				{{-- <input name="content" type="text" value="{{ old('content') }}" class="form-control" id=""> --}}
			</div>
			<div class="form-group">
				<label for="">Product Code</label>
				<input name="product_code" type="text" value="{{ old('product_code') }}" class="form-control" id="">
				
			</div>
			<div class="form-group">
				<label for="">Featured Image</label>
				<input name="featured_image" type="file" value="{{ old('featured_image') }}" class="form-control" id="">
			</div>

			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	
@endsection

@section('footer')
	<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
	<script>
	    CKEDITOR.replace( 'content' );
	</script>
@endsection
