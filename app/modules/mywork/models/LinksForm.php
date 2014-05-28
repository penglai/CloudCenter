<?php 
/**
 * 友情链接 * @author bao
 * 
 */;

class LinksForm extends CFormModel
{
	public $id;	//链接ID	
	public $name;	//链接名称	
	public $link;	//链接地址	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,link',
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
		$data['formName'] = "友情链接管理";
		$data['id'] = '链接ID'; 
		$data['name'] = '链接名称'; 
		$data['link'] = '链接地址'; 
		return $data;
	}
}