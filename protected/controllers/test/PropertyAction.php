<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-19
 * Time: 下午2:07
 */
class PropertyAction extends CAction{
	public function run(){
		$my_class = new MyClass();
		$my_class->property = 'xxx';
		//echo $my_class->property;

		/*$my_class->read = '只能读取，不能写入';
		echo $my_class->write; '只能写入，不能读取';*/


		
	}
}