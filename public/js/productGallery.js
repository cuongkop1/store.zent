$(function() {
    var table = $('#productGallery-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'product-gallery/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'product_id', name: 'product_id' },
            { data: 'link', name: 'link' },
            { data: 'created_at', name: 'created_at' },
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
        var user_id = $(this).attr('productgalleryId');
        $.ajax({
            type: 'delete',
            url: 'product-gallery/' + user_id,
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
        var id = $(this).attr('productgalleryId');
        $.ajax({
            type: 'get',
            url: 'product-gallery/' + id,
            success: function(response){
                $('#product_id').text(response.product_id);
                $('#link').text(response.link);
                $('#updated_at').text(response.updated_at);
                $('#created_at').text(response.created_at);
            }
        })
    });

});