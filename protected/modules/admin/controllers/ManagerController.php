<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-31
 * Time: 下午10:34
 */
class ManagerController extends BController{

    public function actionLogin(){
        $user = new LoginForm();
        if(!empty($_POST['LoginForm'])){
            $user->attributes=$_POST['LoginForm'];
            if($user->validate() && $user->login()){
                $this->redirect('/admin/');
                return true;
            }
        }
        $this->layout='';
        $this->render('login',compact('user'));
    }

    public function actionLogout()
    {
        Yii::app()->session->clear();
        $this->redirect("/admin/manager/login");
    }

    /**
     * 修改密码
     */
    public function actionEdit(){
        $id = Yii::app()->request->getQuery('id');
        $params = Yii::app()->request->getPost('admin');
        if(!empty($id)){
            $adminBehavior = new AdminBehavior();
            $admin = $adminBehavior->getAdmin($id);
            if(!empty($params['password'])){
                if($admin->password == $adminBehavior->passwordMd5($params['old'])){
                    if($this->pwDetect($params['password'], $params['replypw'])){
                        $res = $adminBehavior->saveOrUpdate($params);
                        if($res)
                            $this->showAlert('success', '修改密码成功', '/admin/manager/logout');
                        else
                            $this->showAlert('error', '修改密码失败,请重新输入');
                    }else{
                        $this->showAlert('warning', '两次输入的密码不一致,请重新输入');
                    }
                }else{
                    $this->showAlert('warning', '新密码和旧密码不一致，请重新输入');
                }
            }
            $this->render('edit', compact('admin'));
        }else{
            $this->showAlert('warning', '密码已过期，请重新登录!', '/admin/manager/logout');
        }
    }

    public function pwDetect($password, $repassword){
        return ($password == $repassword)?true:false;
    }
}