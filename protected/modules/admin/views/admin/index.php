<?php $this->widget('application.modules.admin.widgets.NavTabWidget', array('index'=>'admin')) ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="col-lg-1">编号</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>权限</th>
            <th class="col-md-2">添加时间</th>
	        <th class="col-md-2">登录时间</th>
            <th class="col-md-2">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($result)) { ?>
            <?php foreach($result as $key => $val) { ?>
                <tr>
                    <td><?php echo $val['admin']['id']?></td>
                    <td><?php echo $val['admin']['username']?></td>
                    <td><?php echo $val['admin']['email']?></td>
                    <td><?php echo $val['role']['role_name']?></td>
                    <td><?php echo date('y-m-d H:i:s', $val['admin']['ctime']) ?></td>
	                <td><?php echo date('y-m-d H:i:s', $val['admin']['ltime']) ?></td>
                    <td>
                        <span class="glyphicon glyphicon-edit"><a href="/admin/admin/edit/id/<?php echo $val['admin']['id']?>">修改</a></span>
                        <span class="glyphicon glyphicon-remove-circle"><a href="/admin/admin/remove/id/<?php echo $val['admin']['id']?>" onclick="return confirm('你确定删除吗')">删除</a></span>
                    </td>
                </tr>
            <?php } }?>
        </tbody>
    </table>

<?php  $this->widget('application.modules.admin.widgets.BLinkPager', array('pages'=>$pages));?>