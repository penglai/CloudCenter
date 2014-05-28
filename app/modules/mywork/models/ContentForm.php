<?php 
/**
 * 文章 * @author bao
 * 
 */;

class ContentForm extends CFormModel
{
	public $id;	//文章ID	
	public $title;	//文章标题	
	public $cdate;	//发布时间	
	public $content;	//文章内容	
	public $pic;	//列表图标	
	public $cid;	//所属频道	
	public $author;	//作者	
	public $status;	//状态：1显示，2隐藏	
	public $uid;	//发表用户	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('title,cdate,content,pic,cid,author,status,uid',
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
		$data['title'] = '文章标题'; 
		$data['cdate'] = '发布时间'; 
		$data['content'] = '文章内容'; 
		$data['pic'] = '列表图标'; 
		$data['cid'] = '所属频道'; 
		$data['author'] = '作者'; 
		$data['status'] = '状态：1显示，2隐藏'; 
		$data['uid'] = '发表用户'; 
		return $data;
	}
}