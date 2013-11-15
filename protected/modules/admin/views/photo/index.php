<?php $this->widget('application.modules.admin.widgets.NavTabWidget',array('index'=>'photo'))?>
<link href="/statics/css/imageindex.css" rel="stylesheet" type="text/css" />
<div class="mod mod-picList">
	<div id="piclist" class="piclist">
		<?php if(!empty($photo_sorts)) { ?>
		<?php foreach($photo_sorts as $key=>$val) {?>
		<div id="al_cont_261645253" onmouseover="$(this).addClass('over');" onmouseout="$(this).removeClass('over');" class="item albumpage-1" style="">
			<div class="cont">
				<a href="/admin/photo/list/sort_id/<?php echo $val['id']?>" class="folder">
					<img src="<?php echo (count($val['photos']) == 0)? '/statics/images/image.jpg': '/images/' . $val['photos'][0]['hash'].'_w-172_h-172_c.jpg'  ?>" alt="">
				</a>
				<ul class="info">
					<li><a href="/admin/photo/list/sort_id/<?php echo $val['id']?>" class="name"><?php echo $val->sort_name?></a><span class="num">(<?php echo count($val->photos) ?>)</span></li>
					<li class="txt-info">创建于<?php echo date('Y-m-d', $val->ctime) ?> <b class="p-ico p-ico-pvt"></b><!--<span class="txt-info">私人</span>--></li>
					<li class="txt-link"></li>
				</ul>
			</div>
		</div>
		<?php  } }?>
	</div>
</div>

<?php  $this->widget('application.modules.admin.widgets.BLinkPager', array('pages'=>$pages));?>