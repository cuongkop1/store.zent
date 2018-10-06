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
		<form action="{{asset('')}}admin/user/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới người dùng</legend>
		
			<div class="form-group">
				<label for="">Name</label>
				<input name="name" type="text" value="{{ old('name') }}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input name="email" type="email" value="{{ old('email') }}" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input name="password" type="password" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Confirm Pasword</label>
				<input name="password_confirmation" type="password" class="form-control" id="">
			</div>

			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	
@endsection
