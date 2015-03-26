<?php
$url = array("controller" => "users", "action" => "reset_password", "plugin" => null);
echo $this->Form->create("User", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
	"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
<div style="border-bottom: groove; margin-bottom:20px; margin-top: 30px">
	<strong>Update Password</strong>
</div>
<div class="col-md-offset-2">
	<div class="form-group">
		<label for="company_name" class="col-sm-2 control-label">Old Password(*)</label>

		<div class="col-sm-5">
			<?php echo $this->Form->input("User.old_password", array("class" => "form-control",
				"type" => "password", "placeholder" => "Old Password")); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="jobFunction" class="col-sm-2 control-label">New Password(*)</label>

		<div class="col-sm-5">
			<?php echo $this->Form->input("User.new_password", array("class" => "form-control",
				"placeholder" => "New Password", "type" => "password")); ?>
		</div>
	</div>
	<div class="form-group">
		<label for="jobFunction" class="col-sm-2 control-label"></label>
		<div class="col-md-5">
			<?php echo $this->Form->button('Submit', array(
				'class' => ' btn btn-default fa fa-arrow-circle-o-right',
				'escape' => false)); ?>
		</div>
	</div>
</div>
