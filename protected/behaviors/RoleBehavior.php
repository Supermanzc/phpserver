<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-31
 * Time: 下午2:16
 */
class RoleBehavior {
    public function saveOrUpdate($params){
        $role = new Role();
        $params['rule_ids'] = $this->ruleIdsJsonEncode($params['rule_ids']);
        $role->_attributes = $params;
        if(!empty($role->id))
            $role->setIsNewRecord(false);
        $res = $role->save();
        return $res;
    }

    /**
     * 用户权限用json表示
     */
    public function ruleIdsJsonEncode($rule_ids){
        $res = array();
        if(!empty($rule_ids)){
            foreach($rule_ids as $key=>$rule_ids){
                $res[] = $rule_ids;
            }
        }
        return CJSON::encode($res);
    }

    /**
     * 返回权限json数据
     */
    public function ruleIdsJsonDecode($rule_ids){
        return CJSON::decode($rule_ids);
    }

    /**
     * 获取角色
     */
    public function getRole($id){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('id'=>$id));
        $res =  Role::model()->find($criteria);
        return $res;
    }

    /**
     * 返回角色列表
     * pageSize
     */
    public function getRoles($pageSize = 12){
        $criteria = new CDbCriteria();
        //$criteria->order = 'ctime desc';
        $criteria->addColumnCondition(array('is_deleted'=>0));

        $count = Role::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);

        $res = Role::model()->findAll($criteria);
        $roles = $this->ruleIdsJsonRoles($res);
        return compact('roles', 'pages');
    }

    /**
     * rule_ids转换为json数组
     */
    public function ruleIdsJsonRoles($roles){
        $res = array();
        if(!empty($roles)){
            foreach($roles as $key=>$val){
                $res[$key] = $this->ruleIdsRole($val);
            }
        }
        return $res;
    }

    public function ruleIdsRole($role){
        $res = array();
        if(!empty($role)){
            $res['id'] = $role['id'];
            $res['role_name'] = $role['role_name'];
            $res['role_desc'] = $role['role_desc'];
            $res['rule_ids'] = $this->ruleIdsJsonDecode($role['rule_ids']);
            $res['ctime'] = $role['ctime'];
            $res['mtime'] = $role['mtime'];
        }
        return $res;
    }

    /**
     * 删除角色
     */
    public function remove($id){
        $role = $this->getRole($id);
        $res = array();
        if(!empty($role)){
            $role->is_deleted = 1;
            $res = $role->save();
        }
        return $res;
    }

    /**
     * 获取所有的角色
     */
    public function getRoleAll(){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('is_deleted'=>0));

        $roles = Role::model()->findAll($criteria);
        return $roles;
    }


}