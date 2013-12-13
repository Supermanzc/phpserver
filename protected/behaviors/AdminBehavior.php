<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-1
 * Time: 上午9:23
 */
class AdminBehavior extends CActiveRecordBehavior{

    public function saveOrUpdate($params){
        $admin = new Admin();
        $admin->_attributes = $params;
        if(!empty($admin->password))
            $admin->password = $this->passwordMd5($admin->password);
        if(!empty($admin->id)){
            $admin->setIsNewRecord(false);
        }else{
            $email = $this->getAdminEmail($params['email']);
            if(!empty($email)){
                return false;
            }
        }
        return $admin->save();
    }

    public function getAdminById($id){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('id'=>$id));
        return Admin::model()->find($criteria);
    }

    public function getAdminEmail($email){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('email'=>$email));
        return Admin::model()->find($criteria);
    }

    /**
     *  通过email查询用户
     */
    public function getUserToAdmin($email){
        //$admin_user = Admin::model()->find('LOWER(email)=?', array($email));
        $admin_user = Admin::model()->findByAttributes(array('email'=>$email));
        return $admin_user;
    }

    public function getAdmins($pageSize = 12){
        $criteria = new CDbCriteria();
        $criteria->order = 'id asc';
        $criteria->addColumnCondition(array('is_deleted'=>0));
        $count = Admin::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);
        $admins = Admin::model()->findAll($criteria);
        $result = $this->adminRoles($admins);
        return compact('result', 'pages');
    }

    public function adminRoles($admins){
        $res = array();
        $roleBehavior = new RoleBehavior();
        if(!empty($admins)){
            foreach($admins as $key=>$val){
                $res[$key]['admin'] = $val->attributes;
                $res[$key]['role'] = $roleBehavior->getRole($val['role_id']);
            }
        }
        return $res;
    }

    public function remove($id){
        $admin = $this->getAdmin($id);
        $res = array();
        if(!empty($admin)){
            $admin->is_deleted = 1;
            $res = $admin->save();
        }
        return $res;
    }

    public function passwordMd5($password){
        return md5($password);
    }

	/**
	 * 修改登录时间
	 */
	public function updateLoginTime($id){
		$params['ltime'] = time();
		$params['id'] = $id;
		$res = $this->saveOrUpdate($params);
		return $res;
	}

    public function setStatus($id){
        $admin = $this->getAdminById($id);
        if(!empty($admin)){
            switch ($admin->status) {
                case 1:
                    $admin->status = 2;
                    break;
                default:
                    $admin->status = 1;
                    break;
            }
            return $admin->save();
        }
    }

}