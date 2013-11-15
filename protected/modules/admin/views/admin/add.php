<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'admin'))?>
<form action="/admin/admin/add" class="form-horizontal well" method="post" admin="form">
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">用户名称</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="admin[username]" placeholder="用户名称">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">邮箱</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="admin[email]" placeholder="登录邮箱">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">用户密码</label>
        <div class="col-lg-3">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" id="checkbox"/>
                </span>
                <input class="form-control"  type="password" name="admin[password]" placeholder="用户密码">
                <input class="form-control"  type="text" name="admin[password]" placeholder="用户密码" disabled="true" style="display: none">
            </div><!-- /input-group -->
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">角色选择</label>
        <div class="col-lg-3">
            <select name="admin[role_id]" class="form-control">
            <?php if(!empty($roles)) {?>
            <?php foreach($roles as $key=>$val) { ?>
                    <option value="<?php echo $val['id']?>"><?php echo $val['role_name']?></option>
            <?php } } ?>
            </select>
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
            var password_m = $(this).parent('span').siblings("input[type='password']");
            var password_n = $(this).parent('span').siblings("input[type='text']");
            if($(this).attr('checked')){
                password_n.show().val(password_m.val()).attr('disabled', false);
                password_m.hide().val('').attr('disabled', true);
            }else{
                password_m.show().val(password_n.val()).attr('disabled', false);
                password_n.hide().val('').attr('disabled', true);
            }
        });
    })
</script>