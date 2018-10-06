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
		<form action="{{asset('')}}admin/order-detail/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới chi tiết đơn hàng</legend>
		
			<div class="form-group">
				<label for="">Order ID</label>
				<input name="order_id" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Product Detail ID</label>
				<input name="product_detail_id" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Price</label>
				<input name="price" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Quantity</label>
				<input name="quantity" type="number" class="form-control" id="">
			</div>
			
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	
@endsection
