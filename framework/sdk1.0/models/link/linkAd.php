<?php
class linkAd extends commonModel{
	
	public $id;
	public $userId;
	public $templateId;
	public $pic;
	public $href;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'ad';
	}
}