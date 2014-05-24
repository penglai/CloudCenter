<?php
class TemplateForm extends CFormModel
{
	public $name;
	public $tag;
	public $status;
	public $type;
	public $pic;
	/**
	 * 验证规则
	 */
	public function rules()
	{
		return array(
				array('name,tag,status,type',
					'required',
					'message'=>'不能为空',
					'on' => 'add',
					),
				array(
					'pic',
					'file',    //定义为file类型
					'allowEmpty'=>false,
					'types'=>'jpg,png,gif',   //上传文件的类型
					'maxSize'=>1024*1024*10,    //上传大小限制，注意不是php.ini中的上传文件大小
					'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！',
					'message'=>'不能为空',
					'on' => 'ajax',		
					),
				array('pic', 'checkPic','on' => 'add'),
		);
	}
	
	/**
	 * 获取属性名称
	 */
	function getOptionName()
	{
		$data['formName'] = "模板管理";
		$data['name'] = '模板名称'; 
		$data['tag'] = '路径名称';
		$data['type'] = '模板类型';
		$data['status'] = '状态';
		$data['pic'] = '模板封面';
		return $data;
	}
	
	/**
	 * 检测上传文件是否存在
	 */
	function checkPic()
	{
		if (!empty($this->pic)) {
			$basePath = Yii::app()->params['myworkParams']['picPath']."temp/".$this->pic;
			$a = explode('.',$this->pic);
			$uploadPath = Yii::app()->params['myworkParams']['picPath'].date("Y",$a[0])."/".date("m",$a[0])."/".$this->pic;
			if (!file_exists($basePath) && !file_exists($uploadPath)
				){
				$this->addError('pic','请上传图片');
			}
		} else {
			$this->addError('pic','请上传图片');
		}
	}
		
}