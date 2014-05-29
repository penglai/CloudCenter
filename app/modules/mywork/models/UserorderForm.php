<?php 
/**
 * 用户订单 * @author bao
 * 
 */;

class UserorderForm extends CFormModel
{
	public $id;	//用户订单ID	
	public $userId;	//用户ID	
	public $serviceId;	//服务ID	
	public $cdate;	//创建日期	
	public $status;	//1待完成，2已完成，-1删除	
	public $csId;	//代理商ID	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('userId,serviceId,cdate,status,csId',
					'required',
					'message'=>'不能为空',
					),
		);
	}
	
	/**
	 * 获取属性名称
	 */
	function getOptionName()
	{
		$data['formName'] = "用户订单管理";
		$data['id'] = '用户订单ID'; 
		$data['userId'] = '用户ID'; 
		$data['serviceId'] = '服务ID'; 
		$data['cdate'] = '创建日期'; 
		$data['status'] = '1待完成，2已完成，-1删除'; 
		$data['csId'] = '代理商ID'; 
		return $data;
	}
}