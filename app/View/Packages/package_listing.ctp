<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
	<div>
	<?php
	$url = array("controller" => "packages", "action" => "package_listing");
	echo $this->Form->create("Package", array("url" => $url, "class" => "form-horizontal", "type" => "file",
		"role" => "form", 'novalidate' => true, 'inputDefaults' => array('label' => false, 'div' => false)));?>
