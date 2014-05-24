<?php
class linkUser extends commonModel{
	
	public $id;
	public $name;
	public $password;
	public $tel;
	public $province;
	public $city;
	public $district;
	public $userName;
	public $address;
	public $cdate;
	public $status;
	public $lastDate;
	public $introduct;
	public $csId;
	public $loginName;
	public $qq;
	public $userTel;
	public $orderDate;
	
	function __construct(&$db = ''){
		if (empty($db)){
			$this->db = new simpleDb();
		} else {
			$this->db = $db;
		}
		$this->dbSheet = 'user';
	}
	/**
	 * 列表使用
	 */
	function getList($from,$limit)
	{
		$sql = "select a.*,b.name as provinceName,c.name as cityName,d.name as districtName
		from user a
		left join province b on a.province = b.id
		left join city c on a.city = c.id
		left join district d on a.district = d.id
		where status > 0
		order by id desc limit $from,$limit
		";
		return $this->db->query_array($sql);
	}
	
	/**
	* 列表使用
	*/
	function getListCount()
	{
		$sql = "select count(*) as num from user where status > 0 ";
		$res = $this->db->query_array($sql);
		return $res[0]['num'];
		}
}