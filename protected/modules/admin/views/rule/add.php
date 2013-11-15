<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'rule'))?>
<form action="/admin/rule/add" class="form-horizontal well" method="post" role="form">
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">权限名称</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[rule_name]" placeholder="权限名称">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">权限描述</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[rule_desc]" placeholder="权限描述">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Controller</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[controller_id]" placeholder="controller">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Action</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="rule[action_id]" placeholder="action">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">添加</button>
        </div>
    </div>
</form>