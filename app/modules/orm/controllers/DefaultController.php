<?php
class DefaultController extends Controller
{
	public $layout='main';
	public $path_link='../framework/sdk1.0/models/link/';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionGenerate()
	{
		mysql_connect($_POST['ip'],$_POST['user'],$_POST['password']) or die('数据库连接不对');
		$link = mysql_connect($_POST['ip'],$_POST['user'],$_POST['password']);
		mysql_select_db($_POST['dbname']) or die('数据库不对');
		//mysql_set_charset('utf8');
		mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary", $link);
		
		
		
		$query=mysql_query('show tables');
		$table=array();
		while($row=mysql_fetch_array($query)){
			$table[]=$row[0];
		}
		
		$exist=array();
		$gen=array();
		foreach($table as $v){
			
			$file_path=$this->path_link.'link'.ucfirst($v).'.php';
			if(file_exists($file_path)){
				$exist[]=$v;
			}else{
				$query=mysql_query("SELECT COLUMN_NAME,COLUMN_COMMENT FROM information_schema.columns WHERE table_name='$v'");
				$fields=array();
				while($row=mysql_fetch_array($query)){
					$fields[$row[0]]=$row[1];
				}
				$code=$this->renderPartial('_class',array('table'=>$v,'fields'=>$fields),true);
				file_put_contents($file_path,$code);
				$gen[]=$v;
			}
		}
		echo 'Exist:'.count($exist).'('.join(',',$exist).')<br>';
		echo 'Generate:'.count($gen).'('.join(',',$gen).')';
	}
}