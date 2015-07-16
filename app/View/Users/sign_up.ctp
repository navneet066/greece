<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
<div>
	<?php
	$url = array("controller" => "users", "action" => "sign_up", "plugin" => null);
	echo $this->Form->create("User", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
		"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
	<div style="border-bottom: groove; margin-bottom:20px; margin-top: 30px">
		<strong>Company Information</strong>
	</div>
	<div class="col-md-offset-2">
		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Company(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.company_name", array("class" => "form-control",
					"type" => "text", "placeholder" => "Company Name")); ?>
			</div>
		</div>
		<!--<div class="form-group">
        <label for="jobFunction" class="col-sm-2 control-label">Job Function(*)</label>
        <div class="col-sm-5">
            <?php /*echo $this->Form->input("Company.job_function", array("class" => "form-control",
            "placeholder" => "Job Function", "size" => "50", "id" => "jobFunction", "type" => "text")); */ ?>
        </div>
    </div>-->
		<div class="form-group">
			<label for="industry" class="col-sm-2 control-label">Industry(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input('Company.industry', array(
					'type' => 'text', "class" => 'form-control', 'id'=>'Industry'));	?>
			</div>
		</div>

		<div class="form-group">
			<label for="vat-id" class="col-sm-2 control-label">VAT ID(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.vat_id", array("class" => "form-control",
					"placeholder" => "Vat Id", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Company Email(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.email", array("class" => "form-control",
					"placeholder" => "company@email.com", "type" => "email")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Address(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.address", array("class" => "form-control",
					"placeholder" => "address", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">City(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.city", array("class" => "form-control",
					"placeholder" => "city", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Postal/Zip Code</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.postal_code", array("class" => "form-control",
					"placeholder" => "Postal/Zip code", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">State or Province(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("Company.state", array("class" => " form-control", "placeholder" => "State", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-sm-2 control-label">Country(*)</label>

			<div class="col-sm-5">
				<?php
				echo $this->Form->input('Company.country_id', array(
					'type' => 'select',
					'options' => $countries,
					'empty' => '(Choose Country)',
					"class" => 'form-control'
				));
				?>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-8">
			<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#companyInfo"
					aria-expanded="false" aria-controls="companyInfo">
				More Info
			</button>
		</div>
		<div class="collapse" id="companyInfo">
			<div class="col-md-offset-2">
				<div class="form-group">
					<label for="web_url" class="col-sm-2 control-label">Website(*)</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("Company.web_url", array("class" => "form-control",
							"placeholder" => "Web Url", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="telephone" class="col-sm-2 control-label">Telephone</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("Company.telephone", array("class" => "form-control",
							"placeholder" => "Company Telephone", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="fax" class="col-sm-2 control-label">Fax</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("Company.fax", array("class" => "form-control",
							"placeholder" => "Fax No", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="alias" class="col-sm-2 control-label">Alias</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("Company.alias", array("class" => "form-control",
							"placeholder" => "Alias", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="timezone" class="col-sm-2 control-label">Timezone</label>

					<div class="col-sm-5">
						<?php
						echo $this->Form->input('Company.timezone_id', array(
							'type' => 'select',
							'options' => $timezones,
							'empty' => '(Choose Timezone)',
							"class" => 'form-control'
						));
						?>
					</div>
				</div>
				<div class="form-group">
					<label for="working_hours" class="col-sm-2 control-label">Working Hours</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("Company.working_hour", array("class" => "form-control",
							"placeholder" => "Working Hour", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="cattools" class="col-sm-2 control-label">Cat Tools</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("Company.cat_tools", array("class" => "form-control", "id" => "catTools",
							"placeholder" => "Category Tools", "size" => "50", "type" => "text")); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<strong>Admin Information</strong>
	</div>
	<div class="col-md-offset-2">
		<div class="form-group">
			<label for="prefix" class="col-sm-2 control-label">Prefix(*)</label>

			<div class="col-sm-5">
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
			<label for="first_name" class="col-sm-2 control-label">First name(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("User.first_name", array("class" => "form-control",
					"placeholder" => "First Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("User.last_name", array("class" => "form-control",
					"placeholder" => "Last Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("User.username", array("class" => "form-control",
					"placeholder" => "Username", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("User.password", array("class" => "form-control", "type" => "password")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="email_address" class="col-sm-2 control-label">Email(*)</label>

			<div class="col-sm-5">
				<?php echo $this->Form->input("User.email", array("class" => "form-control",
					"placeholder" => "email@email.com", "type" => "email")); ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-8">
			<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#adminInfo"
					aria-expanded="false" aria-controls="adminInfo">
				More Info
			</button>
		</div>
		<div class="collapse" id="adminInfo">
			<div class="col-md-offset-2">
				<div class="form-group">
					<label for="user_alias" class="col-sm-2 control-label">Alias</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("User.alias", array("class" => "form-control",
							"placeholder" => "Alias", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="external_number" class="col-sm-2 control-label">External Number</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("User.external_number", array("class" => "form-control",
							"placeholder" => "External Number", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="mobile_number" class="col-sm-2 control-label">Mobile Phone</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("User.mobile_number", array("class" => "form-control",
							"placeholder" => "Mobile Phone", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="skype_id" class="col-sm-2 control-label">Skype Id</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("User.skype_id", array("class" => "form-control",
							"placeholder" => "Skype Id", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="linkedin_id" class="col-sm-2 control-label">Linkedin Id</label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("User.linked_id", array("class" => "form-control",
							"placeholder" => "Linkedin Id", "type" => "text")); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<strong>Security</strong>
	</div>
	<div class="col-md-offset-2">
		<div class="form-group">
			<div class="col-md-2">
				<label for="message">Please Enter the code shown here :</label>
			</div>
			<div class="col-md-6">
				<?php echo $this->Html->image(array('controller' => 'users', 'action' => 'get_captcha'),
					array('id' => 'captcha_image'));?>&nbsp;&nbsp;
				<?php $text = '<i class="fa fa-3x fa-refresh"></i>';
				echo $this->Html->link($text, array("controller"=>"users","action"=>" "),
					array("class" => "text-success", "escape"=> false,'id' => 'reload'));?>
				<?php echo $this->Form->input('User.captcha_code',array('type'=>'text',"style"=>"margin-top:20px;"));?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<div>
			<strong>Discount/Trail Code</strong>
		</div>
	</div>
	<h4>if you have any coupon code please enter</h4>

	<div class="col-md-offset-2">
		<div class="form-group">
			<label for="coupon" class="col-sm-2 control-label">Coupon</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="coupon" placeholder="coupon code">
			</div>
		</div>
	</div>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<div>
			<strong>Terms & Conditions</strong>
		</div>
	</div>
	<div style=" max-height: 150px;overflow-y: scroll; border: 2px solid darkgrey">
		<div class="container" style="max-width:98%;">
			<?php include('t&c.ctp'); ?>
		</div>
	</div>
	<div class="form-group" style="margin-top: 20px;">
		<div class="col-md-7">
			<div class="checkbox">
				<label>
					<?php echo $this->Form->input("User.is_agree", array('type' => "checkbox"));?>Agree with terms and conditions.
				</label>
			</div>
		</div>
		<div class="col-md-5">
			<?php echo $this->Form->button('Submit', array(
				'class' => ' btn btn-default pull-right',
				'escape' => false)); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
