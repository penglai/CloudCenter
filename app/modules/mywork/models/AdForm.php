<?php 
/**
 * 展示大图 * @author bao
 * 
 */;

class AdForm extends CFormModel
{
	public $id;	//大图ID	
	public $userId;	//用户	
	public $templateId;	//所属模板	
	public $pic;	//图片	
	public $href;	//链接	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('userId,templateId,pic,href',
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
		$data['formName'] = "展示大图管理";
		$data['id'] = '大图ID'; 
		$data['userId'] = '用户'; 
		$data['templateId'] = '所属模板'; 
		$data['pic'] = '图片'; 
		$data['href'] = '链接'; 
		return $data;
	}
}