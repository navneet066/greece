<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->css('/bootstrap/css/bootstrap.min.css');
	echo $this->Html->css('/jquery/css/jquery-ui.css');
	echo $this->Html->css('custom.css');
	?>
	<?php
	echo $this->Html->script('/bootstrap/js/jquery.min.js');
	echo $this->Html->script('/bootstrap/js/bootstrap.min.js');
	echo $this->Html->script('/jquery/js/jquery-1.10.2.js');
	echo $this->Html->script('/jquery/js/jquery-ui.js');
	echo $this->Html->script('/captcha/js/gen_validatorv31.js');
	echo $this->Html->script('custom.js');
	?>
	<?php echo $this->fetch('script');?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<?php echo $this->element('header'); ?>
	</div>
	<div>
		<?php echo $this->Session->flash(); ?>
		<div class="container" style="border: 2px solid #000">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<div class="row" style="background: darkgrey">
		<?php echo $this->element('bread_footer');?>
	</div>
	<div class="row">
		<?php echo $this->element('footer'); ?>
	</div>
</div>
</body>
</html>
