<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
</style>
<?php $this->widget('application.widgets.common.adminList'); ?><body >
<script>
	function edit(id){
		window.location.href="/mywork/content/modify/id/"+id;
	}
	function del(id){
		if (confirm("温馨提示：确定删除？")){
			window.location.href="/mywork/content/del/id/"+id;
		}
	}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="17" height="29" valign="top" background="/static/admin/images/mail_leftbg.gif"><img src="/static/admin/images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="/static/admin/images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31"><div class="titlebt"><?php echo $name;?></div></td>
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
            <td width="83%"  class="left_txt">当前位置：<?php echo $name;列表?>				&nbsp;&nbsp;&nbsp;&nbsp;
				
			</td>
          <td align="right" width="60" class="left_txt">
			  <a href="/mywork/content/add"><img src="/static/admin/images/add.gif"></a>&nbsp;&nbsp;
			  <a href="/mywork/content/add">添加文章</a>
		  </td>
          </tr>
		  
		  <tr>
            <td height="20" colspan="3">
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                  <tr>
                    <td></td>
                  </tr>
                </table>
            </td>
          </tr>
		  
		  <tr>
		   <td colspan="2" width="100%"  class="left_txt">
		   <table>
		   <?php $form = $this->beginWidget('CActiveForm'); ?>		   		<tr>					<td class="left_txt">
							<?php echo $options['id'];?>：<?php echo $form->textField($model,'id',array('value'=>$model->id)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['menuId'];?>：<?php echo $form->textField($model,'menuId',array('value'=>$model->menuId)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['title'];?>：<?php echo $form->textField($model,'title',array('value'=>$model->title)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['useId'];?>：<?php echo $form->textField($model,'useId',array('value'=>$model->useId)); ?>	                </td>	
				
				</tr>	
				<tr>					<td class="left_txt">
							<?php echo $options['titlePic'];?>：<?php echo $form->textField($model,'titlePic',array('value'=>$model->titlePic)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['cdate'];?>：<?php echo $form->textField($model,'cdate',array('value'=>$model->cdate)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['content'];?>：<?php echo $form->textField($model,'content',array('value'=>$model->content)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['status'];?>：<?php echo $form->textField($model,'status',array('value'=>$model->status)); ?>	                </td>	
				
				</tr>	
					
				<tr>
					<td height="50" class="left_txt" colspan="4" align="center">
					<input type="submit" value="点击查询" >
					</td>
				</tr>
		     <?php $this->endWidget(); ?>		   </table>
		  </td>
		  </tr>
         
          
		<tr  colspan="3">
			<td colspan="3">
		        <table  width="100%" >	
					<tbody style="font-size:12px;">
						<tr class="list_tbl">
						<th height="30">文章ID</th><th height="30">文章分类</th><th height="30">文章标题</th><th height="30">用户ID</th><th height="30">文章图片</th><th height="30">创建时间</th><th height="30">文章内容</th><th height="30">状态：-1隐藏 1显示</th>							<th colspan="2" >操作</th>
						</tr>
						 <?php 
							foreach( $info as $n => $v){
								$n = $n+1;
								$flag = '';
								if($n%2 == 0){
									$flag = 'style="background-color: rgb(237, 242, 246);"';
								}
								$status = '';
								if ($v['status'] == 1){
									$status = "有效";
								} 
								if ($v['status'] == 2){
									$status = "<span style='color:red'>冻结</span>";
								}
								echo '
										<tr class="list_tbl" '.$flag.'>
																				<td class="link_bt"  valign="bottom">'.$v['id'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['menuId'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['title'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['useId'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['titlePic'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['cdate'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['content'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['status'].'</td>
																				<td >
										<span class="link_gn">
										<a href="#" onClick="edit('.$v['id'].');">
										<img height="16"  border="0" height="16" src="/static/admin/images/edit.gif" />
										</a>
										</span>
										</td>
										
										<td >
										<span class="link_gn">
										<a href="#" onClick="del('.$v['id'].');">
										<img height="16"  border="0" height="16" src="/static/admin/images/del.gif" />
										</a>
										</span>
										</td>
									</tr>
								';
							}
						
						?>						<tr>
							<td height="14" colspan="9">
							<table class="form_in" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tbody>
							<tr>
							<td bgcolor="#f6f8f9">
							<br><br>	
							<?php echo $page;?>							</td>
							</tr>
							</tbody>
							</table>
							</td>
						</tr>
						
					</tbody>
				</table>	
			</td>
		</tr>
        </table>
        </td>
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
</body>