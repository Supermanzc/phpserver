<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-7
 * Time: 下午2:25
 */
class ImagesUploadWidget extends CWidget{
	public $cover;
	public $images;
	public $viewer = 0;
	public function init()
	{
		if(!empty($this->images))
		{
			$images = '';
			foreach($this->images as $image)
			{
				if(empty($images))
					$images = $image;
				else
					$images = $images.','.$image;
			}
			$this->images = $images;
		}

	}

	public function run(){
		$this->render("imagesUpload");
	}
}