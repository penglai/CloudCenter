<?php
class linkClass extends commonModel{
	
	public $id;	//频道ID    
	public $name;	//频道名称    
	public $pid;	//上级分类    
	public $status;	//频道状态：1显示，2隐藏,-1删除    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'class';
	}

}