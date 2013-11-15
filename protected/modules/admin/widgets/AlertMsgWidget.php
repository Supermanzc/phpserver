<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午5:52
 */

class AlertMsgWidget extends CWidget{

    public function init(){
        parent::init();
    }

    public function run(){
        $bool_msg = Yii::app()->user->hasFlash('message');
        $message = array();
        if($bool_msg){
            $message = Yii::app()->user->getFlash('message');
        }
        $this->render('alertMsg', compact('message'));
    }
} 