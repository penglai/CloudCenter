<?php
class linkContent extends commonModel{
	
	public $id;
	public $menuId;
	public $title;
	public $userId;
	public $titlePic;
	public $cdate;
	public $content;
	public $status;
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'content';
	}
}