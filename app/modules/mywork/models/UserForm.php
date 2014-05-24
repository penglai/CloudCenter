<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class UserForm extends CFormModel
{
	
	public $headPic;
	public $username;
	public $password;
	public $name;
	public $deparmentId;
	public $company;
	public $department_sub_id;
	public $positionId;
	public $mobileTel;
	public $email;
	public $telephone;
	public $subTelNum;
	public $qq;
	public $birthday;
	public $remark;
	public $cdate;
	public $love;
	public $maxim;
	public $roles;

	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
				array('roles,company,name,username,password,deparmentId,positionId,mobileTel,email,addDate',
					'required',
					'message'=>'不能为空',
					'on' => 'add',	
					),
				array('username', 'checkUserName','on' => 'add',),
				array('deparmentId', 'checkDeparmentId','on' => 'add',),
				array('roles,company,name,deparmentId,positionId,mobileTel,email,addDate',
						'required',
						'message'=>'不能为空',
						'on' => 'modify',
				),
				array('deparmentId', 'checkDeparmentId',),
				array('department_sub_id','safe'),
				array('email', 'email', 'message'=>'必须为电子邮箱'),
				array('name', 'length', 'max'=>22, 'min'=>3, 'tooLong'=>'请填写小于22位数', 'tooShort'=>'请填写大于2位数'),
				array('mobileTel', 'length', 'max'=>12, 'min'=>10, 'tooLong'=>'请填写小于12位数', 'tooShort'=>'请填写大于10位数'),
		);
	}
	
	function checkDeparmentId()
	{
		$departmentModel = new linkDeparment();
		$departmentModel->initVar($departmentModel);
		$departmentModel->pid = $this->deparmentId;
		$info = $departmentModel->search();
		if(!empty($info) && empty($this->department_sub_id)){
			$this->addError(deparmentId, "必须选择二级部门");
		} 
	}
	
	
	function checkUserName()
	{
		$user = new linkUser();
		$user->initVar($user);
		$user->username = $this->username;
		$info = $user->search();
		if(!empty($info)){
			$this->addError('username','该登录账号已存在！');
		}
	}
		
}