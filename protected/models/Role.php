<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-31
 * Time: 下午2:13
 */
class Role extends CActiveRecord{
    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{system_role}}';
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

    public function relations(){
        return array(
            'role'=>array(self::HAS_MANY, 'admin', 'role_id'),
        );
    }
}