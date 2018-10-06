jQuery(document).ready(function($){

    $('.quick-view').on('click',function(){
        $('#quickViewModal').modal('show');
        var id = $(this).attr('data-id');

        $.ajax({
            type: 'get',
            url: asset +'quick/' + id,
            success: function(response){
                $('#name').text(response.data.name);
                $('#featured_image').attr('src',asset + 'storage/'+response.data.featured_image);
                $('#price').text(response.data.price).number( true, 0 );
                $('#original_price').text(response.data.original_price).number( true, 0 );
                $('#content').text(response.data.content);
                $('#add-product').attr('productId',response.data.id);
                $('.options-swatch--color').html("");
                response.colors.map(function(color){
                $('.options-swatch--color').append('<div proId="'+response.data.id+'"'+
                    'data-id="'+color.color_id+'"'+
                    'class="div_color">'+
                    '<div class="color1" style="background:'+color.color_code+'"></div>'+
                    '</div>');
                });
            }
        })
    });
    
    var color = '';
    var size;

    $(document).on('click', '.div_color', function(){
        var $this = $(this);
        var id = $(this).attr('data-id')
        var proId = $(this).attr('proId')
        if ($this.hasClass('active')) {
            $this.removeClass('active');
        } else {
            $('.options-swatch > .active').removeClass('active');
            $this.addClass('active');
        }
        $.ajax({
            type: 'get',
            url: 'getsize/' + id +'/' + proId,
            success: function(response){
                $('.listsize1').html("");
                response.data.map(function(size1){
                $('.listsize1').append('<li><a class="picksize">'+size1.size_name+'</a></li>');
                });
            }
        })
    });
    $(document).on('click', '.picksize', function(){
        var $size = $(this);
        if ($size.hasClass('active')) {
            $size.removeClass('active');
        } else {
            $('li > .active').removeClass('active');
            $size.addClass('active');
        }
        size = $(this).text();
    });
    
    $(document).on('click', '.color1', function(){
        var x = $(this).css('backgroundColor');
        hexc(x);
        // alert(color);
    })

    function hexc(colorval) {
        var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        delete(parts[0]);
        for (var i = 1; i <= 3; ++i) {
            parts[i] = parseInt(parts[i]).toString(16);
            if (parts[i].length == 1) parts[i] = '0' + parts[i];
        }
        color = '#' + parts.join('');
    };

    $('#add-product').on('click',function(e){

        e.preventDefault();
        var id = $(this).attr('productId');
        url=asset+'cart/'+id;
        qty = $('#qty_product').val();
  //    if($('.options-swatch > .active').length ==0)
        // {
        //     toastr.warning('Bạn cần chọn Màu');
        // }else if($('li > .active').length ==0){
        //  toastr.warning('Bạn cần chọn Size');
        // }
        if($('.options-swatch > .active').hasClass('active')&& $('li > .active').hasClass('active')){
            $.ajax({
                type: 'post',
                url: url,
                data: {color: color, size:size, qty:qty},
                success: function(response){
                    toastr.success('Thêm vào giỏ hàng thành công!');
                    $(".reload-div").load(location.href + " .reload-div");
                }
           });
         }else{
            toastr.error('Bạn cần chọn Size & Màu');
         }
    });

    // $('.btn-down').on('click', function(e){
    //     rowId = $(this).data('id');
    //     $.ajax({
    //         type: 'post',
    //         url:'/cart/minus',
    //         data:{rowId:rowId},
    //         success: function(response){
    //             location.reload();
    //         }
    //     });
    // });

    // $('.btn-up').on('click', function(e){
    //     rowId = $(this).data('id');
    //     $.ajax({
    //         type: 'post',
    //         url:'/cart/plus' ,
    //         data:{rowId:rowId},
    //         success: function(response){
    //             location.reload();
    //         }
    //     });
    // });
});