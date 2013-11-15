<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'rule')); ?>
<form action="/admin/rule/edit" class="form-horizontal well" method="post" role="form">
    <input type="hidden" name="rule[id]" value="<?php echo $rule['id']?>"/>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">权限名称</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[rule_name]" placeholder="权限名称" value="<?php echo $rule['rule_name']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">权限描述</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[rule_desc]" placeholder="权限描述" value="<?php echo $rule['rule_desc']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Controller</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[controller_id]" placeholder="controller" value="<?php echo $rule['controller_id']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Action</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[action_id]" placeholder="action" value="<?php echo $rule['action_id']?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">修改</button>
        </div>
    </div>
</form>