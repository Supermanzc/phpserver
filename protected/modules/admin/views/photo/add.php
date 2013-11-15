<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'photo'))?>
<form action="/admin/photo/add" class="form-horizontal well" method="post">
	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">选择相册</label>
		<div class="col-lg-3">
			<select name="photo[sort_id]" class="form-control">
			<?php if(!empty($photo_sorts)) { ?>
				<?php foreach($photo_sorts as $key=>$val ) { ?>
					<option value="<?php echo $val['id'] ?>"><?php echo $val['sort_name']?></option>
				<?php }?>
			<?php }?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail1" class="col-lg-2 control-label">图片上传</label>
		<div class="col-lg-10">
			<?php $this->widget('application.modules.admin.widgets.ImagesUploadWidget') ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-primary">添加</button>
		</div>
	</div>
</form>