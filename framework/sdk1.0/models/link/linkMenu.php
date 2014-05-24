<?php
class linkMenu extends commonModel{
	
	public $id;
	public $name;
	public $type;
	public $showOrder;
	public $userId;
	public $logo;
	public $logoId;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'menu';
	}
}