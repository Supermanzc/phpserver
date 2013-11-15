<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-29
 * Time: 下午9:32
 */
class NavBarWidget extends CWidget{

    public function init(){
        parent::init();
    }

    public function run(){
        $this->render('navBar');
    }

}