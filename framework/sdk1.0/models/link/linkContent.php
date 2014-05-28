<?php
class linkContent extends commonModel{
	
	public $id;	//文章ID    
	public $title;	//文章标题    
	public $cdate;	//发布时间    
	public $content;	//文章内容    
	public $pic;	//列表图标    
	public $cid;	//所属频道    
	public $author;	//作者    
	public $status;	//状态：1显示，2隐藏    
	public $uid;	//发表用户    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'content';
	}

}