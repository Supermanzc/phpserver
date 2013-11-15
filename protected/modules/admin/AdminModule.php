<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-29
 * Time: 下午4:53
 */
class AdminModule extends CWebModule{
    public $defaultController = 'site/index';
    public $layout = '//layout/main';

    public function init(){
        parent::init();
        $this->setImport(
            array(
                'admin.components.*'
            ));
    }
}