<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo __("Engine Listing")?>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="engine_index">
				<thead>
				<tr>
					<th>ENGINE NAME</th>
					<th>DOMAIN NAME</th>
					<th>CREATED BY</th>
					<th>CREATED AT</th>
					<th>SOURCE Language</th>
					<th>TARGET Language</th>
					<th>ACTION</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($engines as $key => $value) {
					$id = $value["Engine"]["id"];?>
					<tr>
						<td><?php echo $value['Engine']['name'];?></td>
						<td><?php echo $value['Engine']['domain_name'];?></td>
						<td><?php echo $value['User']['first_name'];?></td>
						<td><?php echo $value['Engine']['created'];?></td>
						<td><?php echo $value['Engine']['s_language']?>
						<td><?php echo $value['Engine']['t_language']?>
						</td>
						<td>
							<?php
							$updateProfile = '<i class="fa fa-pencil-square-o bigger-130"></i>';
							echo $this->Html->link(
								$updateProfile,
								array("controller"=>"engines","action" => "update", $id),
								array("class" => "text-success", "escape"=> false,'title'=>__('Update Engine')));
							?>
							|
							<?php
							$removeText = '<i class="glyphicon glyphicon-remove-circle"></i>';
							echo $this->Form->postLink(
								$removeText,
								array("controller"=>"engines","action" => "remove", $id),
								array('confirm' => 'Are you sure to remove it?', "class" => "text-danger", "escape"=> false,
									"title" => __("Remove engine"))
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
