<?php

class FilesController extends CController
{
	public function actionIndex()
	{
		if(empty($_GET['name']))
			return false;
		$hash = $_GET['name'];
		$files = new FilesComponent();
		$files->download($hash);
	}

	public function actionImage()
	{
		if(empty($_GET['name']))
			return false;

		$hash	= null;
		$cut	= false;
		$width	= 0;
		$height	= 0;

		$params = explode('.',$_GET['name']);
		if(count($params)!=2)
			return false;
		$ext = strtolower($params[1]);

		$params = explode('_',$params[0]);
		if(count($params)==1)
		{
			$hash = $params[0];
		}else{
			//带参数 解析参数
			foreach($params as $value)
			{
				$vals = explode('-',$value);
				if(count($vals)==1)
				{
					if($vals[0] == 'c')
						$cut = true;
					elseif(strlen($vals[0])==32)
						$hash = $vals[0];
				}elseif(count($vals)==2){
					if($vals[0] == 'w')
						$width = $vals[1];
					if($vals[0] == 'h')
						$height = $vals[1];
				}
			}
		}
		
		$images = new FilesComponent();

		// print_r( $images->getImagePath($hash));
		// die();
		$images->renderImage($hash,$ext,$width,$height,$cut);
	}


	public function actionUpload()
	{
		//echo "<pre>";
		$bhv = new FilesComponent;
		$img = $bhv->upload('file');
		if(!$img){
			$result['error'] = $bhv->error;
		}else{
			$result = $img;
		}
		echo CJSON::encode($result);
	}
	
	//预上传
	public function actionPreUpload()
	{

	}

	public function actionEditorUpload()
	{
		$bhv = new FilesComponent;
		$img = $bhv->upload('filedata');
		if(!$img){
			$result = array(
				'err'=>$bhv->error,
				'msg'=>''
			);
		}else{
			$result = array(
				'err'=>'',
				'msg'=>'/images/'.$img['hash'].'.jpg'
			);
		}
		echo CJSON::encode($result);
	}


// We'll be outputting a PDF
//header('Content-type: application/pdf');
// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="downloaded.pdf"');


//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
//header("Location: http://$host$uri/$extra");


}


