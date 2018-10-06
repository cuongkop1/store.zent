@extends('admin.layouts.master')
@section('content')
	<a class="btn btn-info" href="{{ asset('/admin/user/add') }}">Add</a>
	@if(session()->has('flag'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thống báo!</strong> {{session()->get('flag')}}
		</div>
		@endif
	<div class="card-body table-reponsive">
		<table class="table table-reponsive table-hover table-bordered" id="users-table"">
		    <thead>
			     <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Created At</th>
			        <th>Updated At</th>
			        <th>Action</th>
			      </tr>
		    </thead>
		</table>
	</div>
	{{-- modal-show --}}
	<div id="show" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	      			<h4 class="modal-title">Detail</h4>
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	
	      		</div>
		      	<div class="modal-body">
		        	<p id="show_name"></p>
		        	<p id="show_email"></p>
		        	<p id="show_created_at"></p>
		        	<p id="show_updated_at"></p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

@endsection
@section('footer')
	<script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
@endsection
