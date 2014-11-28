$(function(){
	// nav
	var $controlBar = $(".top_bar .nav li"),
		$controlContent = $('.top_bar .sub_nav ul');

	$controlBar.hover(function(){
		_index = $(this).index();
		current = $controlBar.find('a.current').parent().index();
		if(_index>0){
			$controlContent.eq(_index-1).addClass('current').siblings().removeClass('current');
		}else{
			$controlContent.removeClass('current');
		}
	},function(){
		$controlContent.removeClass('current');
		if(current>0){
			$controlContent.eq(current-1).addClass('current');
		}
	});
	$controlContent.find('a').on('click',function(){
		$(this).addClass('current').parent().siblings().find('a').removeClass('current');
		tab($(this).parent().index()+1);
	})

	// tab switch
	function tab(index){
		if(index){
			$('.top_bar .sub_nav li').eq(index-1).find('a').addClass('current').parent().siblings().find('a').removeClass('current');
			$('.sidebar .switch_tab li').eq(index-1).addClass('current').siblings().removeClass('current');
			$('.switch_content .swicth_content_section').eq(index-1).fadeIn().siblings().hide();
		}
		$('.sidebar .switch_tab li').on('click',function(){
			$index = $(this).index();
			$(this).addClass('current').siblings().removeClass('current');
			$('.switch_content .swicth_content_section').eq($index).fadeIn().siblings().hide();
		})
	}
	tab();
	// link
	function getUrlParam(name)
	{
		var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
		var r = window.location.search.substr(1).match(reg);
		if (r!=null) return unescape(r[2]); return null;
	}
	var subNavIndex;
	window.onload = function(){
		if(getUrlParam('subnav'))
		{
			subNavIndex = getUrlParam('subnav').toLowerCase();
			console.log(subNavIndex);
			switch(subNavIndex)
			{
				case '1' :
				subNavIndex = '1';
				break;
				case '2' :
				subNavIndex = '2';
				break;
				case '3':
				subNavIndex = 3;
				break;

				case '4':
				subNavIndex = 4;
				break;

				case '5':
				subNavIndex = 5;
				break;

				case '6':
				subNavIndex = 6;
				break;

				default:
				subNavIndex = null;
				break;
			}
		}
		if(subNavIndex!=null)
		{
			console.log(subNavIndex);
			tab(subNavIndex);
		}
	}
})

