// menu
$(function(){
	var $nav = $(".top_bar .nav li"),
		$subNav = $('.top_bar .sub_nav ul'),
		timer = null,
		state = 0;
		$nav.not(":first").hover(
			function(){
				var _index = $(this).index();
				clearTimeout(timer);
				$subNav.eq(_index-1).show().siblings().hide();
			},
			function(){
				timer = setTimeout(function(){
					$subNav.hide();
				},500)
			}
		);
		$subNav.hover(
			function(){
				clearTimeout(timer);
			},
			function(){
				timer=setTimeout(function(){
					$subNav.hide();
				},300);
			}
		);
});
//tab switch
$(function(){
	$('.sidebar .switch_tab li').on('click',function(){
		_index = $(this).index();
		$(this).addClass('current').siblings().removeClass('current');
		$('.switch_content .swicth_content_section').eq(_index).fadeIn().siblings().hide();
	})
})