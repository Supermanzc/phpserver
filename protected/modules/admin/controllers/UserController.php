<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午2:10
 */
class UserController extends BController{

    public function actionIndex(){
        $this->render('index');
    }

    public function actionAdd(){
        $this->render('add');
    }
}