<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'photo'))?>
<link href="/statics/jquery-lightbox/css/lightbox.css" rel="stylesheet" type="text/css" />
<form action="/admin/photo/remove/sort_id/<?php echo $photo_sort['id']?>" method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-1 control-label">全选<input type="checkbox" id="checkbox" /></label>
		<button type="submit" onclick="return confirm('你确定全部删除吗')" class="btn btn-default">删除</button>
	</div>
	<div class="image-row">
		<?php if(!empty($photo_sort['photos'])) {?>
		<?php foreach($photo_sort['photos'] as $key=>$val) {?>
		<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 checkbox">
			<input type="checkbox" class="checkbox" name="ids[]" value="<?php echo $val['id']?>"/>
			<a href="/images/<?php echo $val['hash'] . '.jpg' ?>" data-lightbox="images-fush" class="example-image-link">
				<img class="example-image" src="/images/<?php echo $val['hash'] . '_w-172_h-172_c.jpg' ?>" alt="thumb-1" width="150" height="150"/>
			</a>
		</div>
		<?php } }?>
	</div>

</form>

<script type="text/javascript" src="/statics/jquery-lightbox/js/lightbox-2.6.min.js" ></script>
<script type="text/javascript">
	$(function(){
		$('input#checkbox').click(function(){
			$('.checkbox input:checkbox').each(function(){
				this.checked = !this.checked;
			})
		});
	})
</script>