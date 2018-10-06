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
	<form action="{{asset('')}}admin/order-detail/{{$orderDetails->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật chi tiết đơn hàng</legend>
	
			<div class="form-group">
				<label for="">Order ID</label>
				<input name="order_id" type="number" value="{{$orderDetails->order_id}}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Product Detail ID</label>
				<input name="product_detail_id" value="{{$orderDetails->product_detail_id}}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Price</label>
				<input name="price" value="{{$orderDetails->price}}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Quantity</label>
				<input name="quantity" value="{{$orderDetails->quantity}}" type="number" class="form-control" id="">
			</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
