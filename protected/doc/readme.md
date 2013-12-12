/**
1.提示消息说明
showAlert($alert,$title,$url);
alert:提示类型有('error'=>错误, 'warning'=>警告, 'success'=>成功);
title:提示内容
url:跳转地址

2.清空数据表中的数据，让id 自动增长
TRUNCATE TABLE SYSTEM_RULE;

3.关于图片上传
config/main.php 修改 urlManager

'rules'=>array(
//    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
      'images/<name>'=>'files/image',
      'download/<name>'=>'files/index',
),

注意：注释掉前面3条;

使用说明:

文件相关

	上传文件：

		$bhv = new FilesComponent;
		$result = $bhv->upload('upload_input_name');
		if(!$result)
			echo $bhv->error;	//出错原因

		$result：
			失败：
				false
			成功：
				Array
				(
					[id] => 27
					[hash] => 2d5d004debb7cd7e12a464de8b112d55
					[name] => abc.jpg
					[size] => 90058
					[type] => image/jpeg
					[extension] => jpg
				)

	下载文件：
		url:/download/$hash

图片模块相关

	允许格式：jpg、jpeg、jpe、gif、png

	访问原图：
		url:/images/$hash.jpg

	限制单边高或宽,等比例输出图片:
		url:/images/$hash_w-300.jpg	//限制宽度
		url:/images/$hash_h-300.jpg //限制高度

	同时限制高和宽,等比例切图或补图:
		url:/images/$hash_w-300_h-300.jpg	//等比缩放，空白部分填补白色。
		url:/images/$hash_h-300_h-300_c.jpg //等比缩放，图片从中间切出。

3.关于git的上传到github的使用技巧
#git init //初始化
#git add .
#git commit -m "zc"
#git remote add origin git@github.com:Supermanzc/phpserver.git  //这个是与github建立连接
#git pull origin master //从github pull下来
#git push -u origin master //从github push 下来

4.公有权限
1).manager 	//后台用户登陆
login	用户登陆
logout	用户登出
edit	修改密码


5.私有权限
1).admin	//后台用户管理
index	用户列表
add 	用户添加
edit	用户修改
remove	用户删除


2).photosort	//图片分类管理
index	图片分类列表
add 	图片分类添加
edit	图片分类修改
remove	图片分类删除

3).photo 	//图片管理
index	图片分类列表
add 	图片添加
list	分类图片下列表
remove	图片删除

4).rule 	//权限管理
index	权限列表
add 	权限添加
edit	权限修改
remove	权限删除

5.role 		//角色管理
index	角色列表
add 	角色添加
edit	角色修改
remove	角色删除

6.