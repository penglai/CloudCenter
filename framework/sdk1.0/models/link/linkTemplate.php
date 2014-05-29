<?php
class linkTemplate extends commonModel{
	
	public $id;	//模板ID    
	public $name;	//模板名称    
	public $tag;	//模板字符    
	public $status;	//1有效2终止    
	public $type;	//1首页，2列表页，3内容页    
	public $pic;	//模板效果图    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'template';
	}

}