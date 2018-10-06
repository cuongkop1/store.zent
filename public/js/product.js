$(function() {
    var productTable = $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'product/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'product_code', name: 'product_code' },
            { data: 'featured_image', name: 'featured_image' },
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
            var user_id = $(this).attr('productId');
            $.ajax({
                type: 'delete',
                url: 'product/' + user_id,
                success: function(response){
                    productTable.ajax.reload();
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
        var id = $(this).attr('productId');
        $.ajax({
            type: 'get',
            url: 'product/' + id,
            success: function(response){
                $('#name').text(response.name);
                $('#price').text(response.price);
                $('#description').text(response.description);
                $('#content').text(response.content);
                $('#featured_image').attr('src',asset + '/'+response.featured_image);
                $('#created_at').text(response.created_at);
            }
        })
    });

   $(document).on('click', '.add-image', function(){
        $('#modal-images').modal('show');
        id = $(this).attr('productid');
        $('.btn-upload').attr('data-id', id);
         $.ajax({
                type: 'get',
                url:'product/images/' + id ,
                success: function(response){
                  // console.log(response.length)
                  $('.image').remove();
                  for (var i = response.length - 1; i >= 0; i--) {
                      $('.images').append('<div class="image" id="image_'+
                        response[i].id+'"><img src="'+asset+'/'+response[i].link+
                        '" width="120px" height="120px">'+
                        '<button type="button" class="btn-close" data-id="'
                        +response[i].id+'" >&times;</button></div>') 
                  }
                }
            });
    });

   $(document).on('click','.btn-upload', function(){
        $("#form-upload-images").submit(function(e){
            e.preventDefault();
        });
        id = $(this).data('id');
        // alert(id);
        var images = $("#images_modal")[0].files;
        var data = new FormData();
        var names = [];
        var file_data = $('#images_modal')[0].files; 
        for(var i = 0;i<file_data.length;i++){
            data.append("image["+i+"]", file_data[i]);
        }
        $.ajax({
            type: 'post',
            url: 'product/images/' +id,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                $('.pip').remove();
                $('#images_modal').val('');
                $.ajax({
                    type: 'get',
                    url:'product/images/' + id ,
                    success: function(response){
                        $('.image').remove();
                        for (var i = response.length - 1; i >= 0; i--) {
                        $('.images').append('<div class="image" id="image_'
                        +response[i].id+
                        '"><img src="'+asset+'/'+response[i].link+
                        '" width="120px" height="120px">'+
                        '<button type="button" class="btn-close" data-id="'
                        +response[i].id+
                        '" >&times;</button></div>') 
                        }
                    }
                });
                setTimeout(function(){location.reload();}, 3000);
            }
        });
    });

   $(document).on('click','.btn-close', function(){
        swal({
          title: "Bạn có muốn xóa ảnh này không?",
          text: "Ảnh sẽ bị xóa và không thể khôi phục lại!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            id = $(this).data('id');
            $.ajax({
                type: 'delete',
                url:'product/images/'+ id,
                success: function(response){
                    $('#image_'+id).remove();
                    toastr.success('Xóa ảnh thành công!!!')
                }
            })
          } else {
            toastr.info('Hủy thao tác')
          }
        });
    });

});

    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#images_modal").on("change", function(e) {
                var files = e.target.files,
                filesLength = files.length;
                $('.pip').remove();
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                    "<img style=\"width:100px;height:100px\" class=\"imageThumb\" src=\"" +
                    e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "</span>").insertAfter(".images-preview");
                });
                fileReader.readAsDataURL(f);
                }
            });
        }else {
            alert("Your browser doesn't support to File API")
            }
        });  
