<?php
$url = array("controller" => "users", "action" => "forgot_password", "plugin" => null);
echo $this->Form->create("User", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => 'file',
    "inputDefaults" => array("label" => false, "div" => true), "role" => "form", "novalidate" => true)); ?>
<div style="border-bottom: groove; margin-bottom:20px; margin-top: 30px">
    <strong>Forgot Password</strong>
</div>
<div class="col-md-offset-2">
    <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>

        <div class="col-sm-5">
            <?php echo $this->Form->input("User.password", array("class" => "form-control",
            "type" => "password", "placeholder" => "Password")); ?>
        </div>

    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Confirm Password</label>

        <div class="col-sm-5">
            <?php echo $this->Form->input("User.confirm_password", array("class" => "form-control",
            "type" => "password", "placeholder" => "Confirm Password")); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>

        <div class="col-md-5">
            <?php echo $this->Form->button('Submit', array(
            'class' => ' btn btn-default fa fa-arrow-circle-o-right',
            'escape' => false)); ?>
        </div>
    </div>
</div>
