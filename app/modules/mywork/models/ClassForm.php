<?php 
/**
 * 频道 * @author bao
 * 
 */;

class ClassForm extends CFormModel
{
	public $id;	//频道ID	
	public $name;	//频道名称	
	public $pid;	//上级分类	
	public $status;	//频道状态：1显示，2隐藏,-1删除	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,pid,status',
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
		$data['formName'] = "频道管理";
		$data['id'] = '频道ID'; 
		$data['name'] = '频道名称'; 
		$data['pid'] = '上级分类'; 
		$data['status'] = '频道状态：1显示，2隐藏,-1删除'; 
		return $data;
	}
}