<?php if (!empty($message)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
				class="sr-only">Close</span></button>
		<?php echo $message; ?>
	</div>
<?php } ?>
<div>
	<?php
	$url = array("controller" => "engines", "action" => "create");
	echo $this->Form->create("Engine", array("url" => $url, "class" => "form-horizontal", "type" => "file",
		"role" => "form", 'novalidate' => true, 'inputDefaults' => array('label' => false, 'div' => false)));?>
	<div style="border-bottom: groove;margin-bottom: 20px; margin-top: 30px">
		<strong>Engine Information</strong>
	</div>
	<div class="text-color">
		<div class="form-group">
			<label class="col-sm-2 control-label">Engine Name(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Engine.name", array("class" => "form-control",
					"placeholder" => "Engine Name", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Domain(*)</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Engine.domain_name", array("class" => "form-control",
					"placeholder" => "Engine Domain", "type" => "text")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Source Language(*)</label>

			<div class="col-sm-6">
				<?php
				echo $this->Form->input('Engine.s_language', array(
					'type' => 'select',
					'options' => $languages,
					'empty' => '(Choose Language)',
					"class" => 'form-control'
				));
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Target Language(*)</label>

			<div class="col-sm-6">
				<?php
				echo $this->Form->input('Engine.t_language', array(
					'type' => 'select',
					'options' => $languages,
					'empty' => '(Choose Language)',
					"class" => 'form-control'
				));
				?>
			</div>
		</div>
		<!--<div class="form-group">
			<label class="col-sm-2 control-label">TM</label>

			<div class="col-sm-6">
				<?php /*echo $this->Form->input("Engine.tm_file", array("class" => "form-control", "type" => "file")); */?>
			</div>
		</div>-->
		<div class="form-group">
			<label class="col-sm-2 control-label">Description</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Engine.description", array("class" => "form-control",
					"placeholder" => "Engine Glossaries", "type" => "text")); ?>
			</div>
		</div>
		<h4><strong>Training Corpora</strong></h4>
		<div class="form-group">
				<label class="col-sm-2 control-label">Training Corpus</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input('Engine.tune_corpus_file', array("class" => "form-control",
                        "type" => "file"));?>
				</div>
		</div>
		<h4><strong>Glossaries</strong></h4>
		<div class="form-group">
			<label class="col-sm-2 control-label">High Priority Glossaries</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Engine.high_glossary", array("class" => "form-control", "type" => "file")); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Low Priority Glossaries</label>

			<div class="col-sm-6">
				<?php echo $this->Form->input("Engine.low_glossary", array("class" => "form-control", "type" => "file")); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-8">
				<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#engineInfo"
						aria-expanded="false" aria-controls="engineInfo">
					More Info
				</button>
			</div>
		</div>
		<div class="collapse" id="engineInfo">
			<div style="border-bottom: groove;margin-bottom: 20px;">
				<strong>Advanced Settings</strong>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Additional LM Data</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Engine.ad_lm_file", array("class" => "form-control",
						"type" => "file")); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Test Length</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Engine.test_ln", array("class" => "form-control",
						"type" => "text", "placeholder" => "Number Only")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tune Length</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Engine.tune_ln", array("class" => "form-control",
						"type" => "text", "placeholder" => "Number Only")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Fast Track Training</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Engine.fast_track_training", array("class" => "form-control",
						"type" => "text")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Hybrid</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Engine.hybrid", array("class" => "form-control",
						"type" => "text")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Casing</label>

				<div class="col-sm-6">
					<?php echo $this->Form->input("Engine.casing", array("class" => "form-control",
						"type" => "text")); ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>

			<div class="col-md-6">
				<div class="btn-group pull-right" role="group">
					<?php echo $this->Form->button('RESET', array(
						'class' => ' btn btn-default',
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
