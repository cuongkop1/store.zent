$(function() {
    var orderTable = $('#order-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'order/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'product_id', name: 'product_id' },
            { data: 'total_price', name: 'total_price' },
            { data: 'customer_name', name: 'customer_name' },
            { data: 'customer_address', name: 'customer_address' },
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
        var id = $(this).attr('orderid');
        $.ajax({
            type: 'delete',
            url: 'order/' + id,
            success: function(response){
                orderTable.ajax.reload();
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
        var id = $(this).attr('orderid');
        $.ajax({
            type: 'get',
            url: 'order/' + id,
            success: function(response){

                $('#name').text(response.name);
                $('#code').text(response.code);
                $('#product_id').text(response.product_id);
                $('#total_price').text(response.total_price);
                $('#user_id').text(response.user_id);
                $('#customer_name').text(response.customer_name);
                $('#customer_address').text(response.customer_address);
                $('#customer_mobile').text(response.customer_mobile);
                $('#status').text(response.status);
                $('#updated_at').text(response.updated_at);
                $('#created_at').text(response.created_at);
            }
        })
    });

});