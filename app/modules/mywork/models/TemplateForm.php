<?php 
/**
 * 模板 * @author bao
 * 
 */;

class TemplateForm extends CFormModel
{
	public $id;	//模板ID	
	public $name;	//模板名称	
	public $tag;	//模板字符	
	public $status;	//1有效2终止	
	public $type;	//1首页，2列表页，3内容页	
	public $pic;	//模板效果图	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,tag,status,type,pic',
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
		$data['formName'] = "模板管理";
		$data['id'] = '模板ID'; 
		$data['name'] = '模板名称'; 
		$data['tag'] = '模板字符'; 
		$data['status'] = '1有效2终止'; 
		$data['type'] = '1首页，2列表页，3内容页'; 
		$data['pic'] = '模板效果图'; 
		return $data;
	}
}