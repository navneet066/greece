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
	echo $this->Form->create("Users", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
		"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
	<div style="border-bottom: groove; margin-bottom:20px; margin-top: 30px">
		<strong>Company Information</strong>
	</div>
	<div class="col-md-offset-2">
		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Company(*)</label>

			<div class="col-sm-5">
				<?php $this->Form->input("company_name", array("class" => " form-control", "type" => "text")); ?>
				<input type="text" class="form-control" name="company_name" placeholder="Company name">
			</div>
		</div>
		<div class="form-group">
			<label for="job_function" class="col-sm-2 control-label">Job Function(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="job_function" placeholder="Job Function">
			</div>
		</div>
		<div class="form-group">
			<label for="industry" class="col-sm-2 control-label">Industry(*)</label>

			<div class="col-sm-5">
				<select class="form-control" name="industry">
					<option>Select</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="web_url" class="col-sm-2 control-label">Website(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="web_url" placeholder="Website Url">
			</div>
		</div>
		<div class="form-group">
			<label for="website" class="col-sm-2 control-label">VAT ID(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="website" placeholder="For company within the EU">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Address(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="address" placeholder="address">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="col-sm-2 control-label">City(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="country" placeholder="city">
			</div>
		</div>
		<div class="form-group">
			<label for="postal_code" class="col-sm-2 control-label">Postal Code</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="postal_code" placeholder="pstal code">
			</div>
		</div>
		<div class="form-group">
			<label for="state" class="col-sm-2 control-label">State or Province(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="state" placeholder="state">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-sm-2 control-label">Country(*)</label>

			<div class="col-sm-5">
				<?php
				echo $this->Form->input('User.country_id', array(
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
					<label for="telephone" class="col-sm-2 control-label">Telephone</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="telephone" placeholder="company telephone">
					</div>
				</div>
				<div class="form-group">
					<label for="fax" class="col-sm-2 control-label">Fax</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="fax" placeholder="fax">
					</div>
				</div>
				<div class="form-group">
					<label for="alias" class="col-sm-2 control-label">Alias</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="fax" placeholder="alias">
					</div>
				</div>
				<div class="form-group">
					<label for="timezone" class="col-sm-2 control-label">Timezone</label>

					<div class="col-sm-5">
						<select class="form-control" name="timezone">
							<option>Select</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="working_hours" class="col-sm-2 control-label">Working Hours</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="working_hours" placeholder="working hours">
					</div>
				</div>
				<div class="form-group">
					<label for="cattools" class="col-sm-2 control-label">Cat Tools</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="cattools" placeholder="cat tools">
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
				<select class="form-control">
					<option>Mr.</option>
					<option>Mrs</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="first_name" class="col-sm-2 control-label">First name(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="first_name" placeholder="first name">
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name(*)</label>

			<div class="col-sm-5">
				<input type="text" class="form-control" name="last_name" placeholder="last name">
			</div>
		</div>
		<div class="form-group">
			<label for="email_address" class="col-sm-2 control-label">Email(*)</label>

			<div class="col-sm-5">
				<input type="email" class="form-control" name="email_address" placeholder="email@email.com">
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
						<input type="text" class="form-control" name="user_alias" placeholder="alias">
					</div>
				</div>
				<div class="form-group">
					<label for="contactteleexternal" class="col-sm-2 control-label">Contact External</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="contactteleexternal" placeholder="external telephone">
					</div>
				</div>
				<div class="form-group">
					<label for="contactmobilephone" class="col-sm-2 control-label">Contact External</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="contactmobilephone" placeholder="mobile number">
					</div>
				</div>
				<div class="form-group">
					<label for="skypeId" class="col-sm-2 control-label">Skype Id</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="skypeId" placeholder="skype id">
					</div>
				</div>
				<div class="form-group">
					<label for="linkedinid" class="col-sm-2 control-label">Linkedin Id</label>

					<div class="col-sm-5">
						<input type="text" class="form-control" name="linkedinid" placeholder="linkedin id">
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
				<img
					src="<?php echo $this->webroot; ?>captcha/file/captcha_code_file.php?rand=<?php echo rand(); ?>"
					id="captchaimg"><br>
				<input id="6_letters_code" name="6_letters_code" type="text">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<div>
			<strong>Discount/Trail Code</strong>
		</div>
	</div>
	<h4>if you have any coupan code please enter</h4>

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
			<?php include('t&c.ctp');?>
		</div>
	</div>
	<div class="form-group" style="margin-top: 20px;">
		<div class="col-md-7">
			<div class="checkbox">
				<label>
					<input name="is_agree" type="checkbox"> I accept all the terms and conditions
				</label>
			</div>
		</div>
		<div class="col-md-5">
			<?php echo $this->Form->button('Submit', array(
				'class' => ' btn btn-default pull-right fa fa-arrow-circle-o-right',
				'escape' => false)); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
