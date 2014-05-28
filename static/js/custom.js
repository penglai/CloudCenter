/* write by reyrey 

	use for homepage
*/


$(function(){
	// add banner img
	$('.focus_box li').each(function(){
		$(this).css({'background-image':'url(' + $(this).find('img').attr('data-src') + ')' })
	});

	// banner slide
 	var $btnNav = '',
 		$btnNow = 0,
 		$focus = $('.focus_slide'),
 		$li = $focus.find('li'),
 		$len = $li.length,
 		$h = $li.height(),
 		$focusBox = $('.focus_box'),
 		timer = null,
 		$focusFt = $focus.find('.btn');
 	function reset_w()
 	{
 		if($(window).width() < 1000){
 			$focus.css('width','1000px');
			$li.css('width','1000px');
 		}else{
 			$focus.css('width','100%');
 			$li.css('width',$(window).width());
 		}
 		$focusBox.css('width', parseInt($li.css('width')) * $len);
	}
	reset_w();
 	for(i = 0; i < $len; i++)
 	{
 		$btnNav += '<a></a>';
 	}
 	$focusFt.append($btnNav);
 	$focusFt.find('a:first').addClass('on');


 	// window resize change width and left
 	$(window).resize(function()
 	{
 		reset_w();
 		$focusBox.css('left',-parseInt($li.css('width'))*$focusFt.find('a.on').index());
 	})

 	// click
 	$focusFt.find('a').bind('click',function()
 	{
 		slide($('.btn .on').index(),$(this).index());
 		
 	});
	function slide(before,now){
		var	banner_width = $('.focus_box li').width(),
			clone_banner = $('.focus_box li').eq(now).clone();

		if(!$('.btn a').eq(now).hasClass('on'))
		{
			$('.focus_box').width(($len+1)*banner_width)
			$('.btn a').eq(now).addClass('on').siblings().removeClass('on');
			if(now>before)
			{
				clone_banner.insertAfter($('.focus_box li').eq(before));
				$('.focus_box').animate({'marginLeft':-banner_width+'px'},function(){
					$('.focus_box').css({'margin-left':0,'left':-now*banner_width+'px'});
					clone_banner.remove();
					$('.focus_box').width($len*banner_width)
				});

			}
			else
			{
				clone_banner.insertBefore($('.focus_box li').eq(before));
				$('.focus_box').css('margin-left',-banner_width+'px')
				$('.focus_box').animate({'marginLeft':0+'px'},function(){
					$('.focus_box').css({'left':-now*banner_width+'px'});
					clone_banner.remove();
					$('.focus_box').width($len*banner_width)
				});
			}
		}

	}
	function autoPlay()
	{
		var before = $('.btn .on').index(),
			now = before+1;
			$len = $('.focus_box li').length;
		(now>($len-1))?now=0:now;
		slide(before,now)
	}

 	// auto play
 	timer = setInterval(autoPlay,3000);

 	// hover
 	$focus.hover(function(){
 		clearInterval(timer);
 	},function(){
 		timer = setInterval(autoPlay,3000);
 	})
 	

 	// feature animate
 	$('.feature .bd ul').each(function(){
 		$(this).css('margin-top',-$(this).height()/2);
 	})
 	$(".feature .item").each(function(index) {
 		$(this).hover(function(){
 			$(this).find('.hd').hide();
 			$(this).find('.bd').show();
 		},function(){
 			$(this).find('.bd').hide();
 			$(this).find('.hd').show();
 		})
	});

	 // switch tab
	function tab(controller,content){
		controller.each(function(){
			$(this).mouseover(function(){
				$index = $(this).index();
				$(this).addClass('active').siblings().removeClass('active');
				$(this).siblings('s').stop(true,true).animate({'left':parseInt($(this).position().left) + (parseInt($(this).css('margin-left')) + parseInt($(this).css('margin-right')) + parseInt($(this).outerWidth()))/ 2 - parseInt($('.modle_col .tab s').outerWidth())/ 2},300);
				content.eq($index).show().siblings().hide();
			})
		})
	}
	tab($('.news .tab li'),$('.news .tab_content ul'));
	tab($('.services .tab li'),$('.services .tab_content .list'));
	tab($('.park_overview .tab li'),$('.park_overview .tab_content .list'));
 	

	// 合作伙伴轮播
	/*********箭头控制滚动方向、加速及鼠标拖动***************/

	/*********箭头控制滚动方向、加速及鼠标拖动***************/

	var MarqueeControl=new Marquee("Marquee");      //箭头控制滚动方向、加速及鼠标拖动实例

	MarqueeControl.Direction="left";

	MarqueeControl.Step=1;

	MarqueeControl.Width=910;

	MarqueeControl.Height=60;

	MarqueeControl.Timer=10;

	MarqueeControl.ScrollStep=1;                //若为-1则禁止鼠标控制实例

	MarqueeControl.Start();

	MarqueeControl.BakStep=MarqueeControl.Step;

	xg("prev").onmouseover=function(){MarqueeControl.Direction=2};

	xg("prev").onmouseout=xg("prev").onmouseup=function(){MarqueeControl.Step=MarqueeControl.BakStep};

	xg("prev").onmousedown=xg("next").onmousedown=function(){MarqueeControl.Step=MarqueeControl.BakStep+3};

	xg("next").onmouseover=function(){MarqueeControl.Direction=3};

	xg("next").onmouseout=xg("next").onmouseup=function(){MarqueeControl.Step=MarqueeControl.BakStep};

 });