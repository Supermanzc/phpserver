<?php if(!empty($message)){ ?>
    <div class="alert <?php echo ($message['alert'] == 'success')?'alert-success' : (($message['alert'] == 'warning') ? 'alert-warning':'alert-danger') ?> fade in">
        <strong><?php echo $message['msg']?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    </div>
<?php }?>