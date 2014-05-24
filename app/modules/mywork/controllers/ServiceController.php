<?php
/**
 * 代理商管理
 * @author bao
 * 
 */
class ServiceController extends Controller 
{
	/**
	 * 显示首页
	 */
	public function actionIndex() 
	{
		$data['name'] = "服务管理";
		$ServiceModel = new linkService();
		$ServiceModel->initVar($ServiceModel);
		
		$p = $_GET['page']?$_GET['page']:1;
		$total = $ServiceModel->searchCountNum(" status > 0");
		$limit = 20;
		$from = ($p-1)*$limit;
		$page_nums = 10;
		 
		$page = new sdkPage($total,$p,$limit,$page_nums,"/mywork/cs/index/page/");
		$data['page'] = $page->adminShow();
		$where = " 1=1 and status > 0 order by id desc limit $from,$limit";
		$data['info'] = $ServiceModel->search($where);
		$this->render('list',$data);
	}
	
	/**
	 * 添加服务
	 */
	public function actionAdd()
	{
		$model = new ServiceForm();
		if (isset($_POST['ServiceForm'])) {
			$model->attributes = $_POST['ServiceForm'];
			if($model->validate()){
				$servicModel = new linkService();
				$servicModel->initVar($servicModel);
				$saveArray = $model->attributes;
				$saveArray['cdate'] = date("Y-m-d H:i:s");
				$servicModel->save($saveArray);
				$this->showmsg("操作成功",'/mywork/service');
			}
		}
		$model->status = 1;
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	/**
	 *  编辑服务
	 */
	public function actionModify()
	{
		$serviceModel = new linkService();
		$serviceModel->initVar($serviceModel);
		$serviceModel->id = $_REQUEST['id'];
		$info = $serviceModel->search();
		if (empty($info)) {
			$this->showmsg("服务不存在！");
		}
		$model = new ServiceForm();
		if (isset($_POST['ServiceForm'])) {
			$model->attributes = $_POST['ServiceForm'];
			$model->id = $_REQUEST['id'];
			if($model->validate()){
				$serviceModel = new linkService();
				$serviceModel->initVar($serviceModel);
				$saveArray = $model->attributes;
				$serviceModel->modify($saveArray);
				$this->showmsg("操作成功",'/mywork/service');
			}
		} else {
			$info = $info[0];
			$modelArray = get_object_vars($model);
			foreach ($modelArray as $n => $v){
				$model->$n = $info[$n];
			}
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
		$dataModel = new linkService();
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$Info = $dataModel->search();
		if (empty($Info)) {
			$this->showmsg("服务不存在！");
		}
		
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$dataModel->status = -1;
		$dataModel->modify();
		$this->showmsg("操作成功",'/mywork/service');
	}
}