<?php 
/**
 * 合作企业 * @author bao
 * 
 */;


class EnterpriseController extends Controller 
{
	/**
	 * 显示首页
	 */
	public function actionIndex() 
	{
		$data['name'] = "合作企业";
		$model = new EnterpriseForm();
		
		$model->attributes = $_POST['EnterpriseForm'];
		$whereInfo = $this->getSearchInfo($model->attributes);
		
		$dataModel = new linkEnterprise();
		$dataModel->initVar($dataModel);
		$p = $_GET['page']?$_GET['page']:1;
		$total = $dataModel->searchCountNum($whereInfo);
		$limit = 20;
		$from = ($p-1)*$limit;
		$page_nums = 10;
		$page = new sdkPage($total,$p,$limit,$page_nums,"/mywork/enterprise/index/page/");
		$data['page'] = $page->adminShow();
		$whereInfo.= " order by id desc limit $from,$limit";
		$data['info'] = $dataModel->search($whereInfo);
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('list',$data);
	}
	
	/**
	 * 添加合作企业	 */
	public function actionAdd()
	{
		$model = new EnterpriseForm();
		if (isset($_POST['EnterpriseForm'])) {
			$model->attributes = $_POST['EnterpriseForm'];
			if($model->validate()){
				$dataModel = new linkEnterprise();
				$dataModel->initVar($dataModel);
				$saveArray = $model->attributes;
				$dataModel->save($saveArray);
				$this->showmsg("操作成功",'/mywork/enterprise');
			}
		}
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	/**
	 *  编辑合作企业	 */
	public function actionModify()
	{
		$dataModel = new linkEnterprise();
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$dataInfo = $dataModel->search();
		if (empty($dataInfo)) {
			$this->showmsg("合作企业不存在！");
		}
		$model = new EnterpriseForm();
		if (isset($_POST['EnterpriseForm'])) {
			$model->id = $_REQUEST['id'];
			$model->attributes = $_POST['EnterpriseForm'];
			if($model->validate()){
				$dataModel = new linkEnterprise();
				$dataModel->initVar($dataModel);
				$saveArray = $model->attributes;
				$dataModel->modify($saveArray);
				$this->showmsg("操作成功",'/mywork/enterprise');
			}
		} else {
			$dataInfo = $dataInfo[0];
			$modelArray = get_object_vars($model);
			foreach ($modelArray as $n => $v){
				$model->$n = $dataInfo[$n];
			}
		}
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	
	/**
	 *  删除合作企业	 */
	public function actionDel()
	{
		$dataModel = new linkEnterprise();
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$dataInfo = $dataModel->search();
		if (empty($dataInfo)) {
			$this->showmsg("合作企业不存在！");
		}

		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$dataModel->delete();
		$this->showmsg("操作成功",'/mywork/enterprise');
	}
	
	/**
	 * 组织查询条件
	 * @param array $needArray
	 */
	function getSearchInfo($needArray,$fix=''){
		$where = " 1=1 ";
		if(!empty($needArray)){
			
			foreach ($needArray as $n => $v){
				if(!empty($v)){
					if (empty($fix)){
						$where.=" and ".$n."='".$v."' ";
					} else {
						$where.=" and ".$fix.".".$n."='".$v."' ";
					}
				}
			}
		}
		return $where;
	}
}