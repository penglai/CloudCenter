<?php 
/**
 * 轮显大图 * @author bao
 * 
 */;

class SpecialForm extends CFormModel
{
	public $id;	//大图ID	
	public $pic;	//图片路径	
	public $link;	//图标链接	
	public $status;	//状态：1显示，2隐藏	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('pic,link,status',
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
		$data['formName'] = "轮显大图管理";
		$data['id'] = '大图ID'; 
		$data['pic'] = '图片路径'; 
		$data['link'] = '图标链接'; 
		$data['status'] = '状态：1显示，2隐藏'; 
		return $data;
	}
}