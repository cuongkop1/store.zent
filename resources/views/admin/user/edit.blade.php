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
	<form action="{{asset('')}}admin/user/{{$users->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật người dùng</legend>
	
		<div class="form-group">
			<label for="">Name</label>
			<input name="name" type="text" class="form-control" value="{{$users->name}}" id="">
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input name="email" type="email" class="form-control" value="{{$users->email}}" id="">
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input name="password" type="password" class="form-control" value="{{$users->password}}" id="">
		</div>
		<div class="form-group">
			<label for="">Confirm Pasword</label>
			<input name="confirmpassword" type="pasword" class="form-control" id="">
		</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
