<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
<div>
	<?php
	$url = array("controller" => "employees", "action" => "add_employee", "plugin" => null);
	echo $this->Form->create("Employee", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
		"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<strong>Employee Information</strong>
	</div>
	<div>
		<div class="form-group">
			<label for="prefix" class="col-sm-2 control-label">Prefix(*)</label>

			<div class="col-sm-6">
				<?php
				echo $this->Form->input('Employee.prefix', array(
					'type' => 'select',
					'options' => array(
						'Mr' => 'Mr',
						'Mrs' => 'Mrs'
					),
					'empty' => '(Choose Prefix)',
					"class" => 'form-control'
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="first_name" class="col-sm-2 control-label">First name(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.first_name", array("class" => "form-control",
					"placeholder" => "First Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.last_name", array("class" => "form-control",
					"placeholder" => "Last Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.username", array("class" => "form-control",
					"placeholder" => "Username", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.password", array("class" => "form-control",
					"type" => "password", "placeholder" => 'Password')); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="email_address" class="col-sm-2 control-label">Email(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.email", array("class" => "form-control",
					"placeholder" => "email@email.com", "type" => "email")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-sm-2 control-label">Status</label>

			<div class="col-sm-6">
				<?php
				echo $this->Form->input('Employee.status', array(
					'type' => 'select',
					'options' => array(
						'Active' => 'Active',
						'Inactive' => 'Inactive'
					),
					"class" => 'form-control'
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="alias" class="col-sm-2 control-label">Opening Email</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.opening_mails", array("class" => "form-control",
					"placeholder" => "Opening Mails", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="alias" class="col-sm-2 control-label">Comments</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.comments", array("class" => "form-control",
					"placeholder" => "Comments", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="alias" class="col-sm-2 control-label">Alias</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.alias", array("class" => "form-control",
					"placeholder" => "Alias", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="role" class="col-sm-2 control-label">Role</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.role", array("class" => "form-control",
					"placeholder" => "Change Role", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="external_number" class="col-sm-2 control-label">External Number</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.external_number", array("class" => "form-control",
					"placeholder" => "External Number", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="mobile_number" class="col-sm-2 control-label">Mobile Phone</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.mobile_number", array("class" => "form-control",
					"placeholder" => "Mobile Phone", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="skype_id" class="col-sm-2 control-label">Skype Id</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.skype_id", array("class" => "form-control",
					"placeholder" => "Skype Id", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="linkedin_id" class="col-sm-2 control-label">Linkedin Id</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Employee.linkedin_id", array("class" => "form-control",
					"placeholder" => "Linkedin Id", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>

			<div class="col-md-6">
				<div class="btn-group pull-right" role="group">
					<?php echo $this->Form->button('RESET', array(
						'class' => 'btn btn-default',
						'type' => 'reset',
						'escape' => false)); ?>
					<?php echo $this->Form->button('SUBMIT', array(
						'class' => 'btn btn-success',
						'type' => 'submit',
						'escape' => false)); ?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
