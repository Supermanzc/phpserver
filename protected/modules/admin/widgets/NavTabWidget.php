<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-10-30
 * Time: 下午4:42
 */
class NavTabWidget extends CWidget{
    public $index;

    public function init(){
        parent::init();
    }

    public function run(){
        $full_menu['rule'][] = array('权限列表', '/admin/rule/index');
        $full_menu['rule'][] = array('权限添加', '/admin/rule/add');

        $full_menu['role'][] = array('角色列表', '/admin/role/index');
        $full_menu['role'][] = array('角色权限添加', '/admin/role/add');

        $full_menu['admin'][] = array('管理员列表', '/admin/admin/index');
        $full_menu['admin'][] = array('管理员添加', '/admin/admin/add');

        $full_menu['photosort'][] = array('相册分类列表', '/admin/photosort/index');
        $full_menu['photosort'][] = array('相册分类添加', '/admin/photosort/add');

        $full_menu['photo'][] = array('相册列表', '/admin/photo/index');
        $full_menu['photo'][] = array('图库添加', '/admin/photo/add');

        $full_menu['user'][] = array('修改账号', '/admin/user/updatedeptuserpw');

        $menus = $full_menu[$this->index];
        $current_menu = '/admin/'.$this->controller->id.'/'.$this->controller->action->id;
        $this->render("navTab", compact('menus', 'current_menu'));
    }
}