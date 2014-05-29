<?php 
/**
 * 订单 * @author bao
 * 
 */;

class OrderForm extends CFormModel
{
	public $id;	//订单ID	
	public $userId;	//用户ID	
	public $csId;	//商家ID	
	public $type;	//1年限服务，2自定义模板，3代运营服务	
	public $status;	//1未付费，2已付费	
	public $cdate;	//创建日期	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('userId,csId,type,status,cdate',
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
		$data['formName'] = "订单管理";
		$data['id'] = '订单ID'; 
		$data['userId'] = '用户ID'; 
		$data['csId'] = '商家ID'; 
		$data['type'] = '1年限服务，2自定义模板，3代运营服务'; 
		$data['status'] = '1未付费，2已付费'; 
		$data['cdate'] = '创建日期'; 
		return $data;
	}
}