<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-3
 * Time: 下午4:37
 */
class PhotoSortBehavior{

    public function saveOrUpdate($params){
        $photo_sort = new PhotoSort();
        $photo_sort->_attributes = $params;
        if(!empty($photo_sort->id)){
            $photo_sort->setIsNewRecord(false);
        }
        $res = $photo_sort->save();
        return $res;
    }

    public function getPhotoSort($id){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('id'=>$id));
        return PhotoSort::model()->find($criteria);
    }

    public function getPhotoSorts($pageSize = 12){
        $criteria = new CDbCriteria();
        $criteria->order = 'id asc';
        $criteria->addColumnCondition(array('is_deleted'=>0));

        $count = PhotoSort::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);

        $photo_sorts = PhotoSort::model()->findAll($criteria);
        return compact('photo_sorts', 'pages');
    }

	/**
	 * 获取所有的相册分类信息
	 */
	public function getPhotoSortAll(){
		$criteria = new CDbCriteria();
		$criteria->order = 'id asc';
		$criteria->addColumnCondition(array('is_deleted'=>0));
		return PhotoSort::model()->findAll($criteria);
	}

	public function remove($id){
        $photo_sort = $this->getPhotoSort($id);
        $res = array();
        if(!empty($photo_sort)){
            $photo_sort->is_deleted = 1;
            $res = $photo_sort->save();
        }
        return $res;
    }

	/**
	 * 获取分类下所有的图片信息
	 */
	public function getSortPhotos($sort_id){
		$photo_sort = $this->getPhotoSort($sort_id);
		$photos = $photo_sort->photos;
		return $photo_sort;
	}
}