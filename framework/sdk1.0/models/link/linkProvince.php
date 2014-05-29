<?php
class linkProvince extends commonModel{
	
	public $id;    
	public $name;	//名称    
	public $showOrder;	//显示顺序    
	public $remark;	//备注    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'province';
	}

}