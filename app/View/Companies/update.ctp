<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
<div>
	<?php
	$url = array("controller" => "companies", "action" => "update", "plugin" => null);
	echo $this->Form->create("Company", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
		"inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
	<div style="border-bottom: groove; margin-bottom:20px; margin-top: 30px">
		<strong>Company Information</strong>
	</div>
	<div>
		<div class="form-group">
			<label for="company_name" class="col-sm-2 control-label">Company(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.company_name", array("class" => "form-control",
					"type" => "text", "placeholder" => "Company Name")); ?>
			</div>
		</div>
		<!--<div class="form-group">
        <label for="jobFunction" class="col-sm-2 control-label">Job Function(*)</label>

        <div class="col-sm-8">
            <?php /*echo $this->Form->input("Company.job_function", array("class" => "form-control",
            "placeholder" => "Job Function", "size" => "50", "id" => "jobFunction", "type" => "text")); */ ?>
        </div>
    </div>-->
		<div class="form-group">
			<label for="industry" class="col-sm-2 control-label">Industry(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input('Company.industry', array(
					'type' => 'text',	"class" => 'form-control','id'=>'Industry'));?>
			</div>
		</div>

		<div class="form-group">
			<label for="vat-id" class="col-sm-2 control-label">VAT ID(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.vat_id", array("class" => "form-control",
					"placeholder" => "Vat Id", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Company Email(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.email", array("class" => "form-control",
					"placeholder" => "company@email.com", "type" => "email")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Address(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.address", array("class" => "form-control",
					"placeholder" => "address", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">City(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.city", array("class" => "form-control",
					"placeholder" => "city", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Postal/Zip Code</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.postal_code", array("class" => "form-control",
					"placeholder" => "Postal/Zip code", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">State or Province(*)</label>

			<div class="col-sm-8">
				<?php echo $this->Form->input("Company.state", array("class" => " form-control", "placeholder" => "State", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-sm-2 control-label">Country(*)</label>

			<div class="col-sm-8">
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
	<!--</div>

	<div class="form-group">
		<div class="col-md-offset-8">
			<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#companyInfo"
					aria-expanded="false" aria-controls="companyInfo">
				More Info
			</button>
		</div>
		<div class="collapse" id="companyInfo">-->
			<div>
				<div class="form-group">
					<label for="web_url" class="col-sm-2 control-label">Website</label>

					<div class="col-sm-8">
						<?php echo $this->Form->input("Company.web_url", array("class" => "form-control",
							"placeholder" => "Web Url", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="telephone" class="col-sm-2 control-label">Telephone</label>

					<div class="col-sm-8">
						<?php echo $this->Form->input("Company.telephone", array("class" => "form-control",
							"placeholder" => "Company Telephone", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="fax" class="col-sm-2 control-label">Fax</label>

					<div class="col-sm-8">
						<?php echo $this->Form->input("Company.fax", array("class" => "form-control",
							"placeholder" => "Fax No", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="alias" class="col-sm-2 control-label">Alias</label>

					<div class="col-sm-8">
						<?php echo $this->Form->input("Company.alias", array("class" => "form-control",
							"placeholder" => "Alias", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="timezone" class="col-sm-2 control-label">Timezone</label>

					<div class="col-sm-8">
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

					<div class="col-sm-8">
						<?php echo $this->Form->input("Company.working_hours", array("class" => "form-control",
							"placeholder" => "Working Hour", "type" => "text")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="cattools" class="col-sm-2 control-label">Cat Tools</label>

					<div class="col-sm-8">
						<?php echo $this->Form->input("Company.cat_tools", array("class" => "form-control", "id" => "catTools",
							"placeholder" => "Category Tools", "size" => "50", "type" => "text")); ?>
					</div>
				</div>
				<div class="">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<?php echo $this->Form->button('Update', array(
							'class' => 'btn btn-success btn-lg pull-right',
							'escape' => false)); ?>
					</div>
				</div>
			</div>
		<!--</div>-->
	</div>
	<div class="clearfix"></div>
</div>
<?php echo $this->Form->end(); ?>
