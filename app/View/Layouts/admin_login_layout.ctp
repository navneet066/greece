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
<body class="ad-log-bg-color">
<div class="container-fluid">
	<div>
		<?php echo $this->Session->flash(); ?>
		<div class="container">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</div>
</body>
</html>
