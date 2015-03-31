<?php
$url = array("controller" => "users", "action" => "forgot_password", "plugin" => null);
echo $this->Form->create("User", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
	"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
<div style="border-bottom: groove; margin-bottom:20px; margin-top: 30px">
	<strong>Forgot Password</strong>
</div>
<div class="col-md-offset-2">
	<div class="form-group">
		<label class="col-sm-2 control-label">Email(*)</label>

		<div class="col-sm-5">
			<?php echo $this->Form->input("User.email", array("class" => "form-control",
				"type" => "email", "placeholder" => "Email Address")); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		<div class="col-md-5">
			<?php echo $this->Form->button('Submit', array(
				'class' => ' btn btn-default',
				'escape' => false)); ?>
		</div>
	</div>
</div>
