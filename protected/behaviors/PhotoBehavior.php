<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-3
 * Time: 下午4:41
 */
class PhotoBehavior{

    public function saveOrUpdate($params){
        $photo = new Photo();
        $photo->_attributes = $params;
        if(!empty($photo->id)){
            $photo->setIsNewRecord(false);
        }
        $res = $photo->save();
        return $res;
    }

	public function saveOrHashs($params){
		foreach($params['hashs'] as $key=>$val){
			if(!empty($val)){
				$param = array();
				$param['sort_id'] = $params['sort_id'];
				$param['hash'] = $val;
				$res = $this->saveOrUpdate($param);
				if(!$res)
					return false;
			}
		}
		return true;
	}

    public function getPhoto($id){
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('id'=>$id));
        return Photo::model()->find($criteria);
    }

    public function getPhotos($pageSize = 12){
        $criteria = new CDbCriteria();
        $criteria->order = 'id desc';
        $criteria->addColumnCondition(array('is_deleted'=>0));

        $count = Photo::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);

        $photos = Photo::model()->findAll($criteria);
        return compact('photos', 'pages');
    }

    public function remove($id){
        $photo = $this->getPhoto($id);
        $res = array();
        if(!empty($photo)){
            $res = $photo->delete();
        }
        return $res;
    }
}