<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	
	
	public function __construct($id,$module=null)
	{
		parent::__construct($id,$module);
		/*
		//post过滤
		foreach( $_POST as $key => $val )
		{
		    $_POST[$key] = htmlspecialchars($val,ENT_QUOTES);
		}
		*/
		if(isset($_COOKIE['login_user_auth'])){
			$member=new Member();
			$str=$member->authcode($_COOKIE['login_user_auth']);
			$keepArr=explode("\t", $str);
			
			$member->memberLogin($keepArr[1], $keepArr[0]);
		}
		
		
	}
	
	
	/**
	 * 检测是否登陆,并跳转
	 */
	function checkIsLogin()
	{
		
		//判断是否登陆
		if (empty(Yii::app()->session['member_login'])){
			$this->redirect('/site/LoginView');
		}
		$memberInfo = Yii::app()->session['member_login'];
		
		if (!empty($memberInfo)){
			
			if((empty($memberInfo['occupation']) || empty($memberInfo['birthday']) || $memberInfo['province']=='0')){
				$this->redirect("/reg/regLogin");
			}
			if((empty($memberInfo['nickname']) || empty($memberInfo['pic_url']))
					&& $_SERVER['REQUEST_URI']!='/reg/welcome' 
					&& $_SERVER['REQUEST_URI']!='/reg/welcome/flag/1'
					){
				$this->redirect("/reg/welcome/flag/1");
			}
			if($memberInfo['pic_status']==3 && strpos($_SERVER['REQUEST_URI'],'/memberAblum')=== false){
				$this->redirect("/memberAblum/chageHeaderImg");
			}
			
		}
		
		//注册成功，但未给推荐
		if($memberInfo['is_push']==1){
			
			$create_time=strtotime($memberInfo['create_date']);
			$time=time();
			
			if($time>($create_time+3*60)){
				
				$member=new linkMember();
				$member->initVar($member);
				$list=$member->getPushTs(3,$memberInfo['sex'],$memberInfo['province'],$memberInfo['city'],$memberInfo['birthday']);
				
				$visit=new linkVisit();
				$visit->initVar($visit);
				$visit->member_visitor =$memberInfo['id'];
	        	$visit->visit_type = 2;
	        	
	        	foreach($list as $v){
		        	$visit->create_time=date('Y-m-d H:i:s',rand($create_time+60,$time));
		        	$visit->visitor_member=$v['id'];
		        	$visit->save();
	        	}
	        	
	        	$member->id=$memberInfo['id'];
	        	$member->is_push=2;
				$member->modify();
				
				$this->addSysSmg($memberInfo['id'], 6, $memberInfo['nickname'].'你已经注册成为“要约会”的会员，欢迎你加入要约会。完成“身份验证”并丰富您的“个人资料”，就能够增加关注度和约会的成功率喔！');
				
				$memberS = new Member();
				$memberS->memberFlushSession();
	        	
			}
        	
		}elseif($memberInfo['is_push']==2){
			
			if($memberInfo['later_date']=='0000-00-00 00:00:00' && $memberInfo['later_date']!='0000-00-00 00:00:00'){
				
				$create_time=strtotime($memberInfo['create_date']);
				$time=time();
				
				$member=new linkMember();
				$member->initVar($member);
				$list=$member->getPushTs(6,$memberInfo['sex'],$memberInfo['province'],$memberInfo['city'],$memberInfo['birthday']);
				
				$visit=new linkVisit();
				$visit->initVar($visit);
				$visit->member_visitor =$memberInfo['id'];
	        	$visit->visit_type = 2;
	        	
	        	$love=new linkLove();
				$love->initVar($love);
				$love->love_member_id =$memberInfo['id'];

		        $sendModel=new SendMessageModel();
		        $arr=Yii::app()->params->userParms;	
	        	
	        	foreach($list as $k=>$v){
	        		
	        		$create_date=rand($create_time+3*60,$time);
	        		
		        	$visit->create_time=date('Y-m-d H:i:s',$create_date);
		        	$visit->visitor_member=$v['id'];
		        	$visit->save();
		        	
		        	if($k%2){
		        		$love->create_date = date('Y-m-d H:i:s',$create_date+30);
		        		$love->member_id=$v['id'];
		        		$love->save();
		        	}else{
		        		$rand_key=array_rand($arr['operation']['predefined']);
		        		$content=$arr['operation']['predefined'][$rand_key];
		        		$res=$sendModel->msgCreate($v['id'], $memberInfo['id'], $content);
						$this->addSysSmg($memberInfo['id'], 1, str_replace("XXX",$memberInfo['nickname'],$arr['operation']['messageRemind']),$res);
					}
	        	}
	        	
	        	$member->id=$memberInfo['id'];
	        	$member->is_push=3;
				$member->modify();
				
				$memberS = new Member();
				$memberS->memberFlushSession();
				
			}
			
		}
		
		return Yii::app()->session['member_login'];
	}
	
	
	/**
	 * 检测登陆状态
	 */
	function checkLoginStatus()
	{
		if (Yii::app()->session['member_login']){
			return true;
		} else {
			return false;
		}
	}
	

	function showmsg($msg='',$url=-1){
		Yii::app()->session['notice'] = $msg;
		header("Content-type: text/html;charset=utf-8");
		if($url==-1){
			echo "<script>
				location.href='javascript:history.go(".$url.")';
				</script>";
			exit;
		}
		echo "<script>
				location.href='".$url."';
				</script>";
		exit;
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
	function getCity()
	{
		$url='http://api.map.baidu.com/location/ip?ak=BFnX28I7TkpiA8OimWrlV7YU&ip='.$this->getip();
		return json_decode(file_get_contents($url));
	}
	
	
	/**添加系统留言
	 * type 1、留言消息；2约会消息；3有眼缘消息；4访客消息；5礼物消息；6系统消息
	 * 
	 * 
	 * */
	function addSysSmg($member_id,$type,$content,$object_id='')
	{
		
		
		if(empty($member_id) || empty($type) || empty($content)){
			return false;
		}
		$sysMsgModel = new linkMember_sys_msg();
		$sysMsgModel->initVar($sysMsgModel);
		$sysMsgModel->member_id = $member_id;
		$sysMsgModel->type = $type;
		$sysMsgModel->is_read = 1;
		$sysMsgModel->content = $content;
		$sysMsgModel->create_date = date("Y-m-d H:i:s");
		$sysMsgModel->object_id = $object_id;
		$sysMsgModel->save();
	
		$redis = $this->getRedisObject ();
		
		if ($redis) {
			$res = $this->getMessage ( $member_id );
			
			$res = CJSON::encode ( $res );
			//推送未读
			
			$res = $redis->publish ( $member_id, $res );
			if ($res) {
				//把未读更新为已读【is_read=2】
				$sysMsgModel->updateIsRead($member_id);
			}
		}

		
		
	}
	
	/**
	 * redis消息推送接口
	 */
	public function getMessage($uid) {
	
		$memberModel = new linkMember();
		$memberModel->initVar($memberModel);
		$memberModel->id = $uid;
		$resBasicInfo = $memberModel->search ();
		$memberInfo = $resBasicInfo[0];
		
		if(!$memberInfo) {
			return 10002;
		}
	
		$sysMsgModel = new linkMember_sys_msg();
		
		//系统消息type=>6
		$sysMessage = $sysMsgModel->getMessage($uid, 6);
		$res['sysMessage'] = $sysMessage;
		
		//留言消息type=>1
		$guestMessage = $sysMsgModel->getMessage($uid, 1);
		
		$res['guestMessage'] = $guestMessage;
		
		
				
		//礼物消息type=>5
		$giftMessage = $sysMsgModel->getMessage($uid, 5);
		$res['giftMessage'] = $giftMessage;
	
		//约会消息type=>2
		$idateMessage = $sysMsgModel->getMessage($uid, 2);
		$res['idateMessage'] = $idateMessage;
		//眼缘消息type=>3
		$loveMessage = $sysMsgModel->getMessage($uid, 3);
		$res['loveMessage'] = $loveMessage;
	
		if ($res) {
			$k = 0;
			foreach ( $res as $key => $val ) {
				if ($val) {
					foreach ( $val as $key2 => $val2 ) {
						$res1 [$k] = $val2;
						$k ++;
					}
				}
			}
			return $res1;
		} else {
			return array ();
		}
	
	
	}
	
	
	/**
	 * get redis
	 * @return Redis|boolean
	 */
	public function getRedisObject()
	{
		$redisConfig = Yii::app()->params->redis;
		$redis = new Redis();
		$redis->connect($redisConfig['ip'],$redisConfig['port']);
		$res = $redis->auth($redisConfig['password']);
		if($res){
			return $redis;
		}else {
			return false;
		}
	}
	
}