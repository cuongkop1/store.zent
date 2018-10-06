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
		<form action="{{asset('')}}admin/promotion/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới khuyến mãi</legend>
		
			<div class="form-group">
				<label for="">Name</label>
				<input name="name" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Date</label>
				<input name="date" type="date" class="form-control" id="">
			</div>

			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	
@endsection
