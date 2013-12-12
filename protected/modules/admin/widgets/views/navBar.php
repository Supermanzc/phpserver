<div class="navbar navbar-default navbar-fixed-top">
    <div class="col-lg-12">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo Yii::app()->name?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/manager/logout">登出</a></li>
                        <li><a href="/admin/manager/edit/id/<?php echo (Yii::app()->user->hasState('id'))?Yii::app()->user->getState('id'):'' ?>">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><?php echo Yii::app()->user->name?></a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>