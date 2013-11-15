<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-29
 * Time: 下午9:49
 */
class NavListWidget extends CWidget{
    public function init(){
        parent::init();
    }

    public function run(){
        $category = array();
        $menus = array();

        $category['user'] = '用户管理';
        $menus['user'][] = array('用户列表', '/admin/user/index');
        //$menus['user'][] = array('权限设置', '/admin/user/set');

        $category['photosort'] = '相册分类管理';
        $menus['photosort'][] = array('相册分类列表', '/admin/photosort/index');
        $menus['photosort'][] = array('相册分类添加', '/admin/photosort/add');

        $category['photo'] = '相册管理';
        $menus['photo'][] = array('相册列表', '/admin/photo/index');
        $menus['photo'][] = array('图库添加', '/admin/photo/add');

        $category['role'] = '角色管理';
        $menus['role'][] = array('角色列表', '/admin/role/index');
        $menus['role'][] = array('角色添加', '/admin/role/add');

        $category['rule'] = '角色权限管理';
        $menus['rule'][] = array('角色权限列表', '/admin/rule/index');
        $menus['rule'][] = array('角色权限添加', '/admin/rule/add');

        $category['admin'] = '管理员管理';
        $menus['admin'][] = array('管理员列表', '/admin/admin/index');
        $menus['admin'][] = array('管理员添加', '/admin/admin/add');

        $c = $this->controller->id;
        $a = $this->controller->action->id;
        $ac = '';
        $am = '';
        foreach ($menus as $ck => $ms) {
            foreach ($ms as $m) {
                if ('/admin/'.$c.'/'.$a == $m[1]) {
                    $ac = $ck;
                    $am = '/admin/'.$c.'/'.$a;
                }
            }
        }
        $this->render("navList", compact('category', 'menus', 'c', 'a', 'ac', 'am'));
    }
}