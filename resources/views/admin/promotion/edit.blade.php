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
	<form action="{{asset('')}}admin/promotion/{{$promotions->id}}" method="" role="form">
		@csrf
		{{ method_field('PUT')}} 
		<legend>Cập nhật khuyến mãi</legend>
	
		<div class="form-group">
			<label for="">Name</label>
			<input name="name" type="text" class="form-control" value="{{$promotions->name}}" id="">
		</div>
		<div class="form-group">
			<label for="">Original Price</label>
			<input name="date" type="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" id="">
		</div>

		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection
