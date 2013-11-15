<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'photosort'))?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="col-lg-1">编号</th>
            <th>分类名称</th>
            <th>分类描述</th>
            <th class="col-md-2">添加时间</th>
            <th class="col-md-2">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($photo_sorts)) { ?>
            <?php foreach($photo_sorts as $key => $val) { ?>
                <tr>
                    <td><?php echo $val['id']?></td>
                    <td><?php echo $val['sort_name']?></td>
                    <td><?php echo $val['sort_desc']?></td>
                    <td><?php echo date('y-m-d H-i-s', $val['ctime']) ?></td>
                    <td>
                        <span class="glyphicon glyphicon-edit"><a href="/admin/photosort/edit/id/<?php echo $val['id']?>">修改</a></span>
                        <span class="glyphicon glyphicon-remove-circle"><a href="/admin/photosort/remove/id/<?php echo $val['id']?>" onclick="return confirm('你确定删除吗')">删除</a></span>
                    </td>
                </tr>
            <?php } }?>
        </tbody>
    </table>

<?php  $this->widget('application.modules.admin.widgets.BLinkPager', array('pages'=>$pages));?>