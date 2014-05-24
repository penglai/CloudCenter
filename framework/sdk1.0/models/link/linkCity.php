<?php
class linkCity extends commonModel{
	
	public $id;
	public $name;
	public $pid;
	public $showOrder;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'city';
	}
}