<?php
class linkContent extends commonModel{
	
	public $id;	//文章ID    
	public $menuId;	//文章分类    
	public $title;	//文章标题    
	public $useId;	//用户ID    
	public $titlePic;	//文章图片    
	public $cdate;	//创建时间    
	public $content;	//文章内容    
	public $status;	//状态：-1隐藏 1显示    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'content';
	}

}