<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-3
 * Time: 下午4:29
 */
class PhotosortController extends BController{

    public function actionIndex(){
        $photosortBehavior = new PhotoSortBehavior();
        $result = $photosortBehavior->getPhotoSorts();
        $this->render('index', $result);
    }

    public function actionAdd(){
        $params = Yii::app()->request->getPost('photosort');
        $photosortBehavior = new PhotoSortBehavior();

        if(!empty($params)){
            if(!empty($params['sort_name'])){
                $res = $photosortBehavior->saveOrUpdate($params);
                if($res)
                    $this->showAlert('success', '添加分类成功', '/admin/photosort/index');
                else
                    $this->showAlert('error', '添加分类失败,请重新添加', '/admin/photosort/add');
            }
            $this->showAlert('warning', '请添加相册名称');
        }
        $this->render('add');
    }

    public function actionEdit(){
        $id = Yii::app()->request->getQuery('id');
        $params = Yii::app()->request->getPost('photosort');
        $photosortBehavior = new PhotoSortBehavior();

        if(!empty($params)){
            if(!empty($params['sort_name'])){
                $res = $photosortBehavior->saveOrUpdate($params);
                if($res)
                    $this->showAlert('success', '添加分类成功', '/admin/photosort/index');
                else
                    $this->showAlert('error', '添加分类失败,请重新添加', '/admin/photosort/add');
            }
            $this->showAlert('warning', '请添加相册名称');
        }
        $photo_sort = $photosortBehavior->getPhotoSort($id);
        $this->render('edit', compact('photo_sort'));
    }

    public function actionRemove(){
        $id = Yii::app()->request->getQuery('id');
        $photosortBehavior = new PhotoSortBehavior();
        $res =  $photosortBehavior->remove($id);
        if($res){
            $this->showAlert('success', '删除成功');
        }else{
            $this->showAlert('error', '服务器繁忙,稍后重试');
        }
        $this->redirect('/admin/photosort/index');
    }
}