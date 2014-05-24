<?php
/**
 * 代理商管理
 * @author bao
 * 
 */
class CsController extends Controller 
{
	/**
	 * 显示首页
	 */
	public function actionIndex() 
	{
		$data['name'] = "代理商管理";
		$csModel = new linkCs();
		$csModel->initVar($csModel);
		
		$p = $_GET['page']?$_GET['page']:1;
		$total = $csModel->getListCount();
		$limit = 20;
		$from = ($p-1)*$limit;
		$page_nums = 10;
		 
		$page = new sdkPage($total,$p,$limit,$page_nums,"/mywork/cs/index/page/");
		$data['page'] = $page->adminShow();
		$data['info'] = $csModel->getList($from, $limit);
		$this->render('list',$data);
	}
	
	/**
	 * 添加代理商
	 */
	public function actionAdd()
	{
		$model = new CsForm();
		if (isset($_POST['CsForm'])) {
			$_POST['CsForm']['province'] = $_POST['province'];
			$_POST['CsForm']['city'] = $_POST['city'];
			$_POST['CsForm']['district'] = $_POST['district'];
			$model->attributes = $_POST['CsForm'];
			if($model->validate()){
				$csModel = new linkCs();
				$csModel->initVar($csModel);
				$saveArray = $model->attributes;
				$saveArray['cdate'] = date("Y-m-d H:i:s");
				$saveArray['password'] = md5($model->tel);
				$csModel->save($saveArray);
				$this->showmsg("操作成功",'/mywork/cs');
			}
		}
		$model->status = 1;
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	/**
	 *  编辑代理商
	 */
	public function actionModify()
	{
		$csModel = new linkCs();
		$csModel->initVar($csModel);
		$csModel->id = $_REQUEST['id'];
		$csInfo = $csModel->search();
		if (empty($csInfo)) {
			$this->showmsg("代理商不存在！");
		}
		$model = new CsForm();
		if (isset($_POST['CsForm'])) {
			$_POST['CsForm']['province'] = $_POST['province'];
			$_POST['CsForm']['city'] = $_POST['city'];
			$_POST['CsForm']['district'] = $_POST['district'];
			$model->id = $_REQUEST['id'];
			$model->attributes = $_POST['CsForm'];
			if($model->validate()){
				$csModel = new linkCs();
				$csModel->initVar($csModel);
				$saveArray = $model->attributes;
				$csModel->modify($saveArray);
				$this->showmsg("操作成功",'/mywork/cs');
			}
		} else {
			$csInfo = $csInfo[0];
			$modelArray = get_object_vars($model);
			foreach ($modelArray as $n => $v){
				$model->$n = $csInfo[$n];
			}
			$_REQUEST['province'] = $csInfo['province'];
			$_REQUEST['city'] = $csInfo['city'];
			$_REQUEST['district'] = $csInfo['district'];
		}
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	
	/**
	 *  删除代理商
	 */
	public function actionDel()
	{
		$csModel = new linkCs();
		$csModel->initVar($csModel);
		$csModel->id = $_REQUEST['id'];
		$csInfo = $csModel->search();
		if (empty($csInfo)) {
			$this->showmsg("代理商不存在！");
		}
		$csModel = new linkCs();
		$csModel->initVar($csModel);
		$csModel->id = $_REQUEST['id'];
		$csModel->status = -1;
		$csModel->modify();
		$this->showmsg("操作成功",'/mywork/cs');
	}
}