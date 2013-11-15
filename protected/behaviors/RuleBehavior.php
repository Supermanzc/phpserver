<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午5:02
 */
class RuleBehavior{

    public function saveOrUpdate($params){
        $rule = new Rule();
        $rule->_attributes = $params;
        if(!empty($rule->id))
            $rule->setIsNewRecord(false);
        $res = $rule->save();
        return $res;
    }

    /**
     * @param $id 权限id
     * @return 内容
     */
    public function getRule($id){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('id'=>$id));
        return Rule::model()->find($criteria);
    }

    /**
     * 返回权限列表
     * pageSize
     */
    public function getRules($pageSize = 12){
        $criteria = new CDbCriteria();
        $criteria->order = 'ctime desc';
        $criteria->addColumnCondition(array('is_deleted'=>0));

        $count = Rule::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);

        $rules = Rule::model()->findAll($criteria);
        return compact('rules', 'pages');
    }

    /**
     * 删除权限
     */
    public function remove($id){
        $rule = $this->getRule($id);
        $res = array();
        if(!empty($rule)){
            $rule->is_deleted = 1;
            $res = $rule->save();
        }
        return $res;
    }

    /**
     * 获取所有的权限
     */
    public function getRuleAll(){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('is_deleted'=>0));
        $rules = Rule::model()->findAll($criteria);
        return $rules;
    }

    /**
     * 转换为地址 /admin/controller/action
     */
    public function urlArray($rule_ids){
        $res = array();
        if(!empty($rule_ids)){
            foreach($rule_ids as $key=>$val){
                $rule = $this->getRule($val);
                if(!empty($rule)){
                    $url = '/admin/'.$rule['controller_id'] . '/' .$rule['action_id'];
                    $res[] = $url;
                }
            }
        }
        return $res;
    }
}