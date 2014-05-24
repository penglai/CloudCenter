<?php
class CsForm extends CFormModel
{
	public $id;
	public $name;
	public $tel;
	public $province;
	public $city;
	public $district;
	public $userName;
	public $address;
	public $remark;
	public $qq;
	public $csTel;
	public $status;
	public $loginName;
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('loginName,name,tel,province,city,district,userName,address,csTel,status',
					'required',
					'message'=>'不能为空',
					),
				array('qq,remark','safe',),
				array('province', 'numerical', 'integerOnly' => true, 'message' => '格式错误'),
				array('qq', 'numerical', 'integerOnly' => true, 'message' => '格式错误'),
				array('loginName', 'length', 'max' => '10', 'min' => '5','tooLong' => '长度少于10个字符', 'tooShort' => '长度大于5个字符'),
				array('loginName','checkLoginName'),
		);
	}
	
	/**
	 * 检查名称是否重复
	 */
	public function checkLoginName()
	{
		$dataModel = new linkCs();
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
		$data['formName'] = "代理商管理";
		$data['name'] = '代理商名称'; 
		$data['tel'] = '联系人电话';
		$data['province'] = '所属省份';
		$data['city'] = '所属城市';
		$data['district'] = '所属地区';
		$data['userName'] = '联系人姓名';
		$data['address'] = '代理商地址';
		$data['remark'] = '备注';
		$data['csTel'] = '代理商电话';
		$data['qq'] = '联系人QQ';
		$data['status'] = '状态';
		$data['loginName'] = '登陆用户名';
		return $data;
	}	
}