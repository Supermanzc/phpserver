<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'photosort'))?>
<form action="/admin/photosort/edit" class="form-horizontal well" method="post" role="form">
    <input type="hidden" name="photosort[id]" value="<?php echo $photo_sort['id'] ?>"/>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">相册名称</label>
        <div class="col-lg-3">
            <input class="form-control"  type="text" name="photosort[sort_name]" placeholder="相册名称" value="<?php echo $photo_sort['sort_name']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">相册描述</label>
        <div class="col-lg-3">
            <textarea name="photosort[sort_desc]" class="form-control" style="height: 120px;"><?php echo $photo_sort['sort_desc']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">修改</button>
        </div>
    </div>
</form>