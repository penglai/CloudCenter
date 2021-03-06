<?php
class DefaultController extends CController 
{
	
	public function __construct($id,$module=null)
	{
		parent::__construct($id,$module);
	}
	/**
	 * 显示首页
	 */
	public function actionIndex() 
	{
		if (!empty(Yii::app()->session['admin_login'])){
			$this->redirect('/mywork/default/login');
		}
		$data['params'] = Yii::app()->params['myworkParams'];
		$model = new LoginForm();
		if (isset($_POST['LoginForm'])) {
			//登陆操作
			$model->attributes = $_POST['LoginForm'];
			if($model->validate()){
				$adminModel = new linkAdmin();
				$adminModel->initVar($adminModel);
				$adminModel->userName = $model->userName;
				$adminModel->password = md5($model->password);
				$userInfo = $adminModel->search();
				Yii::app()->session['admin_login'] = $userInfo[0];
				
				$adminModel->initVar($adminModel);
				$adminModel->id        = $userInfo[0]['id'];
				$adminModel->loginDate = date("Y-m-d H:i:s");
				$adminModel->loginIP   = $this->getip(); 
				$adminModel->modify();
				$this->redirect('/mywork/default/login');
			}
		}
		$data['model'] = $model;
		$this->render('admin_login',$data);
	}
	
	/**
	 * 登陆首页
	 */
	public function actionLogin()
	{
		$this->checkIsLogin();
		$this->render('admin_index');
	}
	
	/**
	 * 登陆首页
	 */
	public function actionLoginOut()
	{
		Yii::app()->session['admin_login'] = '';
		$this->redirect('/mywork');
	}
	
	/**
	 * 登陆头
	 */
	public function actionLoginTop()
	{
		$userInfo = $this->checkIsLogin();
		$data['userInfo'] = $userInfo;
		$this->render('admin_top',$data);
	}
	
	/**
	 * 登陆右侧
	 */
	public function actionLoginRight()
	{
		$userInfo = $this->checkIsLogin();
		$data['userInfo'] = $userInfo;
		$this->render('admin_right',$data);
	}
	
	/**
	 * 登陆左侧
	 */
	public function actionLoginLeft()
	{
		$this->checkIsLogin();
		$this->render('admin_left');
	}
	
	/**
	 * 检测是否登陆,并跳转
	 */
	function checkIsLogin()
	{
		//判断是否登陆
		if (empty(Yii::app()->session['admin_login'])){
			$this->redirect('/mywork');
		}
		return Yii::app()->session['admin_login'];
	}
	
	
	/**
	 * 获取IP地址
	 */
	function getip(){
		$onlineip='';
		if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			$onlineip = getenv('HTTP_CLIENT_IP');
		} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			$onlineip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			$onlineip = getenv('REMOTE_ADDR');
		} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')){
			$onlineip = $_SERVER['REMOTE_ADDR'];
		}
		return $onlineip;
	}
	
	
	
}