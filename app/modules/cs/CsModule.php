<?php
class CsModule extends CWebModule
{	
	public function init ()
	{
		$this->setImport(
			array('cs.models.*', 
					'cs.components.*',
					'cs.controllers.*',
					)
		);
	}
	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action)){
			return true;
		}else {
			return false;
		}	
	}
}
