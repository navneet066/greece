<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
	<?php
	echo $this->Html->css('/AdminTheme/assets/css/bootstrap.css');
	echo $this->Html->css('/AdminTheme/assets/css/font-awesome.css');
	echo $this->Html->css('/jquery/css/jquery-ui.css');
	echo $this->Html->css('/AdminTheme/assets/js/morris/morris-0.4.3.min.css');
	echo $this->Html->css('/AdminTheme/assets/css/custom-styles.css');
	echo $this->Html->css('/AdminTheme/assets/js/dataTables/dataTables.bootstrap.css');
	echo $this->Html->css('custom.css');
	?>
	<?php
	echo $this->Html->script('/AdminTheme/assets/js/jquery-1.10.2.js');
	echo $this->Html->script('/jquery/js/jquery-ui.js');
	echo $this->Html->script('/AdminTheme/assets/js/bootstrap.min.js');
	echo $this->Html->script('/AdminTheme/assets/js/jquery.metisMenu.js');
	echo $this->Html->script('/AdminTheme/assets/js/morris/raphael-2.1.0.min.js');
	echo $this->Html->script('/AdminTheme/assets/js/morris/morris.js');
	echo $this->Html->script('/AdminTheme/assets/js/dataTables/jquery.dataTables.js');
	echo $this->Html->script('/AdminTheme/assets/js/dataTables/dataTables.bootstrap.js');
	?>
	<script>
		$(document).ready(function () {
			$('#engine_index').dataTable();
		});
		$(document).ready(function () {
			$('#employee_index').dataTable();
		});
		$(document).ready(function () {
			$('#package_index').dataTable();
		});
		$(document).ready(function(){
			$("#createFormok :input").prop("disabled", true);
		});
	</script>
	<?php echo $this->Html->script('custom.js');?>
	<?php echo $this->Html->script('/AdminTheme/assets/js/custom-scripts.js');?>
	<?php echo $this->Html->script('/AdminTheme/assets/js/custom.js');?>

</head>
<body class="ad-log-bg-color">
<div id="wrapper">
	<?php echo $this->element('../Admins/elements/top-bar'); ?>
	<?php echo $this->element('Admin/left_part'); ?>
	<div id="page-wrapper">
		<?php echo $this->Session->flash(); ?>
		<div class="row">
			<div id="page-inner">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
</div>
<div style="background: darkgrey;">
	<?php echo $this->element('bread_footer'); ?>
</div>
<div class="row">
	<?php echo $this->element('Admin/admin_footer'); ?>
</div>
</body>
</html>
