// menu
$(function(){
	var $nav = $(".top_bar .nav li:gt(0)"),
		$current = $(".top_bar .nav li.current").index();
		$subNav = $('.top_bar .sub_nav ul'),
		timer = null,
		state = $nav.find('a.current').parents('li').index();
		$nav.find('a.current').parents('li').addClass('active');
		if(state!=-1){
			$subNav.eq(state-1).addClass('current');
		}
		$nav.not(".active").hover(
			function(){
				var _index = $(this).index();
				clearTimeout(timer);
				$nav.not(".active").find('a').removeClass('current');
				$(this).find('a').addClass('current');
				$subNav.eq(_index-1).slideDown(600).siblings().hide();
			},
			function(){
				timer = setTimeout(function(){
					$subNav.hide();
					$nav.not(".active").find('a').removeClass('current');
					$('.top_bar .sub_nav ul.current').slideDown(600);
				},300)
			}
		);
		$subNav.not('.current').hover(
			function(){
				clearTimeout(timer);
			},
			function(){
				timer=setTimeout(function(){
					$subNav.hide();
					$('.top_bar .sub_nav ul.current').slideDown(600);
					$nav.not(".active").find('a').removeClass('current');
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