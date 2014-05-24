<?php
class linkService extends commonModel{
	
	public $id;
	public $name;
	public $year;
	public $status;
	public $cdate;
	public $remark;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'service';
	}
}