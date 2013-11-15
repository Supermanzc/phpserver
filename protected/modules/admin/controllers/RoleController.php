<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午4:26
 */
class RoleController extends BController{

    public function actionIndex(){
        $roleBehavior = new RoleBehavior();
        $res = $roleBehavior->getRoles();
        $this->render('index', $res);
    }

    public function actionAdd(){
        $params = Yii::app()->request->getPost('role');
        $roleBehavior = new RoleBehavior();
        $ruleBehavior = new RuleBehavior();
        if(!empty($params)){
            if(!empty($params['role_name']) && !empty($params['rule_ids'])){
                $res = $roleBehavior->saveOrUpdate($params);
                if($res)
                    $this->showAlert('success', '添加角色成功', '/admin/role/index');
                else
                    $this->showAlert('error', '添加角色失败,请重新添加', '/admin/role/add');
            }
            $this->showAlert('warning', '请选择角色权限');
        }
        $rules = $ruleBehavior->getRuleAll();
        $this->render('add', compact('rules'));
    }

    public function actionEdit(){
        $params = Yii::app()->request->getPost('role');
        $id = Yii::app()->request->getQuery('id');
        $roleBehavior = new RoleBehavior();
        $ruleBehavior = new RuleBehavior();
        if(!empty($params)){
            if(!empty($params['role_name']) && !empty($params['rule_ids'])){
                $res = $roleBehavior->saveOrUpdate($params);
                if($res)
                    $this->showAlert('success', '修改角色成功', '/admin/role/index');
                else
                    $this->showAlert('error', '修改角色失败,请重新修改', '/admin/role/edit/id/' . $params['id']);
            }
            $this->showAlert('warning', '请选择角色权限', '/admin/role/edit/id/' . $params['id']);
        }
        $rules = $ruleBehavior->getRuleAll();
        $res = $roleBehavior->getRole($id);
        $role = $roleBehavior->ruleIdsRole($res);
        $this->render('edit', compact('rules', 'role'));
    }

    public function actionRemove(){
        $id = Yii::app()->request->getQuery('id');
        $roleBehavior = new RoleBehavior();
        $res = $roleBehavior->remove($id);
        if($res){
            $this->showAlert('success', '删除成功');
        }else{
            $this->showAlert('error', '服务器繁忙,稍后重试');
        }
        $this->redirect('/admin/role/index');
    }

}