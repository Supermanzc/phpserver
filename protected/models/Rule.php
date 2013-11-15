<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午5:15
 */
class Rule extends CActiveRecord {
    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{system_rule}}';
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