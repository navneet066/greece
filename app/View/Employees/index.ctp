<div class="panel panel-default">
	<?php
	if (!empty($message)) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
				<span class="sr-only"><?php echo __("Close"); ?></span></button>
			<?php echo $message; ?>
		</div>
	<?php } ?>
	<div class="panel-heading">
		<h2><?php echo __("Employees Listing"); ?></h2>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="employee_index">
				<thead>
				<tr>
					<th><?php echo __('Name'); ?></th>
					<th><?php echo __('Username'); ?></th>
					<th><?php echo __('Email'); ?></th>
					<th><?php echo __('Created At'); ?></th>
					<th><?php echo __('Last Update'); ?></th>
					<th><?php echo __('Actions'); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($employees as $key => $value) {
					$id = $value["User"]["id"]; ?>
					<tr>
						<td>
							<?php echo $value['User']['full_name'] ?>
						</td>
						<td><?php echo $value['User']['username']; ?></td>
						<td><a data-target="#modal-static"
									data-toggle="modal">
								<?php echo $value['User']['email'] ?>
							</a>
						</td>
						<td><?php echo $value['User']['created']; ?></td>
						<td><?php echo $value['User']['updated']; ?></td>
						<td>
							<?php $status = $value['User']['is_active'];
							if ($status) {
								echo $this->Html->link('<i class="fa fa-plus"></i>',
									array('controller' => "employees", "action" => "change_status", $id, 0),
									array("class" => "text-success", "escape" => false, "title" => __("Make Inactive.")));
							} else {
								echo $this->Html->link('<i class="fa fa-minus"></i>',
									array('controller' => "employees", "action" => "change_status", $id, true),
									array("class" => "text-danger", "escape" => false, "title" => __("Make Active.")));
							} ?>
							|
							<?php
							$updateProfile = '<i class="fa fa-pencil-square-o bigger-130"></i>';
							echo $this->Html->link(
								$updateProfile,
								array("controller" => "employees", "action" => "update_profile", $id),
								array("class" => "text-success", "escape" => false, 'title' => __('Update Profile')));
							?>
							|
							<?php
							$removeText = '<i class="glyphicon glyphicon-remove-circle"></i>';
							echo $this->Form->postLink(
								$removeText,
								array("controller" => "employees", "action" => "delete_employee", $id),
								array('confirm' => 'Are you sure to remove it?', "class" => "text-success", "escape" => false,
									"title" => __("Remove Employee"))
							);
							?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="modal-static" tabindex="-1" data-keyboard="false" class="modal">
	<div class="modal-dialog">
		<div class="modal-content" id="updateFormBox"></div>
	</div>
</div>
