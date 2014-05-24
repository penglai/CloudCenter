<?php
	Yii::import('zii.widgets.CPortlet');
	class AdminList extends CPortlet{
		public function renderContent(){
			$this->render('list');
		}
	}