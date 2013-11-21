<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-19
 * Time: 下午2:02
 */
class TestController extends CController{
	public $layout = "//layout//main";

	public function actions(){
		return array(
			'property' => 'application.controllers.test.PropertyAction',
			'download' => 'application.controllers.test.DownloadAction',
		);
	}
}