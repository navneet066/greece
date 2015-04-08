<div class="">
	<div class="">
		<?php $url = array("controller" => "users", "action" => "admin_login", "plugin" => null);
		echo $this->Form->create("User", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off",
			"type" => 'file', "inputDefaults" => array("label" => false, "div" => true),
			"role" => "form", "novalidate" => true)); ?>
		<div class="center-block">
			<div class="col-md-offset-3" style="color: #ffffff;margin-top: 10%">
				<div class="col-md-offset-3">
					<h1>
						<?php echo __("Admin Login") ?>
					</h1>
					<?php echo $this->Html->image('logo1.jpg',array('class'=>'img-circle img-logo1')); ?>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label"></label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("email", array("class" => "form-control",
							"type" => "email", "placeholder" => "Username or Email")); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label"></label>

					<div class="col-sm-5">
						<?php echo $this->Form->input("password", array("class" => "form-control",
							"type" => "password", "placeholder"=>"Password")); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>

					<div class="col-sm-5">
						<div class="checkbox">
							<label>
								<input name="remember_me" type="checkbox">Remeber Me
								<?php echo $this->Html->link('forgot password', array('controller' => 'users',
									'action' => 'forgot_password'), array('class' => 'pull-right')) ?>
							</label>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-2 control-label"></label>

					<div class="col-sm-5">
						<?php echo $this->Form->submit('Sign In', array('class' => 'btn btn-info btn-block btn-border')) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
