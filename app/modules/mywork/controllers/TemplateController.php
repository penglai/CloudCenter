<?php
/**
 * 模板管理
 * @author bao
 * 
 */
class TemplateController extends Controller 
{
	/**
	 * 显示首页
	 */
	public function actionIndex() 
	{
		$data['name'] = "模板管理";
		$dataModel = new linkTemplate();
		$dataModel->initVar($dataModel);
		
		$p = $_GET['page']?$_GET['page']:1;
		$total = $dataModel->searchCountNum(" status > 0");
		$limit = 20;
		$from = ($p-1)*$limit;
		$page_nums = 10;
		 
		$page = new sdkPage($total,$p,$limit,$page_nums,"/mywork/template/index/page/");
		$data['page'] = $page->adminShow();
		$where = " 1=1 and status > 0 order by id desc limit $from,$limit";
		$data['info'] = $dataModel->search($where);
		$data['params'] = Yii::app()->params['myworkParams'];
		$this->render('list',$data);
	}
	
	/**
	 * 添加模板
	 */
	public function actionAdd()
	{
		$model = new TemplateForm('add');
		if (isset($_POST['TemplateForm'])) {
			$file = CUploadedFile::getInstance($model,'pic');
			$model->attributes = $_POST['TemplateForm'];
			$model->pic = $_REQUEST['picPath'];
			if($model->validate()){
				$basePath = Yii::app()->params['myworkParams']['picPath']."temp/";
				$fileNameInfo = explode(".",$model->pic);
				$picPath = Yii::app()->params['myworkParams']['picPath'].date("Y",$fileNameInfo[0])."/".date("m",$fileNameInfo[0])."/";
				is_dir($picPath)?null:@mkdir($picPath,0777,1);
				rename($basePath.$model->pic,$picPath.$model->pic);

				$dataModel = new linkTemplate();
				$dataModel->initVar($dataModel);
				$saveArray = $model->attributes;
				$dataModel->save($saveArray);
				$this->showmsg("操作成功",'/mywork/template');
			}
		}
		$data['params'] = Yii::app()->params['myworkParams'];
		$model->status = 1;
		$model->type = 1;
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	/**
	 *  编辑模板
	 */
	public function actionModify()
	{
		$dataModel = new linkTemplate();
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$info = $dataModel->search();
		if (empty($info)) {
			$this->showmsg("服务不存在！");
		}
		$model = new TemplateForm('add');
	
		
		if (isset($_POST['TemplateForm'])) {
			$file = CUploadedFile::getInstance($model,'pic');
			$model->attributes = $_POST['TemplateForm'];
			$model->pic = $_REQUEST['picPath'];
			$model->id = $_REQUEST['id'];
			if($model->validate()){
				$a = explode('.',$model->pic);
				$uploadPath = Yii::app()->params['myworkParams']['picPath'].date("Y",$a[0])."/".date("m",$a[0])."/".$model->pic;
				if (!file_exists($uploadPath)) {
					$basePath = Yii::app()->params['myworkParams']['picPath']."temp/";
					$fileNameInfo = explode(".",$model->pic);
					$picPath = Yii::app()->params['myworkParams']['picPath'].date("Y",$fileNameInfo[0])."/".date("m",$fileNameInfo[0])."/";
					is_dir($picPath)?null:@mkdir($picPath,0777,1);
					rename($basePath.$model->pic,$picPath.$model->pic);
				}
				$dataModel = new linkTemplate();
				$dataModel->initVar($dataModel);
				$saveArray = $model->attributes;
				$dataModel->modify($saveArray);
				$this->showmsg("操作成功",'/mywork/template');
			}
		} else {
			$info = $info[0];
			$modelArray = get_object_vars($model);
			foreach ($modelArray as $n => $v){
				$model->$n = $info[$n];
			}
		}
		$data['params'] = Yii::app()->params['myworkParams'];
		
		$data['model'] = $model;
		$data['options'] = $model->getOptionName();
		$this->render('add',$data);
	}
	
	
	/**
	 *  删除模板
	 */
	public function actionDel()
	{
		$dataModel = new linkTemplate();
		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$info = $dataModel->search();
		if (empty($info)) {
			$this->showmsg("服务不存在！");
		}

		$dataModel->initVar($dataModel);
		$dataModel->id = $_REQUEST['id'];
		$dataModel->status = -1;
		$dataModel->modify();
		$this->showmsg("操作成功",'/mywork/template');
	}
	
	/**
	 * 异步上传图片
	 */
	public function actionAjaxUpload()
	{
		$model = new TemplateForm('ajax');
		$model->attributes = $_POST['TemplateForm'];
		if($model->validate()){
	 		$file = CUploadedFile::getInstance($model,'pic');
			if(is_object($file)&&get_class($file) === 'CUploadedFile'){   // 判断实例化是否成功
				//文件扩展名	
				$basePath = Yii::app()->params['myworkParams']['picPath']."temp/";
				is_dir($basePath)?null:@mkdir($basePath,0777,1);
				$fileName = time().".".strtolower($file->extensionName);
				$picPath = $basePath.$fileName;
				$file->saveAs($picPath);
				$res['code'] = 0;
				$res['fileName'] = $fileName;
				$res['filePath'] = $picPath;
				//进行压缩
	// 			$setimg = new sdkSetimg();
	// 			$imageres = $setimg->resizeImage($picPath,600,700);
	// 			$setimg->saveImage($imageres,$picPath,100);
			}
		} else {
			$res['code'] = 1;
			$res['res'] = $model->getError('pic');
			
		}
		echo json_encode($res);
	}
	
}