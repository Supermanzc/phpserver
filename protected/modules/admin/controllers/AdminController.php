<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-1
 * Time: 上午10:17
 */
class AdminController extends BController{

    public function actionIndex(){
        $adminBehavior = new AdminBehavior();
        $result = $adminBehavior->getAdmins();
        $this->render('index', $result);
    }

    public function actionAdd(){
        $adminBehavior = new AdminBehavior();
        $roleBehavior = new RoleBehavior();
        $params = Yii::app()->request->getPost('admin');
        print_r($params);
        if(!empty($params)){
            if(!empty($params['email']) && !empty($params['password'])){
                $res = $adminBehavior->saveOrUpdate($params);
                if($res)
                    $this->showAlert('success', '添加管理员成功', '/admin/admin/index');
                else
                    $this->showAlert('error', '添加管理员失败,请重新添加', '/admin/admin/add');
            }
            $this->showAlert('warning', '请输入邮箱和密码等信息');
        }
        $roles = $roleBehavior->getRoleAll();
        $this->render('add', compact('roles'));
    }

    public function actionEdit(){
        $adminBehavior = new AdminBehavior();
        $roleBehavior = new RoleBehavior();
        $id = Yii::app()->request->getQuery('id');
        $params = Yii::app()->request->getPost('admin');
        //print_r($params); die();
        if(!empty($params)){
            if(!empty($params['username'])){
                $res = $adminBehavior->saveOrUpdate($params);
                if($res)
                    $this->showAlert('success', '修改管理员成功', '/admin/admin/index');
                else
                    $this->showAlert('error', '修改管理员失败,请重新添加', '/admin/admin/edit/id/' . $params['id']);
            }
            $this->showAlert('warning', '请输入邮箱和密码等信息', '/admin/admin/edit/id/' . $params['id']);
        }
        $admin = $adminBehavior->getAdmin($id);
        $roles = $roleBehavior->getRoleAll();
        $this->render('edit', compact('roles', 'admin'));
    }

    public function actionRemove(){
        $adminBehavior = new AdminBehavior();
        $id = Yii::app()->request->getQuery('id');
        $res = $adminBehavior->remove($id);
        if($res){
            $this->showAlert('success', '删除成功');
        }else{
            $this->showAlert('error', '服务器繁忙,稍后重试');
        }
        $this->redirect('/admin/admin/index');
    }
}