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
		window.location.href="/mywork/cs/modify/id/"+id;
	}
	function del(id){
		if (confirm("温馨提示：确定删除？")){
			window.location.href="/mywork/cs/del/id/"+id;
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
			  <a href="/mywork/cs/add"><img src="/static/admin/images/add.gif"></a>&nbsp;&nbsp;
			  <a href="/mywork/cs/add">添加</a>
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
							<?php echo $options['name'];?>：<?php echo $form->textField($model,'name',array('value'=>$model->name)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['loginName'];?>：<?php echo $form->textField($model,'loginName',array('value'=>$model->loginName)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['password'];?>：<?php echo $form->textField($model,'password',array('value'=>$model->password)); ?>	                </td>	
				
				</tr>	
				<tr>					<td class="left_txt">
							<?php echo $options['tel'];?>：<?php echo $form->textField($model,'tel',array('value'=>$model->tel)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['csTel'];?>：<?php echo $form->textField($model,'csTel',array('value'=>$model->csTel)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['qq'];?>：<?php echo $form->textField($model,'qq',array('value'=>$model->qq)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['province'];?>：<?php echo $form->textField($model,'province',array('value'=>$model->province)); ?>	                </td>	
				
				</tr>	
									<td class="left_txt">
							<?php echo $options['city'];?>：<?php echo $form->textField($model,'city',array('value'=>$model->city)); ?>	                </td>	
				
					
				<tr>					<td class="left_txt">
							<?php echo $options['district'];?>：<?php echo $form->textField($model,'district',array('value'=>$model->district)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['userName'];?>：<?php echo $form->textField($model,'userName',array('value'=>$model->userName)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['address'];?>：<?php echo $form->textField($model,'address',array('value'=>$model->address)); ?>	                </td>	
				
				</tr>	
									<td class="left_txt">
							<?php echo $options['cdate'];?>：<?php echo $form->textField($model,'cdate',array('value'=>$model->cdate)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['status'];?>：<?php echo $form->textField($model,'status',array('value'=>$model->status)); ?>	                </td>	
				
					
				<tr>					<td class="left_txt">
							<?php echo $options['lastDate'];?>：<?php echo $form->textField($model,'lastDate',array('value'=>$model->lastDate)); ?>	                </td>	
				
					
									<td class="left_txt">
							<?php echo $options['remark'];?>：<?php echo $form->textField($model,'remark',array('value'=>$model->remark)); ?>	                </td>	
				
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
						<th height="30"></th><th height="30">代理商名称</th><th height="30">登陆用户名</th><th height="30">登陆密码</th><th height="30">联系人电话</th><th height="30">代理商电话</th><th height="30">联系人qq</th><th height="30">代理商省份</th><th height="30">城市</th><th height="30">县</th><th height="30">联系人姓名</th><th height="30">联系地址</th><th height="30">创建时间</th><th height="30">-1删除，1有效，2冻结</th><th height="30">最后登陆</th><th height="30">备注</th>							<th colspan="2" >操作</th>
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
																				<td class="link_bt"  valign="bottom">'.$v['name'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['loginName'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['password'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['tel'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['csTel'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['qq'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['province'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['city'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['district'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['userName'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['address'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['cdate'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['status'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['lastDate'].'</td>
																				<td class="link_bt"  valign="bottom">'.$v['remark'].'</td>
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