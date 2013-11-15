<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle ?></title>
</head>

<body>
<?php $this->Widget('application.modules.admin.widgets.NavBarWidget'); ?>

<div class="col-lg-12">

    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="sidebar-nav well">
                <?php $this->widget('application.modules.admin.widgets.NavListWidget'); ?>
            </div><!--/.well -->
        </div><!--/span-->

        <div class="col-xs-12 col-sm-10">
            <?php $this->widget('application.modules.admin.widgets.AlertMsgWidget') ?>
            <?php echo $content; ?>
        </div><!--/span-->

    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2013</p>
    </footer>

</div><!--/.container-->

</body>
</html>
