<?php
class linkAdmin extends commonModel{
	
	public $id;
	public $userName;
	public $password;
	public $loginDate;
	public $loginIP;
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'admin';
	}
}