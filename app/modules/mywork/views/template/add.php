<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
</style>
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<?php $this->widget('application.widgets.common.notice');?><link href="/static/admin/css/skin.css" rel="stylesheet" type="text/css" />
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
            
			
            <td align="right" width="60" class="left_txt"><a href="/mywork/cs/"><img src="/static/admin/images/back.gif"></a>&nbsp;&nbsp;<a href="/mywork/template/">返回</a></td>
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
			<?php $form = $this->beginWidget('CActiveForm');?>              
                            
              <tr>
                <td bgcolor="#f2f2f2" width="20%" height="30" align="right" class="left_txt2"><?php echo $options['name'];?>：</td>
                <td bgcolor="#f2f2f2" width="3%" >&nbsp;</td>
                <td bgcolor="#f2f2f2" width="32%" height="30" >
				<?php echo $form->textField($model,'name',array('value'=>$model->name));?>				</td>
                <td bgcolor="#f2f2f2" width="45%" height="30" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'name'); ?>				<?php echo $options['name'];?>				</td>
              </tr>
                            
              <tr>
                <td  width="20%" height="30" align="right" class="left_txt2"><?php echo $options['tag'];?>：</td>
                <td  width="3%" >&nbsp;</td>
                <td  width="32%" height="30" >
				<?php echo $form->textField($model,'tag',array('value'=>$model->tag));?>				</td>
                <td  width="45%" height="30" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'tag'); ?>				<?php echo $options['tag'];?>				</td>
              </tr>
                            
              <tr>
                <td bgcolor="#f2f2f2" width="20%" height="30" align="right" class="left_txt2"><?php echo $options['status'];?>：</td>
                <td bgcolor="#f2f2f2" width="3%" >&nbsp;</td>
                <td bgcolor="#f2f2f2" width="32%" height="30" >
				<?php echo $form->textField($model,'status',array('value'=>$model->status));?>				</td>
                <td bgcolor="#f2f2f2" width="45%" height="30" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'status'); ?>				<?php echo $options['status'];?>				</td>
              </tr>
                            
              <tr>
                <td  width="20%" height="30" align="right" class="left_txt2"><?php echo $options['type'];?>：</td>
                <td  width="3%" >&nbsp;</td>
                <td  width="32%" height="30" >
				<?php echo $form->textField($model,'type',array('value'=>$model->type));?>				</td>
                <td  width="45%" height="30" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'type'); ?>				<?php echo $options['type'];?>				</td>
              </tr>
                            
              <tr>
                <td bgcolor="#f2f2f2" width="20%" height="30" align="right" class="left_txt2"><?php echo $options['pic'];?>：</td>
                <td bgcolor="#f2f2f2" width="3%" >&nbsp;</td>
                <td bgcolor="#f2f2f2" width="32%" height="30" >
				<?php echo $form->textField($model,'pic',array('value'=>$model->pic));?>				</td>
                <td bgcolor="#f2f2f2" width="45%" height="30" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'pic'); ?>				<?php echo $options['pic'];?>				</td>
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
<?php $this->endWidget(); ?></body>