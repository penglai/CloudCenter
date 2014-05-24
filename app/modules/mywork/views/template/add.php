<?php $this->widget('application.widgets.common.notice'); ?>
<link href="/static/admin/css/skin.css" rel="stylesheet" type="text/css" />
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="/static/admin/images/mail_leftbg.gif"><img src="/static/admin/images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="/static/admin/images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt"><?php echo $options['formName'];?></div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="/static/admin/images/mail_rightbg.gif"><img src="/static/admin/images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="/static/admin/images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="83%"  class="left_txt">当前位置：<?php echo $options['formName'];?></td>
            
			
            <td align="right" width="60" class="left_txt"><a href="/mywork/service/"><img src="/static/admin/images/back.gif"></a>&nbsp;&nbsp;<a href="/mywork/service/">返回</a></td>
          </tr>
          <tr>
            <td height="20" colspan="3"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
         
          
        
          <tr>
            <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			 <?php $activeFromConfig = array(
				 	'enableAjaxValidation'=>true,//开启ajax验证  
				 	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					);
			$form=$this->beginWidget('CActiveForm',$activeFromConfig); ?>
			
<script type="text/javascript" src="/static/admin/js/ajaxfileupload.js"></script>
<script>
function uploadImage()
{
	$.ajaxFileUpload({
		url: '/mywork/template/ajaxUpload',//需要链接到服务器地址
		//secureuri:false,
		fileElementId: 'TemplateForm_pic',//文件选择框的id属性
		dataType:'json',//服务器返回的格式，可以是json
		success: function (data){
			if (data['code'] == 1) {
				$('#TemplateForm_pic_em_').show();            
				$('#TemplateForm_pic_em_').html(data['res']); 
			} else {
				s = "<img src='/"+data['filePath']+"' />";
				$('#imageShow').html(s);
				$('#picPath').val(data['fileName']);		
			}
		},
		error: function(data){
		}
	});	
}
</script>
              <tr>
                <td width="20%" height="30"  align="right"  class="left_txt2"></td>
                <td width="3%" >&nbsp;</td>
                <td width="50%" height="30" id="imageShow" >
        		 <?php
				 	if (!empty($model->pic)){
						$a = explode(".",$model->pic);
						echo '<img src = "/'.$params['picPath'].date("Y",$a[0])."/".date("m",$a[0])."/".$model->pic.'" />';
					}
				 ?>
				</td>
                <td width="10%" height="30"  class="left_txt" >
                 
				</td>
              </tr>	
             
             <tr>
                <td width="20%" height="30"  align="right"  class="left_txt2"><?php echo $options['pic'];?>：</td>
                <td width="3%" >&nbsp;</td>
                <td width="50%" height="30" >
        		 <?php echo CHtml::activeFileField($model,'pic',array('onChange'=>'uploadImage();')); ?>
                 <input type="hidden" name="picPath" id="picPath" value = "<?php echo $model->pic; ?>" >  
				</td>
                <td width="10%" height="30"  class="left_txt" >
                 <span style = "color:green">*</span>
				 <?php echo $form->error($model,'pic'); ?>  
				 <?php echo $options['pic'];?>
				</td>
              </tr>	
             
             
              <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2"><?php echo $options['name'];?>：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
				 <?php echo $form->textField($model,'name',array('size'=>'30','value'=>$model->name)); ?>
				</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'name'); ?>
				<?php echo $options['name'];?>
				</td>
              </tr>
			  
			   <tr>
                <td width="20%" height="30" align="right"  class="left_txt2"><?php echo $options['tag'];?>：</td>
                <td width="3%" >&nbsp;</td>
                <td width="32%" height="30" >
				 <?php echo $form->textField($model,'tag',array('size'=>'20','value'=>$model->tag)); ?>
				</td>
                <td width="45%" height="30"  class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'tag'); ?>
				<?php echo $options['tag'];?>
				</td>
              </tr>
			  
			   <tr>
                <td width="20%" height="30" align="right"  class="left_txt2" bgcolor="#f2f2f2"><?php echo $options['type'];?>：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="50%" height="30" bgcolor="#f2f2f2">
				<?php echo $form->radioButtonList($model,'type', $params['templateType'], array('separator'=>'&nbsp;','labelOptions'=>array('style'=>'font-size:12px;')) )?>
				</td>
                <td width="10%" height="30"  class="left_txt" bgcolor="#f2f2f2">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'type'); ?>
				<?php echo $options['type'];?>
				</td>
              </tr>	
              
              
			  
			  <tr>
                <td width="20%" height="30" align="right"  class="left_txt2" bgcolor="#f2f2f2">状态：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="50%" height="30" bgcolor="#f2f2f2">
				<?php echo $form->radioButtonList($model,'status', array('1'=>'有效','2'=>'关闭'), array('separator'=>'&nbsp;','labelOptions'=>array('style'=>'font-size:12px;')) )?>
				</td>
                <td width="10%" height="30"  class="left_txt" bgcolor="#f2f2f2">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'status'); ?>
				<?php echo $options['status'];?>
				</td>
              </tr>	
			  
  
 
            </table></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="right"><input type="submit" value="完成以上修改" name="B1" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="44%" height="30"><input type="reset" value="取消设置" name="B12" /></td>
            </tr>
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
          </table></td>
      </tr>
    </table></td>
    <td background="/static/admin/images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="/static/admin/images/mail_leftbg.gif"><img src="/static/admin/images/buttom_left2.gif" width="17" height="17" /></td>
      <td height="17" valign="top" background="/static/admin/images/buttom_bgs.gif"><img src="/static/admin/images/buttom_bgs.gif" width="17" height="17" /></td>
    <td background="/static/admin/images/mail_rightbg.gif"><img src="/static/admin/images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
<?php $this->endWidget(); ?>
</body>