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
	<form action="{{asset('')}}admin/product-gallery/{{$productGalleries->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật ảnh sản phẩm</legend>
	
			<div class="form-group">
				<label for="">Color ID</label>
				<input name="color_id" value="{{$productGalleries->color_id}}" type="number" class="form-control" id="">
			</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
