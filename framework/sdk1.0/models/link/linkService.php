<?php
class linkService extends commonModel{
	
	public $id;    
	public $name;	//服务名称    
	public $year;	//服务年限    
	public $status;	//1有效2关闭-1删除    
	public $cdate;	//创建日期    
	public $remark;	//备注    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'service';
	}

}