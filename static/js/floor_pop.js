/**
 * 
 floor pop up
 */
$(function(){
	$('#Map area').each(function(){
	    $(this).on('click',function(){
	        $num = $(this).attr('title').substring(1);
	        $('.floor_' + $num).find('.floor_list_pic li').removeClass('active').first().addClass('active');
	        $('#popup,#mark').fadeIn();
	        $('.floor_' + $num).fadeIn();
	    })  
	})

	$('.close_pop').on('click',function(){
	    $('#popup,#mark,.floor').fadeOut();

	})

	// click list
	$('.floor_list_pic li').on('click',function(){
	    $index = $(this).index();
	    $dataNum = $(this).parents('.floor').attr('data');
	    $(this).addClass('active').siblings('li').removeClass('active');
	    $('.floor_'+ $dataNum +'_pic').find('img').eq($index).addClass('active').siblings().removeClass('active');
	})
})
