<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-3
 * Time: 下午4:29
 */
class PhotoController extends BController{
    public function actionIndex(){
	    $photoSortBehavior = new PhotoSortBehavior();
		$photo_sorts = $photoSortBehavior->getPhotoSorts(10);
        $this->render('index', $photo_sorts);
    }

    public function actionAdd(){
		$params = Yii::app()->request->getPost('photo');
	    $image_ids = Yii::app()->request->getPost('image_ids');
	    $del_image_ids = Yii::app()->request->getPost('del_image_ids');

	    $params['hashs'] = array_diff(explode(',', $image_ids), explode(',', $del_image_ids));
		$photoBehavior = new PhotoBehavior();
	    if(!empty($params)){
			if(!empty($image_ids)){
				$res = $photoBehavior->saveOrHashs($params);
				if($res)
					$this->showAlert('success', '上传成功', '/admin/photo/index');
				else
					$this->showAlert('error', '上传失败,请重新输入');
			}
	    }
	    $photoSortBehavior = new PhotoSortBehavior();
		$photo_sorts = $photoSortBehavior->getPhotoSortAll();
        $this->render('add', compact('photo_sorts'));
    }

    public function actionEdit(){
        $this->render('edit');
    }

	public function actionList(){
		$sort_id = Yii::app()->request->getQuery('sort_id');
		$photoSortBehavior = new PhotoSortBehavior();
		$photo_sort = $photoSortBehavior->getPhotoSort($sort_id);
		$this->render('list', compact('photo_sort'));
	}

    public function actionRemove(){
		$ids = Yii::app()->request->getPost('ids');
	    $sort_id = Yii::app()->request->getQuery('sort_id');
	    $photoBehavior = new PhotoBehavior();
	    if(!empty($ids)){
			foreach($ids as $key=>$val){
				$res = $photoBehavior->remove($val);
				/*print_r($res);
				die();*/
			}
		    $this->showAlert('success', '删除成功');
	    }else{
		    $this->showAlert('warning', '请选择你要删除的图片');
	    }
	    $this->redirect('/admin/photo/list/sort_id/'.$sort_id);
    }
}