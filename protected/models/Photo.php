<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-3
 * Time: 下午4:33
 */
class Photo extends CActiveRecord{
    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{photo}}';
    }

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'ctime',
                'updateAttribute' => 'mtime',
                'setUpdateOnCreate'=>'true',
            )
        );
    }
}