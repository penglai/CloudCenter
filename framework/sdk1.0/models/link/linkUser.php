<?php
class linkUser extends commonModel{
	
	public $id;	//用户ID    
	public $loginName;	//登陆用户名    
	public $name;	//单位名称    
	public $password;	//登陆密码    
	public $tel;	//联系电话    
	public $userName;	//联系人    
	public $userTel;	//联系人电话    
	public $address;	//联系地址    
	public $province;	//省    
	public $city;	//市    
	public $district;    
	public $cdate;	//创建时间    
	public $csId;	//渠道商ID    
	public $introduct;	//简介    
	public $lastDate;	//最后登陆时间    
	public $qq;	//联系人QQ    
	public $status;	//状态：1有效，2冻结，-1删除    
	public $orderDate;	//使用有效期    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'user';
	}

}