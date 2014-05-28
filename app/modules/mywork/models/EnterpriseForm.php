<?php 
/**
 * 合作企业 * @author bao
 * 
 */;

class EnterpriseForm extends CFormModel
{
	public $id;	//企业ID	
	public $name;	//企业名称	
	public $pic;	//企业图标	
	public $remark;	//企业简介	
	public $link;	//企业站点	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,pic,remark,link',
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
		$data['formName'] = "合作企业管理";
		$data['id'] = '企业ID'; 
		$data['name'] = '企业名称'; 
		$data['pic'] = '企业图标'; 
		$data['remark'] = '企业简介'; 
		$data['link'] = '企业站点'; 
		return $data;
	}
}