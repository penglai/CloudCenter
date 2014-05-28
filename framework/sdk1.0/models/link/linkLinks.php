<?php
class linkLinks extends commonModel{
	
	public $id;	//链接ID    
	public $name;	//链接名称    
	public $link;	//链接地址    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'links';
	}

}