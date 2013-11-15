<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>你来我往管理</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/statics/css/signin.css" />
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'htmlOptions'=>array(
            'class'=>'form-signin',
        ),
        /* 'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ) */
    )) ?>
    <h2 class="form-signin-heading">管理员登录</h2>
    <?php $this->widget('application.modules.admin.widgets.AlertMsgWidget') ?>
    <?php echo $form->textField($user,'username',array('class'=>'form-control','placeholder'=>'Email','autofocus'))?>
    <font color=#cd5c5c><?php echo $form->error($user,'username')?></font>
    <?php echo $form->passwordField($user,'password',array('class'=>'form-control','placeholder'=>'Password'))?>
    <font color=#cd5c5c><?php echo $form->error($user,'password')?></font>
    <label class="checkbox">
        <?php echo $form->checkBox($user,'rememberMe',array('value'=>'remember-me')); ?> 记住我当前状态
    </label>
    <?php echo CHtml::submitButton('登录',array('class'=>'btn btn-lg btn-primary btn-block'));?>
    <?php $this->endWidget();?>

</div>
</body>
</html>

