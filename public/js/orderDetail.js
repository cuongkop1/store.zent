$(function() {
    var table = $('#orderDetail-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'order-detail/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'order_id', name: 'order_id' },
            { data: 'price', name: 'price' },
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
        var user_id = $(this).attr('orderDetailId');
        $.ajax({
            type: 'delete',
            url: 'order-detail/' + user_id,
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
        var id = $(this).attr('orderDetailId');
        $.ajax({
            type: 'get',
            url: 'order-detail/' + id,
            success: function(response){
                $('#order_id').text(response.order_id);
                $('#product_detail_id').text(response.product_detail_id);
                $('#price').text(response.price);
                $('#quantity').text(response.quantity);
                $('#updated_at').text(response.updated_at);
                $('#created_at').text(response.created_at);
            }
        })
    });

});