<?php
class SiteController extends CController{
    public function actionIndex(){
        $this->render('index');
    }

    public function actionError(){
        echo '你犯错了哇';
        $this->render('error');
    }
}
