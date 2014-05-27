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