<?php $this->widget('application.widgets.common.adminList'); ?>
<script>
function edit(id){
	window.location.href="/cs/user/modify/id/"+id;
}
function del(id){
	if (confirm("温馨提示：确定删除？")){
		window.location.href="/cs/user/del/id/"+id;
	}
}
</script>
<body >
<form action="admin_drink.php?ac=drinksearch" method="post" >
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
            <td width="83%"  class="left_txt">当前位置：<?php echo $name;?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
          <td align="right" width="60" class="left_txt">
			  <a href="/cs/user/add"><img src="/static/admin/images/add.gif"></a>&nbsp;&nbsp;
			  <a href="/cs/user/add">添加用户</a>
		  </td>
          </tr>
          <tr>
            <td height="20" colspan="3"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          
		<tr  colspan="3">
			<td colspan="3">
		        <table  width="100%" >	
					<tbody style="font-size:12px;">
						<tr class="list_tbl">
							<th height="30">ID</th>
							<th><?php echo $options['name'];?></th>
							<th><?php echo $options['tel'];?></th>
							<th><?php echo $options['userName'];?></th>
							<th><?php echo $options['loginName'];?></th>
							<th><?php echo $options['userTel'];?></th>
							<th><?php echo $options['qq'];?></th>
                            <th>所属省市</th>
							<th><?php echo $options['status'];?></th>
							<th colspan="2" >操作</th>
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
										<td class="link_bt" " valign="bottom">'.$v['tel'].'</td>
										<td class="link_bt" " valign="bottom">'.$v['userName'].'</td>
										<td class="link_bt"  valign="bottom">'.$v['loginName'].'</td>
										<td class="link_bt"  valign="bottom">'.$v['userTel'].'</td>
										<td class="link_bt"  valign="bottom">'.$v['qq'].'</td>
										<td class="link_bt"  valign="bottom">'.$v['provinceName'].$v['cityName'].$v['districtName'].'</td>
										<td class="link_bt"  valign="bottom">'.$status.'</td>
										<td >
										<span class="link_gn">
										<a href="#" onClick="edit('.$v['id'].');">
										<img height="16"  border="0" height="16" src="/static/admin/images/edit.gif" />
										</a>
										</span>
										</td>
										
										<td >
										<!--
										<span class="link_gn">
										<a href="#" onClick="del('.$v['id'].');">
										<img height="16"  border="0" height="16" src="/static/admin/images/del.gif" />
										</a>
										</span>
										-->
										</td>
									</tr>
								';
							}
						
						?>
						<tr>
							<td height="14" colspan="9">
							<table class="form_in" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tbody>
							<tr>
							<td bgcolor="#f6f8f9">
							<br><br>	
							<?php echo $page;?>	
							</td>
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
</form>
</body>