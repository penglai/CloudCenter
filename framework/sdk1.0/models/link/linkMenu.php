<?php
class linkMenu extends commonModel{
	
	public $id;	//菜单ID    
	public $name;	//菜单名称    
	public $type;	//-1 商品相册 -2 留言板 1关联普通新闻    
	public $showOrder;	//显示顺序    
	public $userId;	//用户ID    
	public $logo;	//菜单图标    
	public $logoId;	//系统图标    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'menu';
	}

}