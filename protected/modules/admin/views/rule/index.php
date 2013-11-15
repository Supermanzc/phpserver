<?php $this->widget('application.modules.admin.widgets.NavTabWidget', array('index'=>'rule')) ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-lg-1">编号</th>
            <th>名称</th>
            <th>描述</th>
            <th>Controller</th>
            <th>Action</th>
            <th class="col-md-2">添加时间</th>
            <th class="col-md-2">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($rules)) { ?>
        <?php foreach($rules as $key => $val) { ?>
        <tr>
            <td><?php echo $val['id']?></td>
            <td><?php echo $val['rule_name']?></td>
            <td><?php echo $val['rule_desc']?></td>
            <td><?php echo $val['controller_id']?></td>
            <td><?php echo $val['action_id']?></td>
            <td><?php echo date('y-m-d H-i-s', $val['ctime']) ?></td>
            <td>
                <span class="glyphicon glyphicon-edit"><a href="/admin/rule/edit/id/<?php echo $val['id']?>">修改</a></span>
                <span class="glyphicon glyphicon-remove-circle"><a href="/admin/rule/remove/id/<?php echo $val['id']?>" onclick="return confirm('你确定删除吗')">删除</a></span>
            </td>
        </tr>
        <?php } }?>
    </tbody>
</table>

<?php  $this->widget('application.modules.admin.widgets.BLinkPager', array('pages'=>$pages));?>