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
	<form action="{{asset('')}}admin/color/{{$colors->id}}" method="POST" role="form">
		@csrf
		{{ method_field('PUT')}}
		<legend>Cập nhật màu</legend>
			
			<center><div style="width: 30%" class="form-group">
					<label for="">Code</label>
					<input style="height: 38px" name="code" class="form-control" type="color" value="{{$colors->code}}">
				</div></center>
				<center><div style="width: 30%" class="form-group">
					<label for="">Name</label>
					<input value="{{$colors->name}}" name="name" type="text" class="form-control">
				</div></center>
			
			<button style="margin-left: 30%" type="submit" class="btn btn-primary">Update</button>

	</form>
@endsection
