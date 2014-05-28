<?php
class linkEnterprise extends commonModel{
	
	public $id;	//企业ID    
	public $name;	//企业名称    
	public $pic;	//企业图标    
	public $remark;	//企业简介    
	public $link;	//企业站点    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'enterprise';
	}

}