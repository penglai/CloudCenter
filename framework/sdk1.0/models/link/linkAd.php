<?php
class linkAd extends commonModel{
	
	public $id;	//大图ID    
	public $userId;	//用户    
	public $templateId;	//所属模板    
	public $pic;	//图片    
	public $href;	//链接    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'ad';
	}

}