$(function() {
    var table = $('#productDetail-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'product-detail/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'product_name', name: 'product_name' },
            { data: 'color', name: 'color' },
            { data: 'size', name: 'size' },
            { data: 'product_detail_image', name: 'product_detail_image' },
            { data: 'action', name: 'action' }
        ]
    });


    $(document).on('click', '.btn-danger', function(){
        swal({
        title: "Bạn có chắc muốn xóa?",
        text: "Bạn sẽ không thể khôi phục lại bản ghi này!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var id = $(this).attr('productDetailId');
        $.ajax({
            type: 'delete',
            url: 'product-detail/' + id,
            success: function(response){
                table.ajax.reload();
                toastr.success('Xóa thành công!');
            }
        })
      } else {
        toastr.warning('Bạn đã hủy!');
      }
    });
    	
    });

   $(document).on('click', '.btn-success', function(){
        $('#show').modal('show');
        var id = $(this).attr('productDetailId');
        $.ajax({
            type: 'get',
            url: 'product-detail/' + id,
            success: function(response){
                $('#name').text(response.product_name);
                $('#size').text(response.size);
                $('#product_detail_image').attr('src',asset2 + '/'+response.product_detail_image);
                $('#quantity').text(response.quantity);
                $('#created_at').text(response.created_at);
            }
        })
    });

   $(document).on('click','.btn-warning', function(){
        var id = $(this).attr('productDetailId');
        // alert(id)
        $.ajax({
            type: 'get',
            url: asset+"admin/product-detail/"+id,
            success: function(response){
                $('#edit').modal('show');
                $('#edit_size').val(response.size);
                $('#edit_quantity').val(response.quantity);
                $('#edit_color').val(response.color);
                $('#edit_product_id').val(response.product_id);
                $('#update').attr('productDetailId', response.id); 
            }
        })
    });

   $('#update').click(function(e){
        e.preventDefault();
        var size = $('#edit_size').val();
        var color = $('#edit_color').val();
        var quantity = $('#edit_quantity').val();
        var product_id = $('#edit_product_id').val();
        var product_detail_image = $('#edit_product_detail_image').val();
        var id = $(this).attr('productDetailId');
        // if ($.trim(title) == '' || $.trim(description) == '' || $.trim(thumbnail) == '' ||
        //     $.trim(content) == '') {
        //     toastr.error('Không được để trống !');
        // }
        $.ajax({
            type: 'PUT',
            url: asset+'admin/product-detail/'+id,
            data: {size: size, color:color, quantity:quantity, product_id:product_id,
            product_detail_image:product_detail_image},
            success: function(response){
                $('#edit').modal('hide');
                table.ajax.reload();
                toastr.success('Sửa thành công !');
            }
        })
    });

    

});