<?php
class linkProvince extends commonModel{
	
	public $id;
	public $name;
	public $remark;
	public $showOrder;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'province';
	}
}