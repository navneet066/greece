<?php
$employees = $this->requestAction(array('controller' => 'admins', 'action' => 'employees_db'));
?>
		<div class="block">
			<div class="header">
				<h2>Recent users</h2>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped sortable_simple">
					<thead>
					<tr>
						<th><i class="icon-user"></i><?php echo __('Username')?></th>
						<th><?php echo 'Email' ?></th>
						<th><i class="icon-time"></i><?php echo __('Create Date')?></th>
						<th><?php echo 'Action'; ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($employees as $key => $value) { ?>
						<tr id="user_<?php echo $value['Employee']['id'];?>">
							<td><?php echo $value['Employee']['username'];?></td>
							<td><?php echo $value['Employee']['email'];?></td>
							<td class="hidden-phone"><?php echo date('Y-m-d', strtotime($value['Employee']['created']));?></td>
							<td>
								<div style="width: 50px;" class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
									<?php echo $this->Html->link('<i class="fa fa-edit bigger-130"></i>', '/employees/update_profile/' . $value['Employee']['id'], array('data-placement' => "left", 'nick' => "", 'class' => "green", 'escape' => false));?>
									<?php echo $this->Html->link('<i class="icon-trash bigger-130"></i>', '', array('onclick' => 'return false', 'class' => "red userDelete", 'data-id' => $value['Employee']['id'], 'data-title' => $value['Employee']['username'], 'escape' => false));?>
								</div>
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Js->writeBuffer(array('cache' => false)); ?>
