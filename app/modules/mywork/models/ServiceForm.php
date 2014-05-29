<?php 
/**
 * 服务 * @author bao
 * 
 */;

class ServiceForm extends CFormModel
{
	public $id;	
	public $name;	//服务名称	
	public $year;	//服务年限	
	public $status;	//1有效2关闭-1删除	
	public $cdate;	//创建日期	
	public $remark;	//备注	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,year,status,cdate,remark',
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
		$data['formName'] = "服务管理";
		$data['id'] = ''; 
		$data['name'] = '服务名称'; 
		$data['year'] = '服务年限'; 
		$data['status'] = '1有效2关闭-1删除'; 
		$data['cdate'] = '创建日期'; 
		$data['remark'] = '备注'; 
		return $data;
	}
}