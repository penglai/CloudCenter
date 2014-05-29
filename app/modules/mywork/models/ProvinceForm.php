<?php 
/**
 *  * @author bao
 * 
 */;

class ProvinceForm extends CFormModel
{
	public $id;	
	public $name;	//名称	
	public $showOrder;	//显示顺序	
	public $remark;	//备注	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,showOrder,remark',
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
		$data['showOrder'] = '显示顺序'; 
		$data['remark'] = '备注'; 
		return $data;
	}
}