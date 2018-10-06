// $(function() {
	jQuery( document ).ready(function( $ ) {
	var color = '';
	var size;
	$('.div_color').click(function() {
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
				$('.listsize1').append('<li><a pro_id="'+size1.product_id+'"'+
				'color_id="'+size1.color_id+'" size_id="'+size1.size_id+'" class="picksize">'+
					size1.size_name+'</a></li>');
				});
            }
        })
	});

	$(document).on('click', '.picksize', function(){
	    var $size = $(this);
	    var pro_id = $(this).attr('pro_id')
	    var color_id = $(this).attr('color_id')
	    var size_id = $(this).attr('size_id')
	    if ($size.hasClass('active')) {
	        $size.removeClass('active');
	    } else {
	        $('li > .active').removeClass('active');
	        $size.addClass('active');
	    }
	    size = $(this).text();
	    $.ajax({
            type: 'get',
            url: 'getquantity/' + pro_id +'/' + color_id+ '/' + size_id,
            success: function(response){
                $('#qty_12').attr('value', response.quantity);
            }
        })
	});
	
	$('.color1').click(function() {
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
	}

    $('#add-product').on('click',function(e){
    	e.preventDefault();
    	var id = $(this).attr('productId');
    	url=asset+'cart/'+id;
    	qty = $('#qty_product').val();
  //   	if($('.options-swatch > .active').length ==0)
		// {
		//     toastr.warning('Bạn cần chọn Màu');
		// }else if($('li > .active').length ==0){
		// 	toastr.warning('Bạn cần chọn Size');
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

	$('.plus-btn').on('click', function(){
		qty1 = parseInt($('#qty_12').val());
    	qty2 = parseInt($('#qty_product').val());
        if (qty2 > qty1){
        	$('#add-product').prop("disabled", true);
        	toastr.error('Hàng trong kho không đủ!</br>Vui lòng chọn số lượng nhỏ hơn!')
        }
    });
    $('.minus-btn').on('click', function(){
    	qty1 = parseInt($('#qty_12').val());
    	qty2 = parseInt($('#qty_product').val());
        if (qty2 <= qty1){
        	$('#add-product').prop("disabled", false);
        }
    });


});