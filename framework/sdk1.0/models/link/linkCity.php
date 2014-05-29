<?php
class linkCity extends commonModel{
	
	public $id;    
	public $name;    
	public $pid;	//省份ID    
	public $showOrder;	//显示顺序    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'city';
	}

}