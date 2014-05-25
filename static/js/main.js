 //focus
 $(function(){
 	var $btnNav = '',
 		$btnNow = 0,
 		$focus = $('.focus_slide'),
 		$li = $focus.find('li'),
 		$len = $li.length,
		$w = $li.width(),
 		$h = $li.height(),
 		$focusBox = $('.focus_box'),
 		$focusFt = $focus.find('.btn');
	$focusBox.css('width',$w * $len + 'px');
 	for(i = 0; i < $len; i++){
 		$btnNav += '<a></a>';
 	}
 	$focusFt.append($btnNav);
 	$focusFt.find('a:first').addClass('on');

 	function focusSlide(index){
 		$focusFt.find('a').removeClass('on').eq(index).addClass('on')
 		$focusBox.animate({'left':-$w*index},600);
 		$btnNow = index;
 	}
 	function autoPlay(){
 		$btnNow+1 >= $len ? $btnNow = 0 :$btnNow++;
 		focusSlide($btnNow);
 	}

 	// click
 	$focusFt.find('a').on('click',function(){
		var $iNow = $(this).index();
 		$(this).addClass('on').siblings().removeClass('on')
 		focusSlide($iNow); 		
 		
 	})
 	// hover
 	$focus.hover(function(){
 		clearInterval($focusAutoPlay );
 	},function(){
 		$focusAutoPlay = setInterval(autoPlay,3000);
 	})
 	// auto play
 	$focusAutoPlay = setInterval(autoPlay,3000);

 	
 }) 
 // switch tab
$(function(){
	$('.modle_col .tab li').each(function(){
		$(this).mouseover(function(){
			$index = $(this).index();
			$(this).addClass('active').siblings().removeClass('active');
			$('.modle_col .tab_content > ul').eq($index).show().siblings().hide();
		})
	})
})
