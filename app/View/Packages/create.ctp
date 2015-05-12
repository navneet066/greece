<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
<div>
	<?php
	$url = array("controller" => "packages", "action" => "create");
	echo $this->Form->create("Package", array("url" => $url, "class" => "form-horizontal", "type" => "file",
		"role" => "form", 'novalidate' => true, 'inputDefaults' => array('label' => false, 'div' => false)));?>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<strong>Package Information</strong>
	</div>
	<div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Package Name(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.name", array("class" => "form-control",
					"placeholder" => "Package Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Disk Storage</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.disk_storage", array("class" => "form-control",
					"placeholder" => "Disk Storage","type" => "number", "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Compute Hours(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.compute_hours", array("class" => "form-control",
					"placeholder" => "Compute Hours","type" => "number", "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Engines Numbers(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.number_of_engines", array("class" => "form-control",
					"placeholder" => "Number Of Engines","type" => "number", "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Language Pairs</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.lang_pairs", array("class" => "form-control",
					"placeholder" => "Languages Pairs","type" => "number", "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Max Translate Words</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.max_translated_words", array("class" => "form-control",
					"placeholder" => "Max Translate Words","type" => "number", "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Min Hour Per Job</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input('Package.min_hour_per_job', array("class" => "form-control",
					"placeholder"=>"Min Hour Per Job (In float values like 6.20)",
					"type" => "number", "step"=>0.01, "min"=>0));?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Min Rate Words</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.min_rate_word", array("class" => "form-control",
					"placeholder"=>"Min Rate Word (In Numbers only)","type" => "number", "step"=>0.01, "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Min Rate MB</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.min_rate_mb", array("class" => "form-control",
					"placeholder"=>"Min Rate Mb (In number Only)","type" => "number", "step"=>0.01, "min"=>0)); ?>
			</div>
		</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Extra Rate Word</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Package.extra_rate_add_word", array("class" => "form-control",
						"placeholder"=>"Extra Rate add mb (In number only)","type" => "number", "min"=>0)); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Extra Rate Add MB</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Package.extra_rate_add_mb", array("class" => "form-control",
						"placeholder" => "Extra Rate mb (Number Only)","type" => "number", "min"=>0)); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Extra Rate Add Hour</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Package.extra_rate_add_hour", array("class" => "form-control",
						"placeholder"=>"Extra Hours (In float only like 6.34)",
						"type" => "number", "step"=>0.01, "min"=>0,)); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Extra Rate Add Engine</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Package.extra_rate_add_engine", array("class" => "form-control",
						"placeholder"=>"Engine Add Rate (number only)","type" => "number", "min"=>0)); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Price</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Package.price", array("class" => "form-control",
						"placeholder"=>"Price (In float like 12.34)","type" => "number", "step"=>0.01, "min"=>0)); ?>
				</div>
			</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Valid Days</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Package.valid_days", array("class" => "form-control",
					"placeholder"=>"Total Days (number only)","type" => "number", "min"=>0)); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-md-6">
				<div class="btn-group pull-right" role="group">
					<?php echo $this->Form->button('RESET', array(
						'class' => 'btn btn-default',
						'type'=>'reset',
						'escape' => false)); ?>
					<?php echo $this->Form->button('SUBMIT', array(
						'class' => 'btn btn-success',
						'type'=>'submit',
						'escape' => false)); ?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
