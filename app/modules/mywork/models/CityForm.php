<?php 
/**
 *  * @author bao
 * 
 */;

class CityForm extends CFormModel
{
	public $id;	
	public $name;	
	public $pid;	//省份ID	
	public $showOrder;	//显示顺序	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,pid,showOrder',
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
		$data['formName'] = "管理";
		$data['id'] = ''; 
		$data['name'] = ''; 
		$data['pid'] = '省份ID'; 
		$data['showOrder'] = '显示顺序'; 
		return $data;
	}
}