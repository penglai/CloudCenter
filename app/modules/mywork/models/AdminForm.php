<?php 
/**
 * 管理员 * @author bao
 * 
 */;

class AdminForm extends CFormModel
{
	public $id;	//用户ID	
	public $userName;	//登录名	
	public $password;	//密码	
	public $realName;	//真实姓名	
	public $telephone;	//电话	
	public $loginDate;	//登陆时间	
	public $loginIp;	//登陆IP	
	
	
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('userName,password,realName,telephone,loginDate,loginIp',
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
		$data['formName'] = "管理员管理";
		$data['id'] = '用户ID'; 
		$data['userName'] = '登录名'; 
		$data['password'] = '密码'; 
		$data['realName'] = '真实姓名'; 
		$data['telephone'] = '电话'; 
		$data['loginDate'] = '登陆时间'; 
		$data['loginIp'] = '登陆IP'; 
		return $data;
	}
}