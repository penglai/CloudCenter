jQuery(".menu li").hover(function() {
    var num = jQuery(".menu li").index(jQuery(this));
    var current = jQuery(".menu>li").index(jQuery(".hover"));
    if (current == -1) {
        current = 3;
    }
    jQuery(".menu").css("background-position", (78 * current) + "px" + " 0");
    jQuery(".menu li").removeClass("hover");
    jQuery(".menu li").removeClass("lihover");
    jQuery(this).addClass("hover");
    var len = current - num;
    if (len <= 0) {
        len = -len;
    };
    if (num == 0) {
        menuleft = -5;
    } else {
        menuleft = 78 * num;
    }
    jQuery(".menu").stop().animate({
        backgroundPosition: menuleft + "px" + " 0"
    },
    100 * len);
},
function() {

});
jQuery(".menu").mouseleave(function() {
    var num = jQuery(".menu li").index(jQuery(".hover"));
    if (num == -1) {
        num = 3;
    }
    var current = jQuery(".menu li").index(jQuery(".c_menu"));
    jQuery(".menu").css("background-position", (78 * num) + "px" + " 0");
    jQuery(".menu li").removeClass("hover");
    jQuery(".c_menu").addClass("hover");
    var len = current - num;
    if (len <= 0) {
        len = -len;
    };
    jQuery(".menu").stop().animate({
        backgroundPosition: (78 * current) + "px" + " 0"
    },
    100 * len);
});
jQuery(".c_menu").mouseover(); 

 //focus banner
 $(function(){
 	var $btnNav = '',
 		$btnNow = 0,
 		$focus = $('.focus_slide'),
 		$li = $focus.find('li'),
 		$len = $li.length,
 		$h = $li.height(),
 		$focusBox = $('.focus_box'),
 		timer = null;
 		$focusFt = $focus.find('.btn');
 	function reset_w(){
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
 	for(i = 0; i < $len; i++){
 		$btnNav += '<a></a>';
 	}
 	$focusFt.append($btnNav);
 	$focusFt.find('a:first').addClass('on');

 	// window resize change width and left
 	$(window).resize(function(){
 		reset_w();
 		$focusBox.css('left',-parseInt($li.css('width'))*$focusFt.find('a.on').index());
 	})

 	function focusSlide(index){
 		$focusFt.find('a').removeClass('on').eq(index).addClass('on')
 		$focusBox.animate({'left':-parseInt($li.css('width'))*index},600);
 		$btnNow = index;
 	}
 	function autoPlay(){
 		$btnNow+1 >= $len ? $btnNow = 0 :$btnNow++;
 		focusSlide($btnNow);
 	}

 	// click
 	$focusFt.find('a').bind('click',function(){
		var $iNow = $(this).index();
 		$(this).addClass('on').siblings().removeClass('on')
 		focusSlide($iNow); 		
 		
 	})
 	// auto play
 	timer = setInterval(autoPlay,3000);

 	// hover
 	$focus.hover(function(){
 		clearInterval(timer);
 	},function(){
 		timer = setInterval(autoPlay,3000);
 	})
 	

 	// feature animate
 	$('.feature .container > li').hover(function(){
 		$(this).find('.hd').stop(true,true).animate({'top': '100%'},600)
 		$(this).find('.bd').stop(true,true).animate({'top':'-102px'},600)
 	},function(){
 		$(this).find('.bd').stop(true,true).animate({'top':'100%'},600)
 		$(this).find('.hd').stop(true,true).animate({'top': '0'},600)
 	})

 	$('.feature .bd ul').each(function(){
 		$(this).css('margin-top',-$(this).height()/2);
 	})
 	

 	
 });


 // switch tab

$(function(){
	function tab(controller,content){
		controller.each(function(){
			$(this).mouseover(function(){
				$index = $(this).index();
				$(this).addClass('active').siblings().removeClass('active');
				$(this).siblings('s').stop(true,true).animate({'left':parseInt($(this).position().left) + (parseInt($(this).css('margin-left')) + parseInt($(this).css('margin-right')) + parseInt($(this).outerWidth()))/ 2 - parseInt($('.modle_col .tab s').outerWidth())/ 2},300);
				console.log($('s').css('left'));
				content.eq($index).show().siblings().hide();
			})
		})
	}
	tab($('.news .tab li'),$('.news .tab_content ul'));
	tab($('.services .tab li'),$('.services .tab_content .list'));
	tab($('.park_overview .tab li'),$('.park_overview .tab_content .list'));
	
})
// cooperation slide
$(function(){
	var margin_l = parseInt($(".cooperation li:first").css("margin-left")); //每个图片margin的数值
	var move_w = $(".cooperation li:first").outerWidth() + margin_l;	//需要滑动的数值
	
	//点击左边
	$(".prev").click(function(){
		$(".cooperation li:first").stop(true).animate({"margin-left":- move_w},1000,function(){
			$(this).css("margin-left",margin_l).appendTo($(".cooperation ul"));	
		});
	});
	
	//点击左边
	$(".next").click(function(){
		$(".cooperation li:last").prependTo($(".cooperation ul"));
		$(".cooperation li:first").css("margin-left",-move_w).animate({"margin-left":margin_l},1000,function(){
		});
	})
	
})

// function nav animate
$(function(){
	var aLi=$(".header .menu");
	var oMenu=$(".header .nav_content");
	var obox_menu=$(".header .nav_container");
	var timer=null;
	var state=0;

	aLi.hover( 
		function()
		{
			if(state==0)
			{
			$("#mark").remove();
			oMenu.css("display","block");
			$("body").append("<div id='mark'></div>");
			clearInterval(timer);
			}
			else
			{
			clearInterval(timer);
			}
		},	
		function()
		{
			timer=setInterval(function(){
			$('#mark').remove();
			oMenu.css("display","none"); state=0;},100);	
		}
	);
	obox_menu.hover(
		function(){
			clearInterval(timer); state=1;
		},
		function(){
			timer=setInterval(function(){
				
			$("#mark").remove();
			oMenu.css("display","none"); state=0;
			},100);
		});

	$('.menu li').mouseover(function () {
		$('.nav_container').stop().animate({left:$(this).index() * (-1000)}, {duration:200});
	});
});

// 
$(function(){
	/*$('#Marquee li img').each(function(){
		$(this).css('margin-top',-$(this).height()/2)
	})*/
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

})


