// header nav animate
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

// sub nav  animate
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




	// to top
	$(window).scroll(function(){
        if($(window).scrollTop()>120)
        {
            $('a.to_top').fadeIn();
        }
        else
        {
            $('a.to_top').fadeOut();
        }
    });
    $('a.to_top').click(function(){
        var $this = $(this);
        $('html,body').animate({scrollTop:"0px"},function(){$this.fadeOut();});
    });

});

// 



