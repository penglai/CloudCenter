<?php
class linkOrder extends commonModel{
	
	public $id;	//订单ID    
	public $userId;	//用户ID    
	public $csId;	//商家ID    
	public $type;	//1年限服务，2自定义模板，3代运营服务    
	public $status;	//1未付费，2已付费    
	public $cdate;	//创建日期    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'order';
	}

}