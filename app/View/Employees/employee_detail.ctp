<?php
$url = array("controller" => "employees", "action" => "employee_detail", $id);
echo $this->Form->create("Article", array("url" => $url, "class" => "form-horizontal", "autocomplete" => "off", "type" => "file",
	"inputDefaults" => array("label" => false, "div" => false), "novalidate" => true, "id" => "updateForm")); ?>
<div class="modal-header">

</div>
<div class="modal-body">

</div>
<?php echo $this->Form->end(); ?>
