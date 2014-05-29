<?php 
/**
 *  * @author bao
 * 
 */;

class CsForm extends CFormModel
{
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
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,loginName,password,tel,csTel,qq,province,city,district,userName,address,cdate,status,lastDate,remark',
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
		$data['formName'] = "管理";
		$data['id'] = ''; 
		$data['name'] = '代理商名称'; 
		$data['loginName'] = '登陆用户名'; 
		$data['password'] = '登陆密码'; 
		$data['tel'] = '联系人电话'; 
		$data['csTel'] = '代理商电话'; 
		$data['qq'] = '联系人qq'; 
		$data['province'] = '代理商省份'; 
		$data['city'] = '城市'; 
		$data['district'] = '县'; 
		$data['userName'] = '联系人姓名'; 
		$data['address'] = '联系地址'; 
		$data['cdate'] = '创建时间'; 
		$data['status'] = '-1删除，1有效，2冻结'; 
		$data['lastDate'] = '最后登陆'; 
		$data['remark'] = '备注'; 
		return $data;
	}
}