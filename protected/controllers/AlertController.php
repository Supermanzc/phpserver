<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-21
 * Time: 上午10:52
 */
class AlertController extends CController{
	public function actionIndex(){
		$config = CJavaScript::encode(Yii::app()->params->toArray());
		Yii::app()->clientScript->registerScript('appConfig',
			"var config = ".$config.";",CClientScript::POS_HEAD);
		$this->render('index');
	}

}