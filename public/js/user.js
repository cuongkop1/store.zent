$(function() {
    var userTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'user/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
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
        var user_id = $(this).attr('userId');
        $.ajax({
            type: 'delete',
            url: 'user/' + user_id,
            success: function(response){
                userTable.ajax.reload();
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
        var id = $(this).attr('userId');
        $.ajax({
            type: 'get',
            url: 'user/' + id,
            success: function(response){
                $('#show_name').text(response.name);
                $('#show_email').text(response.email);
                $('#show_updated_at').text(response.updated_at);
                $('#show_created_at').text(response.created_at);
            }
        })
    });

});