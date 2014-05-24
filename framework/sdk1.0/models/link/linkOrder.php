<?php
class linkOrder extends commonModel{
	
	public $id;
	public $userId;
	public $csId;
	public $type;
	public $status;
	public $cdate;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'order';
	}
}