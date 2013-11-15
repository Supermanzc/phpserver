<form action="/admin/manager/edit/id/<?php echo $admin['id']?>" class="form-horizontal well" method="post" admin="form">
    <input type="hidden" name="admin[id]" value="<?php echo $admin['id']?>" />
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">输入旧密码</label>
        <div class="col-lg-3">
            <input class="form-control"  type="password" name="admin[old]" placeholder="旧密码"  />
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">新密码</label>
        <div class="col-lg-3">
            <input class="form-control"  type="password" name="admin[password]" placeholder="新密码"/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">再次输入</label>
        <div class="col-lg-3">
            <input class="form-control" type="password" name="admin[replypw]" placeholder="重新输入密码"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">修改</button>
        </div>
    </div>
</form>