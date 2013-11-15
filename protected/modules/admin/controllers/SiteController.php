<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-29
 * Time: 下午5:12
 */
class SiteController extends BController{

    public function actionIndex(){
        $this->render('index');
    }

    public function actionAdd(){
        $this->render('add');
    }

    public function actionError(){
        $this->render('error');
    }
}