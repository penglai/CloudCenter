$(function(){
	// tab switch
	function tab(index){
		if(index){
			$('.sidebar .switch_tab li').eq(index).addClass('current').siblings().removeClass('current');
			$('.switch_content .swicth_content_section').eq(index).fadeIn().siblings().hide();
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
				case '0' :
				subNavIndex = '0';
				break;
				case '1' :
				subNavIndex = '1';
				break;
				case '2':
				subNavIndex = 2;
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

				case '7':
				subNavIndex = 7;
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

