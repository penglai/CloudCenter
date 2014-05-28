<?php
class linkAdmin extends commonModel{
	
	public $id;	//用户ID    
	public $userName;	//登录名    
	public $password;	//密码    
	public $realName;	//真实姓名    
	public $telephone;	//电话    
	public $loginDate;	//登陆时间    
	public $loginIp;	//登陆IP    
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'admin';
	}

}