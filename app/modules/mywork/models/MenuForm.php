<?php 
/**
 * 菜单 * @author bao
 * 
 */;

class MenuForm extends CFormModel
{
	public $id;	//菜单ID	
	public $name;	//菜单名称	
	public $type;	//-1 商品相册 -2 留言板 1关联普通新闻	
	public $showOrder;	//显示顺序	
	public $userId;	//用户ID	
	public $logo;	//菜单图标	
	public $logoId;	//系统图标	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,type,showOrder,userId,logo,logoId',
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
		$data['formName'] = "菜单管理";
		$data['id'] = '菜单ID'; 
		$data['name'] = '菜单名称'; 
		$data['type'] = '-1 商品相册 -2 留言板 1关联普通新闻'; 
		$data['showOrder'] = '显示顺序'; 
		$data['userId'] = '用户ID'; 
		$data['logo'] = '菜单图标'; 
		$data['logoId'] = '系统图标'; 
		return $data;
	}
}