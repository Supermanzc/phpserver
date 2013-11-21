<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-21
 * Time: 上午9:42
 */
class DownloadAction extends CAction{

	public function run(){
		$request = Yii::app()->getRequest();
		$request->sendFile('test.txt', '1224455454'); //写入文件test.txt,然后在下载
//		http://phpserver/statics/upload/source/0a/0a2da986d6a4dcd466b05b5c7c790e96

	}
}