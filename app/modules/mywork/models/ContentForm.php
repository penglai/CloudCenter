<?php 
/**
 * 文章 * @author bao
 * 
 */;

class ContentForm extends CFormModel
{
	public $id;	//文章ID	
	public $menuId;	//文章分类	
	public $title;	//文章标题	
	public $useId;	//用户ID	
	public $titlePic;	//文章图片	
	public $cdate;	//创建时间	
	public $content;	//文章内容	
	public $status;	//状态：-1隐藏 1显示	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('menuId,title,useId,titlePic,cdate,content,status',
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
		$data['formName'] = "文章管理";
		$data['id'] = '文章ID'; 
		$data['menuId'] = '文章分类'; 
		$data['title'] = '文章标题'; 
		$data['useId'] = '用户ID'; 
		$data['titlePic'] = '文章图片'; 
		$data['cdate'] = '创建时间'; 
		$data['content'] = '文章内容'; 
		$data['status'] = '状态：-1隐藏 1显示'; 
		return $data;
	}
}