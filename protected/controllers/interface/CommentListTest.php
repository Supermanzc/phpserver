<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-18
 * Time: 上午10:51
 */
class CommentListTest extends CAction{
	public $base_path = 'http://ncserver.dev';

	public function run(){
		//通过客户端上传的数据
		$url = $this->base_path . '/api/comment/list';
		$data = array('article_id'=>64, 'page'=>1,'client_id'=>111);
		$method = 'get';

		//header('content-type:text/html; charset=utf-8');
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); //设置返回http响应结果
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false); //设置无头文件
		if($method == 'post' || $method == 'POST'){
			curl_setopt($ch, CURLOPT_POST, true);
			if(!empty($data))
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}else if($method == 'get' || $method == 'GET'){
			$url = $url . '?' . http_build_query($data, '', '&');
			curl_setopt($ch, CURLOPT_POST, false);
		}
		//echo $url; die();
		curl_setopt($ch, CURLOPT_URL, $url);

		$result = curl_exec($ch);
		//var_dump($result);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		//print_r(json_decode($result));
		//var_dump($result);
		//var_dump($http_code);
		//$result = json_decode($result);
		//var_dump($result);
		//curl_close($ch);
	}
}