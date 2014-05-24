<?php
if(Yii::app()->session['notice']){
	echo '
		<script>
			
			$(function(){ 
				if(!$("#common_notice").is(":visible")){ 
					$("#common_notice").css({display:"block", top:"-100px"}).animate({top: "+100"}, 500, function(){ 
					setTimeout(out, 1000); 
					}); 
				} 
			}); 
			
			function out(){ 
				$("#common_notice").animate({top:"0"}, 500, function(){ 
				$(this).css({display:"none", top:"-100px"}); 
				}); 
			}
			
		</script>
		
		<div id="common_notice" style="color:#fff; font-weight:bold; font-size:14px;">
			'.Yii::app()->session['notice'].'
		</div>	
	';
	Yii::app()->session['notice']='';
}
?>