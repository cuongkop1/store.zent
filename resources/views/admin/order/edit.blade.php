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
	<form action="{{asset('')}}admin/order/{{$orders->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật đơn hàng</legend>
	
		<div class="form-group">
				<label for="">Code</label>
				<input name="code" type="text" value="{{$orders->code}}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Product ID</label>
				<input name="product_id" value="{{$orders->product_id}}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Total price</label>
				<input name="total_price" value="{{$orders->total_price}}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">User ID</label>
				<input name="user_id" value="{{$orders->user_id}}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Customer name</label>
				<input name="customer_name" value="{{$orders->customer_name}}" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Customer address</label>
				<input name="customer_address" value="{{$orders->customer_address}}" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Customer mobile</label>
				<input name="customer_mobile" value="{{$orders->customer_mobile}}" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Status</label>
				<input name="status" value="{{$orders->status}}" type="number" class="form-control" id="">
			</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
