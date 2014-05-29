<?php 
/**
 * 用户 * @author bao
 * 
 */;

class UserForm extends CFormModel
{
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
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('loginName,name,password,tel,userName,userTel,address,province,city,district,cdate,csId,introduct,lastDate,qq,status,orderDate',
					'required',
					'message'=>'不能为空',
					),
		);
	}
	
	/**
	 * 获取属性名称
	 */
	function getOptionName()
	{
		$data['formName'] = "用户管理";
		$data['id'] = '用户ID'; 
		$data['loginName'] = '登陆用户名'; 
		$data['name'] = '单位名称'; 
		$data['password'] = '登陆密码'; 
		$data['tel'] = '联系电话'; 
		$data['userName'] = '联系人'; 
		$data['userTel'] = '联系人电话'; 
		$data['address'] = '联系地址'; 
		$data['province'] = '省'; 
		$data['city'] = '市'; 
		$data['district'] = ''; 
		$data['cdate'] = '创建时间'; 
		$data['csId'] = '渠道商ID'; 
		$data['introduct'] = '简介'; 
		$data['lastDate'] = '最后登陆时间'; 
		$data['qq'] = '联系人QQ'; 
		$data['status'] = '状态：1有效，2冻结，-1删除'; 
		$data['orderDate'] = '使用有效期'; 
		return $data;
	}
}