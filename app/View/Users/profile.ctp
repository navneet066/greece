<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
<div>
	<?php
	$url = array("controller" => "users", "action" => "profile", "plugin" => null);
	echo $this->Form->create("User", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
		"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<strong>Profile</strong>
	</div>
	<div class="">
		<div class="form-group">
			<label for="prefix" class="col-sm-2 control-label">Prefix</label>

			<div class="col-sm-7">
				<?php
				echo $this->Form->input('User.prefix', array(
					'type' => 'select',
					'options' => array(
						'Mr' => 'Mr',
						'Mrs' => 'Mrs'),
					'empty' => '(Choose Prefix)',
					"class" => 'form-control'
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="first_name" class="col-sm-2 control-label">First name</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.first_name", array("class" => "form-control",
					"placeholder" => "First Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.last_name", array("class" => "form-control",
					"placeholder" => "Last Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.username", array("class" => "form-control",
					"placeholder" => "Username", "type" => "text", "readonly")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="email_address" class="col-sm-2 control-label">Email</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.email", array("class" => "form-control",
					"placeholder" => "email@email.com", "type" => "email", "readonly")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="user_alias" class="col-sm-2 control-label">Alias</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.alias", array("class" => "form-control",
					"placeholder" => "Alias", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="external_number" class="col-sm-2 control-label">External Number</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.external_number", array("class" => "form-control",
					"placeholder" => "External Number", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="mobile_number" class="col-sm-2 control-label">Mobile Phone</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.mobile_number", array("class" => "form-control",
					"placeholder" => "Mobile Phone", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="skype_id" class="col-sm-2 control-label">Skype Id</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.skype_id", array("class" => "form-control",
					"placeholder" => "Skype Id", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="linkedin_id" class="col-sm-2 control-label">Linkedin Id</label>

			<div class="col-sm-7">
				<?php echo $this->Form->input("User.linkedin_id", array("class" => "form-control",
					"placeholder" => "Linkedin Id", "type" => "text")); ?>
			</div>
		</div>
	</div>
</div>
<div class="form-group" style="margin-top: 20px;">
	<div class="col-sm-2"></div>
	<div class="col-md-7">
		<?php echo $this->Form->button('Update', array(
			'class' => 'btn btn-success pull-right',
			'escape' => false)); ?>
	</div>
	<div class="clearfix"></div>
</div>
<?php echo $this->Form->end(); ?>
