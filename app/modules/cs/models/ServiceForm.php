<?php
class ServiceForm extends CFormModel
{
	public $name;
	public $year;
	public $status;
	public $remark;
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,year,status',
					'required',
					'message'=>'不能为空',
					),
				array('remark','safe',),
				array('year', 'numerical', 'integerOnly' => true, 'message' => '格式错误'),
		);
	}
	
	/**
	 * 获取属性名称
	 */
	function getOptionName()
	{
		$data['formName'] = "服务管理";
		$data['name'] = '服务名称'; 
		$data['year'] = '服务期限';
		$data['remark'] = '服务说明';
		$data['status'] = '状态';
		return $data;
	}
		
}