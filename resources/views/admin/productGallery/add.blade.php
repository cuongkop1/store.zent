@extends('admin.layouts.master')
@section('style')
	<style type="text/css">
        .main-section{
            margin:0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0px 0px 20px #c1c1c1;
        }
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }
    </style>
@endsection
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
		<form enctype="multipart/form-data" action="{{asset('')}}admin/product-gallery/store" method="POST" role="form">
			@csrf
			<legend>Thêm mới chi tiết đơn hàng</legend>
		
			<div class="form-group">
				<label for="">Product ID</label>
				<input name="product_id" type="number" class="form-control" id="">
			</div>
			<div class="container">
		        <div class="row">
		            <div class="col-lg-8 col-sm-12 col-11 main-section">
		                <h1 class="text-center text-danger">File Input Example</h1><br>
	                    {!! csrf_field() !!}
	                    <div class="form-group">
	                        <div class="file-loading">
	                            <input id="file-1" type="file" name="link" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
	                        </div>
	                    </div>
		            </div>
		        </div>
		    </div>
			
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>

@endsection
@section('footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>
@endsection