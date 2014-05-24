<?php
class linkDistrict extends commonModel{
	
	public $id;
	public $name;
	public $cityId;
	public $showOrder;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'district';
	}
}