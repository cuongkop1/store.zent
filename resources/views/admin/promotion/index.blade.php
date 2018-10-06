@extends('admin.layouts.master')
@section('content')
	<a href="{{ asset('admin/promotion/add') }}" class="btn btn-info">Add</a>
	@if(session()->has('flag'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thống báo!</strong> {{session()->get('flag')}}
		</div>
		@endif
	<div class="card-body table-reponsive">
		<table class="table table-reponsive table-hover table-bordered" id="promotion-table"">
		    <thead>
			     <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Date</th>
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
		        	<p id="name"></p>
		        	<p id="date"></p>
		        	<p id="created_at"></p>
		        	<p id="updated_at"></p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

@endsection
@section('footer')
	<script type="text/javascript" src="{{ asset('js/promotion.js') }}"></script>
@endsection
