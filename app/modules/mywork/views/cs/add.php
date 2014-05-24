<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
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
            
			
            <td align="right" width="60" class="left_txt"><a href="/mywork/cs/"><img src="/static/admin/images/back.gif"></a>&nbsp;&nbsp;<a href="/mywork/cs/">返回</a></td>
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
			 <?php $form = $this->beginWidget('CActiveForm'); ?>
              
              <tr>
                <td width="20%" height="30" align="right" class="left_txt2"><?php echo $options['loginName'];?>：</td>
                <td width="3%" >&nbsp;</td>
                <td width="32%" height="30" >
				 <?php echo $form->textField($model,'loginName',array('size'=>'30','value'=>$model->loginName)); ?>
				</td>
                <td width="45%" height="30" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'loginName'); ?>
				<?php echo $options['loginName'];?>
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
                <td width="20%" height="30" align="right"  class="left_txt2"><?php echo $options['csTel'];?>：</td>
                <td width="3%" >&nbsp;</td>
                <td width="32%" height="30" >
				 <?php echo $form->textField($model,'csTel',array('size'=>'20','value'=>$model->csTel)); ?>
				</td>
                <td width="45%" height="30"  class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'csTel'); ?>
				<?php echo $options['csTel'];?>
				</td>
              </tr>
			  
			  
			   <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2"><?php echo $options['userName'];?>：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
				 <?php echo $form->textField($model,'userName',array('size'=>'20','value'=>$model->userName)); ?>
				</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'userName'); ?>
				<?php echo $options['userName'];?>
				</td>
              </tr>
			  
			  
			  <tr>
                <td width="20%" height="30" align="right"  class="left_txt2"><?php echo $options['tel'];?>：</td>
                <td width="3%" >&nbsp;</td>
                <td width="32%" height="30" >
				 <?php echo $form->textField($model,'tel',array('size'=>'20','value'=>$model->tel)); ?>
				</td>
                <td width="45%" height="30"  class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'tel'); ?>
				<?php echo $options['tel'];?>
				</td>
              </tr>
			  
			  <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2"><?php echo $options['qq'];?>：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
				 <?php echo $form->textField($model,'qq',array('size'=>'20','value'=>$model->qq)); ?>
				</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">
				<?php echo $form->error($model,'qq'); ?>
				<?php echo $options['qq'];?>
				</td>
              </tr>
			  
			  
			   <tr>
                <td width="20%" height="30" align="right"  class="left_txt2">所属省市：</td>
                <td width="3%" >&nbsp;</td>
                <td width="50%" height="30" >
				<?php $this->widget('application.widgets.common.district'); ?> 
				 
				</td>
                <td width="10%" height="30"  class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'province'); ?>
				<?php echo $form->error($model,'city'); ?>
				<?php echo $form->error($model,'district'); ?>
				所属省市
				</td>
              </tr>
			  
			  
			   <tr>
                <td width="20%" height="30" align="right" bgcolor="#f2f2f2" class="left_txt2"><?php echo $options['address'];?>：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="32%" height="30" bgcolor="#f2f2f2">
				 <?php echo $form->textField($model,'address',array('size'=>'30')); ?>
				</td>
                <td width="45%" height="30" bgcolor="#f2f2f2" class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $form->error($model,'address'); ?>
				<?php echo $options['address'];?>
				</td>
              </tr>
			  
			  <tr>
                <td width="20%" height="30" align="right"  class="left_txt2">状态：</td>
                <td width="3%" >&nbsp;</td>
                <td width="50%" height="30" >
				<?php echo $form->radioButtonList($model,'status', array('1'=>'有效','2'=>'冻结'), array('separator'=>'&nbsp;','labelOptions'=>array('style'=>'font-size:12px;')) )?>
				</td>
                <td width="10%" height="30"  class="left_txt">
				<span style = "color:green">*</span>
				<?php echo $options['status'];?>
				</td>
              </tr>	
			  
			  
			  <tr>
                <td width="20%" height="30" bgcolor="#f2f2f2" align="right"  class="left_txt2">备注：</td>
                <td width="3%" bgcolor="#f2f2f2">&nbsp;</td>
                <td width="50%" height="30" bgcolor="#f2f2f2">
				<?php echo $form->textArea($model,'remark',array('rows'=>2,'cols'=>50,'value'=>$model->remark,'style'=>'font-size:12px;')); ?>
				</td>
                <td width="10%" height="30"  class="left_txt" bgcolor="#f2f2f2">
				<?php echo $options['remark'];?>
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