<?php
/**
 * 用户管理
 * @author bao
 * 
 */
class UserController extends Controller 
{
	/**
	 * 显示首页
	 */
	public function actionIndex() 
	{
		$data['name'] = "用户管理";
		$dataModel = new linkUser();
		$dataModel->initVar($dataModel);
		
		$p = $_GET['page']?$_GET['page']:1;
		$total = $dataModel->getListCount();
		$limit = 20;
		$from = ($p-1)*$limit;
		$page_nums = 10;
		 
		$page = new sdkPage($total,$p,$limit,$page_nums,"/mywork/user/index/page/");
		$data['page'] = $page->adminShow();
		$model = new UserForm();
		$data['options'] = $model->getOptionName();
		$data['info'] = $dataModel->getList($from,$limit);
		$this->render('list',$data);
	}
	
	/**
	 * 添加用户
	 */
	public function actionAdd()
	{
		$model = new UserForm();
		if (isset($_POST['UserForm'])) {
			$_POST['UserForm']['province'] = $_POST['province'];
			$_POST['UserForm']['city'] = $_POST['city'];
			$_POST['UserForm']['district'] = $_POST['district'];
			$model->attributes = $_POST['UserForm'];
			if($model->validate()){
				$dataModel = new linkUser();
				$dataModel->initVar($dataModel);
				$model->cdate = date("Y-m-d H:i:s");
				$model->password = md5($model->userTel);
				$model->csId = Yii::app()->session['cs_login']['id'];
				$saveArray = $model->attributes;
				$dataModel->save($saveArray);
				$this->showmsg("操作成功",'/cs/user');
			}
		}
		$model->status = 1;
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	/**
	 *  编辑用户
	 */
	public function actionModify()
	{
		$dataModel = new linkUser();
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$info = $dataModel->search();
		if (empty($info)) {
			$this->showmsg("用户不存在！");
		}
		$model = new UserForm();
		if (isset($_POST['UserForm'])) {
			$_POST['UserForm']['province'] = $_POST['province'];
			$_POST['UserForm']['city'] = $_POST['city'];
			$_POST['UserForm']['district'] = $_POST['district'];
			$model->id = $_REQUEST['id'];
			$model->attributes = $_POST['UserForm'];
			if ($model->validate()){
				$dataModel = new linkUser();
				$dataModel->initVar($dataModel);
				$saveArray = $model->attributes;
				$dataModel->modify($saveArray);
				$this->showmsg("操作成功",'/cs/user');
			}
		} else {
			$info = $info[0];
			$modelArray = get_object_vars($model);
			foreach ($modelArray as $n => $v){
				$model->$n = $info[$n];
			}
			$_REQUEST['province'] = $info['province'];
			$_REQUEST['city'] = $info['city'];
			$_REQUEST['district'] = $info['district'];
		}
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	
	/**
	 *  删除用户
	 */
	public function actionDel()
	{
		$csModel = new linkCs();
		$csModel->initVar($csModel);
		$csModel->id = $_REQUEST['id'];
		$csInfo = $csModel->search();
		if (empty($csInfo)) {
			$this->showmsg("用户不存在！");
		}
		$csModel = new linkCs();
		$csModel->initVar($csModel);
		$csModel->id = $_REQUEST['id'];
		$csModel->status = -1;
		$csModel->modify();
		$this->showmsg("操作成功",'/mywork/cs');
	}
}