<?php
class linkUserorder extends commonModel{
	
	public $id;	//用户订单ID    
	public $userId;	//用户ID    
	public $serviceId;	//服务ID    
	public $cdate;	//创建日期    
	public $status;	//1待完成，2已完成，-1删除    
	public $csId;	//代理商ID    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'userorder';
	}

}