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
		<legend>Thêm mới chi tiết sản phẩm</legend>
		<button style="margin-bottom: 30px;" class="btn btn-info" id="btn1"><i class="fa fa-plus" aria-hidden="true"></i></button>
			<form enctype="multipart/form-data" style="margin-bottom: 30px" action="{{asset('')}}admin/product-detail/store" method="POST" role="form">
				@csrf
					<table class="table table-bordered table-stripped table-hover">
						<thead class="thead-dark">
				            <tr>
				                <th>Size</th>
				                <th>Color</th>
				                <th>Quantity</th>
				                <th>Image</th>
				                <th>Remove</th>
				            </tr>
				        </thead>
				        <tbody id="formappend">
					    	<tr>
				                <td>
				                	<input name="product_id[]" type="hidden" value="{{$detail_ids->id}}">
				                	<center><div style="display: inline-block; margin-bottom: 0"  class="form-group">
										<select style="width: 70px" class="form-control" name="size[]">
											@foreach($sizes as $size)
											<option value="{{$size->id}}">{{$size->name}}</option>
											@endforeach
										</select>
									</div></center>
				                </td>
				                <td>
				                	<center><div class="form-group" style="display: inline-block; margin-bottom: 0">
				                			<select style="width:180px" name="color[]" class="form-control">
												@foreach($colors as $color)
													<option value="{{$color->id}}">{{$color->name}}</option>
												@endforeach
											</select>
									</div></center>
				                </td>
				                <td>
				                	<center><div style="display: inline-block; margin-bottom: 0"  class="form-group">
										<input style="width: 130px" class="form-control" name="quantity[]" type="number">
										<input style="width: 130px" class="form-control" name="quantity[]" type="number">
										<input style="width: 130px" class="form-control" name="quantity[]" type="number">
									</div></center>
								</td>
								<td>
				                	<center><div style="display: inline-block; margin-bottom: 0"  class="form-group">
										<input class="form-control" name="product_detail_image[]" type="file">
									</div></center>
								</td>
								<td></td>
				            </tr>
					    </tbody>
				        <tfoot class="thead-dark">
				            <tr>
				                <th>Size</th>
				                <th>Color</th>
				                <th>Quantity</th>
				                <th>Image</th>
				                <th>Remove</th>
				            </tr>
				        </tfoot>
					</table>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
	</div>
	
@endsection

@section('footer')
<script>
	$(document).ready(function(){
		$("#btn1").click(function(){
		    $("#formappend").append(
		    	'<tr>'+
                    '<td>'+
                        '<input name="product_id[]" type="hidden" value="{{$detail_ids->id}}">'+
                        '<center><div style="display: inline-block; margin-bottom: 0"  class="form-group">'+
                            '<select style="width: 70px" class="form-control" name="size[]">'+
                                '@foreach($sizes as $size)'+
								'<option value="{{$size->id}}">{{$size->name}}</option>'+
								'@endforeach'+
                            '</select>'+
                        '</div></center>'+
                   '</td>'+
                    '<td>'+
                        '<center><div class="form-group" style="display: inline-block; margin-bottom: 0">'+
                            '<select style="width:180px" name="color[]" class="form-control">'+
								'@foreach($colors as $color)'+
									'<option value="{{$color->id}}">{{$color->name}}</option>'+
								'@endforeach'+
							'</select>'+
                        '</div></center>'+
                    '</td>'+
                    '<td>'+
                        '<center><div style="display: inline-block; margin-bottom: 0"  class="form-group">'+
                            '<input style="width: 130px" class="form-control" name="quantity[]" type="number">'+
                        '</div></center>'+
                    '</td>'+
                    '<td>'+
                        '<center><div style="display: inline-block; margin-bottom: 0"  class="form-group">'+
                            '<input style="" class="form-control" name="product_detail_image[]" type="file">'+
                        '</div></center>'+
                    '</td>'+
                    '<td>'+
                        '<a class="btn btn-danger xoa"><i style="color:white" class="fa fa-times" aria-hidden="true"></i></a>'+
                    '</td>'+
                '</tr>'
					);
		});
		$(document).on('click', '.xoa', function(){
			$(this).parent().parent().remove();
		});

	});
</script>
@endsection
