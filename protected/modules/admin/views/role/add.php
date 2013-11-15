<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'role'))?>
<form action="/admin/role/add" class="form-horizontal well" method="post" role="form">
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">角色名称</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="role[role_name]" placeholder="角色名称">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">角色说明</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="role[role_desc]" placeholder="角色名称">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">角色说明</label>
        <div class="col-lg-10">
            <?php if(!empty($rules)) {?>
            <?php foreach($rules as $key=>$val) { ?>
                    <label class="col-lg-3 checkbox">
                        <input type="checkbox" name="role[rule_ids][<?php echo $key ?>]" value="<?php echo $val['id']?>" />
                        <?php echo $val['rule_name']?>
                    </label>
            <?php } } ?>
            <label><input type="checkbox" id="checkbox"/> 全选</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">添加</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function(){
        $('input#checkbox').click(function(){
            $('.checkbox input:checkbox').each(function(){
                this.checked = !this.checked;
            })
        });
    })
</script>