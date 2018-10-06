$(function() {
    var promoTable = $('#promotion-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'promotion/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'date', name: 'date' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
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
        var id = $(this).attr('promotionId');
        $.ajax({
            type: 'delete',
            url: 'promotion/' + id,
            success: function(response){
                promoTable.ajax.reload();
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
        var id = $(this).attr('promotionId');
        $.ajax({
            type: 'get',
            url: 'promotion/' + id,
            success: function(response){

                $('#name').text(response.name);
                $('#date').text(response.date);
                $('#updated_at').text(response.updated_at);
                $('#created_at').text(response.created_at);
            }
        })
    });

});