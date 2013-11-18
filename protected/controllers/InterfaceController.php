<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-18
 * Time: 上午10:48
 */
class InterfaceController extends CController{

	public $layout = '//layout//main';
	public function actions(){
		return array(
			'comment_list_test'=>'application.controllers.interface.CommentListTest',
			'comment_create_test'=>'application.controllers.interface.CommentCreateTest',
		);
	}
}
