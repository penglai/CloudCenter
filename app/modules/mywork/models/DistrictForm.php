<?php 
/**
 *  * @author bao
 * 
 */;

class DistrictForm extends CFormModel
{
	public $id;	
	public $name;	//名称	
	public $cityId;	//城市ID	
	public $showOrder;	//显示顺序	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,cityId,showOrder',
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
		$data['name'] = '名称'; 
		$data['cityId'] = '城市ID'; 
		$data['showOrder'] = '显示顺序'; 
		return $data;
	}
}