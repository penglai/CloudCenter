<?php
class linkDistrict extends commonModel{
	
	public $id;    
	public $name;	//名称    
	public $cityId;	//城市ID    
	public $showOrder;	//显示顺序    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'district';
	}

}