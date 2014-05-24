<?php
class UserForm extends CFormModel
{
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
	public $qq;
	public $loginName;
	public $userTel;

	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,tel,province,city,district,userName,address,loginName,status,userTel',
					'required',
					'message'=>'不能为空',
					),
				array('qq,introduct','safe',),
				array('loginName', 'length', 'max' => '10', 'min' => '5','tooLong' => '长度少于10个字符', 'tooShort' => '长度大于5个字符'),
				array('loginName','checkLoginName'),
		);
	}
	

	/**
	 * 检查名称是否重复
	 */
	public function checkLoginName()
	{
		$dataModel = new linkUser();
		$dataModel->initVar($dataModel);
		$dataModel->loginName = $this->loginName;
		$userInfo = $dataModel->search();
		if (!empty($userInfo) && $userInfo[0]['id'] != $this->id) {
			$this->addError('loginName','用户名已存在！');
		}
	}
	
	
	/**
	 * 获取属性名称
	 */
	function getOptionName()
	{
		$data['formName'] = "用户管理";
		$data['name'] = '单位名称';
		$data['loginName'] = '登录账号';
		$data['tel'] = '单位电话';
		$data['province'] = '所属省份';
		$data['city'] = '所属城市';
		$data['district'] = '所属地区';
		$data['userName'] = '联系人';
		$data['address'] = '用户地址';
		$data['introduct'] = '简介';
		$data['qq'] = '联系人QQ';
		$data['status'] = '状态';
		$data['userTel'] = '联系人电话';
		return $data;
	}
		
}