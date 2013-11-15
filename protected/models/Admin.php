<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-31
 * Time: 下午10:38
 */
class Admin extends CActiveRecord{
    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{admin}}';
    }

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'ctime',
                'updateAttribute' => 'mtime',
                'setUpdateOnCreate'=>'true',
            ),
            'AdminBehavior'=> array(
                'class' => 'application.behaviors.AdminBehavior'
            )
        );
    }

    public function relations(){
        return array();
    }
}