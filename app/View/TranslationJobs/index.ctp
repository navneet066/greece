<div class="panel panel-default">
	<div class="panel-heading">
		<?php echo __("TranslationJob Listing")?>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="translationJob_index">
				<thead>
				<tr>
					<th>ENGINE NAME</th>
					<th>Is Hybrid</th>
					<th>CREATED BY</th>
					<th>CREATED AT</th>
					<th>SOURCE Language</th>
					<th>TARGET Language</th>
					<th>ACTION</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($results as $key => $value) {
					$id = $value["TranslationJob"]["id"];?>
					<tr>
						<td><?php echo $value['Engine']['name'];?></td>
						<td><?php $hybrid = $value['TranslationJob']['hybrid'];
							if($hybrid){
								echo "Yes";
							}else{
								echo "No";
							}?></td>
						<td><?php echo $value['User']['first_name'];?></td>
						<td><?php echo $value['TranslationJob']['created'];?></td>
						<td><?php $sLn = $value['TranslationJob']['s_language'];
							 $sLName = $this->requestAction(array("controller"=>"translation_jobs",
								 "action"=>"getLanguageName",$sLn,"plugin"=>null));
							echo $sLName;?>
						<td><?php $tLn =  $value['TranslationJob']['t_language'];
							$tLName = $this->requestAction(array("controller"=>"translation_jobs",
								"action"=>"getLanguageName",$tLn,"plugin"=>null));
							echo $tLName;?>
						</td>
						<td>
							<?php
							$updateProfile = '<i class="fa fa-pencil-square-o bigger-130"></i>';
							echo $this->Html->link(
								$updateProfile,
								array("controller"=>"translation_jobs","action" => "update", $id),
								array("class" => "text-success", "escape"=> false,'title'=>__('Update TranslationJob')));
							?>
							|
							<?php
							$removeText = '<i class="glyphicon glyphicon-remove-circle"></i>';
							echo $this->Form->postLink(
								$removeText,
								array("controller"=>"translation_jobs","action" => "remove", $id),
								array('confirm' => 'Are you sure to remove it?', "class" => "text-danger", "escape"=> false,
									"title" => __("Remove TranslationJob"))
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
