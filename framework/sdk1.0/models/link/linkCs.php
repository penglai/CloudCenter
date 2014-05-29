<?php
class linkCs extends commonModel{
	
	public $id;    
	public $name;	//代理商名称    
	public $loginName;	//登陆用户名    
	public $password;	//登陆密码    
	public $tel;	//联系人电话    
	public $csTel;	//代理商电话    
	public $qq;	//联系人qq    
	public $province;	//代理商省份    
	public $city;	//城市    
	public $district;	//县    
	public $userName;	//联系人姓名    
	public $address;	//联系地址    
	public $cdate;	//创建时间    
	public $status;	//-1删除，1有效，2冻结    
	public $lastDate;	//最后登陆    
	public $remark;	//备注    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'cs';
	}

}