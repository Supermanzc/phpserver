<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-21
 * Time: 上午10:05
 */
class QuoteController extends CController{

	private $quotes = array(
		array('你要相信世界上每一个人都精明，要令人信服并喜欢和你交往,那才最重要。', '李嘉诚'),
		array('该放下时且放下，你宽容别人，其实是给自己留下来一片海阔天空。', '于丹'),
		array('免费，是世界上最贵的东西。', '马云'),
		array('没有捕捉不到的猎物，就看你有没有野心去捕;没有完成不了的事情，就看你有没有野心去做。', '狼图腾'),
		array('君志所向，一往无前，愈挫愈勇，再接再厉。', '孙中山'),
	);

	private function getRandomQuto(){
		return $this->quotes[array_rand($this->quotes, 1)];
	}

	public function actionIndex(){
		$this->render('index', array('quote'=>$this->getRandomQuto()));
	}

	public function actionGetQuote(){
		$this->renderPartial('_quote', array('quote'=>$this->getRandomQuto()));
	}
}