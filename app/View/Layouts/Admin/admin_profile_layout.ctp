<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->css('/bootstrap/css/bootstrap.min.css');
	echo $this->Html->css('/jquery/css/jquery-ui.css');
	echo $this->Html->css('/font-awesome/css/font-awesome.css');
	echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
	echo $this->Html->css('stylesheet.css');
	echo $this->Html->css('custom.css');
	?>
	<?php
	echo $this->Html->script('/bootstrap/js/jquery.min.js');
	echo $this->Html->script('/bootstrap/js/bootstrap.min.js');
	echo $this->Html->script('/datatable/js/jquery.dataTables.min.js');
	echo $this->Html->script('/datatable/js/jquery.min.js');
	echo $this->Html->script('/datatable/js/jquery-ui.min.js');
	echo $this->Html->script('/jquery/js/jquery-1.10.2.js');
	echo $this->Html->script('/jquery/js/jquery-ui.js');
	echo $this->Html->script('/captcha/js/gen_validatorv31.js');
	echo $this->Html->script('custom.js');
	?>
	<?php echo $this->fetch('script'); ?>
</head>
<body class="ad-log-bg-color">
<div class="container-fluid" style="color: #ffffff;">
	<div class="row">
		<?php echo $this->element('../Admins/elements/top-bar'); ?>
	</div>
	<div>
		<?php echo $this->Session->flash(); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php echo $this->element('Admin/left_part'); ?>
				</div>
				<div class="col-md-9">
					<?php echo $this->fetch('content'); ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="row" style="background: darkgrey; padding: 8px;margin-top: 20px">
		<?php echo $this->element('bread_footer'); ?>
	</div>
	<div class="row">
		<?php echo $this->element('Admin/admin_footer'); ?>
	</div>
</div>
</body>
</html>
