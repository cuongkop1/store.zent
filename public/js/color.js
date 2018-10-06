$(function() {
    var table = $('#color-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'color/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'color', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'code', name: 'code' },
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
        var id = $(this).attr('colorId');name
        $.ajax({
            type: 'delete',
            url: 'color/' + id,
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
        var id = $(this).attr('colorId');
        $.ajax({
            type: 'get',
            url: 'color/' + id,
            success: function(response){

                $('#name').text(response.name);
                $('#code').text(response.code);
                $('#color').attr('background', color);
                $('#updated_at').text(response.updated_at);
                $('#created_at').text(response.created_at);
            }
        })
    });

});