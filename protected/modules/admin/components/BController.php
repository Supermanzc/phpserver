<?php
class BController extends CController{
    public $layout = '/layout/main';
    public $action_id;
    public $controller_id;
    public $url;
    protected $filterAction = array('login', 'logout');

    public function beforeAction($action){
        parent::beforeAction($action);
        $this->cssAndScriptFile();
        $this->action_id = Yii::app()->controller->action->id;
        $this->controller_id = Yii::app()->controller->id;
        $this->url = '/admin/' . $this->controller_id . '/' . $this->action_id;
        //$this->checkLogin();
        return  true;
    }

    public function cssAndScriptFile(){
        $baseUrl = Yii::app()->request->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/statics/bootstrap3/css/bootstrap.css');
        $cs->registerCssFile($baseUrl . '/statics/bootstrap3/css/bootstrap-theme.css');
        $cs->registerCssFile($baseUrl . '/statics/css/offcanvas.css');
        $cs->registerScriptFile($baseUrl . '/statics/js/jquery-1.7.2.min.js');
        $cs->registerScriptFile($baseUrl . '/statics/js/jquery-validate.js');
        //$cs->registerScriptFile($baseUrl . '/statics/bootstrap3/js/jquery.js');
        $cs->registerScriptFile($baseUrl . '/statics/bootstrap3/js/bootstrap.js');

    }

    public function showAlert($alert, $title, $url = ''){
        $message = array();
        $message['alert'] = $alert;
        $message['msg'] = $title;
        Yii::app()->user->setFlash('message', $message);
        if(!empty($url)){
            $this->redirect($url);
        }
    }

    /**
     * 权限控制
     */
    public function checkLogin()
    {
        if (!in_array($this->action_id, $this->filterAction)) {
            $manager = Yii::app()->session['user'];
            if (empty($manager)) {
                $this->redirect('/admin/manager/login');
            } else {
                $roleBehavior = new RoleBehavior();
                $role = $roleBehavior->getRole($manager['role_id'])->attributes;
                $ruleBehavior = new RuleBehavior();
                $url_array = $ruleBehavior->urlArray($roleBehavior->ruleIdsJsonDecode($role['rule_ids']));
                if(empty($url_array)){
                    $this->showAlert('error', '你没有权限进入后台，请联系管理员','/admin/manager/logout');
                }else if(!in_array($this->url, $url_array)){
                    //$this->showAlert('warning', "你没有执行该操作的权限,请联系管理员开通权限",'/admin/site/error');
                }else if($manager['status'] == 2){
                    //$this->showAlert('warning', "你的账号已被禁用，请联系管理员",'/admin/manager/login');
                }

                /*if( 0==$manager['is_admin'])
                    $this->redirect("/");

                $time_out = Yii::app()->session['timeout'];
                if (!empty($time_out)) {

                    Yii::app()->session['timeout'] = time();
                }
                //check role rule controller/action
                $rules = Yii::app()->session['rule'];
                $this_url = $this->controller_id."/".$this->action_id;
                //白名单,所有登录的管理员都可以访问的
                $url_array =array('manager/mypass','site/index','manager/logout');
                if (empty($rules)) {
                    //获取一次权限测试，如果能获取到则是前台登录后直接进入的

                    $roleid = $manager['admin_role'];
                    if(!empty($roleid)){
                        $rule = array();
                        if(!empty($roleid)){
                            $role = Role::model()->getById($roleid);
                            if(!empty($role["rule_ids"]))
                            {
                                $rule_ids  =  CJSON::decode($role['rule_ids']);
                                $rule = Rule::model()->getByIds($rule_ids);
                            }
                        }
                        if(!empty($rule)){
                            Yii::app()->session['rule'] = $rule;
                            $rules = $rule;
                        }else{
                            $this->showError("你没有任何角色权限(干瞪眼!)，请联系管理员开通权限。");
                            return true;
                        }
                    }
                }

                foreach ($rules as $key => $value) {
                    $url_array[]=$value['controllerid']."/".$value['actionid'];
                }
                if (!in_array($this_url, $url_array)) {
                    $this->showError("你没有执行该操作的权限,请联系管理员开通权限");
                }*/
            }
        }
    }
}