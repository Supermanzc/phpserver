<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午4:26
 */
class RuleController extends BController{

    public function actionIndex(){
        $ruleBehavior = new RuleBehavior();
        $res = $ruleBehavior->getRules(10);
        $this->render('index', $res);
    }

    public function actionAdd(){
        $params = Yii::app()->request->getPost('rule');
        $ruleBehavior = new RuleBehavior();
        if(!empty($params)){
            if(!empty($params['rule_name']) && !empty($params['controller_id']) && !empty($params['action_id'])){
                $res = $ruleBehavior->saveOrUpdate($params);
                if($res){
                    $this->showAlert('success', '添加成功!', '/admin/rule/index');
                }else{
                    $this->showAlert('error', '添加失败，请重新添加!', '/admin/rule/add');
                }
            }
            $this->showAlert('warning', '数据不足，请重新添加');
        }
        $this->render('add');
    }

    public function actionEdit(){
        $params = Yii::app()->request->getPost('rule');
        $id = Yii::app()->request->getQuery('id');
        $ruleBehavior = new RuleBehavior();
        if(!empty($params)){
            if(!empty($params['rule_name']) && !empty($params['controller_id']) && !empty($params['action_id'])){
                $res = $ruleBehavior->saveOrUpdate($params);
                if($res){
                    $this->showAlert('success', '修改成功!', '/admin/rule/index');
                }else{
                    $this->showAlert('error', '修改失败，请重试!', '/admin/rule/edit/id' . $params['id']);
                }
            }
            $this->showAlert('warning', '数据不足，请重新修改', '/admin/rule/index');
        }
        $rule = $ruleBehavior->getRule($id);
        $this->render('edit', compact('rule'));
    }

    public function actionRemove(){
        $id = Yii::app()->request->getQuery('id');
        $ruleBehavior = new RuleBehavior();
        $res = $ruleBehavior->remove($id);
        if($res){
            $this->showAlert('success', '删除成功');
        }else{
            $this->showAlert('error', '服务器繁忙,稍后重试');
        }
        $this->redirect('/admin/rule/index');
    }

}