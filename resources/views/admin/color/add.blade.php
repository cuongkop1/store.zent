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
		<form action="{{asset('')}}admin/color/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới màu</legend>
				<center><div style="width: 30%" class="form-group">
					<label for="">Code</label>
					<input style="height: 38px" name="code" class="form-control" type="color" value="#4ce72e">
				</div></center>
				<center><div style="width: 30%" class="form-group">
					<label for="">Name</label>
					<input name="name" type="text" class="form-control">
				</div></center>
				<center><div style="width: 30%" class="form-group">
					<label for="">Name</label>
					<input disabled="disabled" name="name" type="text" class="form-control">
				</div></center>
			
			<button style="margin-left: 30%" type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
	
@endsection
