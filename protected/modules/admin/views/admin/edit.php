<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'admin'))?>
<form action="/admin/admin/edit" class="form-horizontal well" method="post" admin="form">
    <input type="hidden" name="admin[id]" value="<?php echo $admin['id']?>" />
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">用户名</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="admin[username]" placeholder="用户名" value="<?php echo $admin['username']?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">邮箱</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="admin[email]" placeholder="登录邮箱" value="<?php echo $admin['email']?>" disabled="disabled"/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">密码修改</label>
        <div class="col-lg-3">
            <a id="edit" href="#"  class="btn btn-danger">修改</a>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">角色说明</label>
        <div class="col-lg-3">
            <select name="admin[role_id]" class="form-control">
                <?php if(!empty($roles)) {?>
                    <?php foreach($roles as $key=>$val) { ?>
                        <option value="<?php echo $val['id']?>" <?php echo ($val['id'] == $admin['role_id'])?'selected':''?>><?php echo $val['role_name']?></option>
                    <?php } } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">修改</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function(){
        $('a#edit').click(function(){
            var config = confirm('你确定修改吗');
            if(config){
                $(this).parent('div').html("<input class='form-control'  type='password' name='admin[password]' placeholder='用户密码'> ");
            }
        })
    })
</script>