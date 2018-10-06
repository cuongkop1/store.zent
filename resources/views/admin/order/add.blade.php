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
		<form action="{{asset('')}}admin/order/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới đơn hàng</legend>
		
			<div class="form-group">
				<label for="">Code</label>
				<input name="code" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Product ID</label>
				<input name="product_id" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Total price</label>
				<input name="total_price" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">User ID</label>
				<input name="user_id" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Customer name</label>
				<input name="customer_name" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Customer address</label>
				<input name="customer_address" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Customer mobile</label>
				<input name="customer_mobile" type="number" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Status</label>
				<input name="status" type="number" class="form-control" id="">
			</div>
			
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	
@endsection
