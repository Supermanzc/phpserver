<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'photosort'))?>
<form action="/admin/photosort/add" class="form-horizontal well" method="post" role="form">
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">相册名称</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="photosort[sort_name]" placeholder="相册名称">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">相册描述</label>
        <div class="col-lg-3">
            <textarea class="form-control" name="photosort[sort_desc]" style="height: 120px;"></textarea>
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
        $("input[name='photosort[sort_name]']").blur(function(){
            $(this).validate(['required']);
        });
        $('button[type=submit]').click(function(){
            validateResult = true;
            $("input[name='photosort[sort_name]']").validate(['required']);
            return validateResult;
        });
    });
</script>