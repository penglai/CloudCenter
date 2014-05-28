<?php
class linkSpecial extends commonModel{
	
	public $id;	//大图ID    
	public $pic;	//图片路径    
	public $link;	//图标链接    
	public $status;	//状态：1显示，2隐藏    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'special';
	}

}