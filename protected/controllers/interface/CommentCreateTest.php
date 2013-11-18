<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-11-18
 * Time: 下午2:25
 */
class CommentCreateTest extends CAction{
	public $base_path = 'http://ncserver.dev';

	public function run(){

		$url = $this->base_path . '/api/comment/list';
		$data = array('article_id'=>65, 'page'=>1,'client_id'=>111);
		$method = 'GET';

		$ch = curl_init();
		//curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		//curl_setopt($ch, CURLOPT_USERAGENT, '');
		//curl_setopt($ch, CURLOPT_ENCODING, '');
		//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		//curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		// $proxy = '127.0.0.1:8888';
		// $proxyauth = 'user:password';
		// curl_setopt($ch, CURLOPT_PROXY, null);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
		// curl_setopt($ch, CURLOPT_PROXYPORT, 8080);
		// curl_setopt($ch, CURLOPT_PROXY, $proxy);
		// curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
		// curl_setopt($ch, CURLOPT_PROXY, '66.96.200.39:80');
		if ($method == 'POST') {
			curl_setopt($ch, CURLOPT_POST, true);
			if (!empty($data)) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
		} else if ($method == 'GET') {
			curl_setopt($ch, CURLOPT_POST, false);
			$url = $url . '?' . http_build_query($data, '', '&');
			//echo $url; die();
		} else {
			//custom method
		}

		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		var_dump($response);
		if (curl_errno($ch) != CURLE_OK || $http_code != 200) {
			$response = json_encode(array('error_code'=>9, 'error_msg'=>'请求超时'));
		}
		curl_close($ch);
	}
}