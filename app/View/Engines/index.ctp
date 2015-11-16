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
						<td><?php $sLn = $value['Engine']['s_language'];
							$sLName = $this->requestAction(array("controller"=>"translation_jobs",
								"action"=>"getLanguageName",$sLn,"plugin"=>null));
							echo $sLName;?>
						<td><?php $tLn = $value['Engine']['t_language'];
							$tLName = $this->requestAction(array("controller"=>"translation_jobs",
								"action"=>"getLanguageName",$tLn,"plugin"=>null));
							echo $tLName;?>
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
							$updateProfile = '<i class="fa fa-plus bigger-130"></i>';
							echo $this->Html->link(
								$updateProfile,
								array("controller"=>"translation_jobs","action" => "create_by_engine", $id),
								array("class" => "text-success", "escape"=> false,'title'=>__('Crete job')));
							?>
							|
							<?php
							$removeText = '<i class="glyphicon glyphicon-remove-circle"></i>';
							echo $this->Html->link(
								$removeText, "#",
								/*array("controller"=>"engines","action" => "remove", $id),*/
								array("data-target"=>"#myModal", "data-toggle"=>"modal", "class" => "text-danger", "escape"=> false,
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
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Modal header</h3>
	</div>
	<div class="modal-body">
		<p>One fine body…</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save changes</button>
	</div>
</div>

