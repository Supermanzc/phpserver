<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-22
 * Time: 上午10:26
 */
class EmailTestController extends CController{

	public function actionIndex(){
		Yii::import('application.vendors.*');
		require "Zend/Mail.php";
		$mail = new Zend_Mail('utf-8');
		$mail->setHeaderEncoding(Zend_Mime::ENCODING_QUOTEDPRINTABLE);
		$mail->addTo("15528101635@163.com", "Alexander Makarov");
		$mail->setFrom("15528101635@163.com", "zhong6972879");
		$mail->setSubject("Test email");
		$mail->setBodyText("Hello, world!");
		$mail->setBodyHtml("Hello, <strong>world</strong>!");
		$mail->send();
		echo "OK";
	}
}