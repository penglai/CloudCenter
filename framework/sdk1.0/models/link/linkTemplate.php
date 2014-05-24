<?php
class linkTemplate extends commonModel{
	
	public $id;
	public $name;
	public $tag;
	public $status;
	public $type;
	public $pic;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'template';
	}
}