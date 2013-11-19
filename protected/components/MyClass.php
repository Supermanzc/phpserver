<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-19
 * Time: 下午1:49
 */
class MyClass extends CComponent{

	private $property;
	private $read = 'read only property';
	private $write = 'write only property';

	public function setProperty($property){
		$this->property = $property;
	}

	public function getProperty(){
		return $this->property;
	}

	public function getRead(){
		return $this->read;
	}

	public function setWrite($write){
		$this->write = $write;
	}
}