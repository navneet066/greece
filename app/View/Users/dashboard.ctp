<h4><strong>Welcome  </strong></h4>&nbsp;&nbsp;
<?php echo $this->Html->link($user['User']['full_name']." "."!", array('controller'=>'users','action'=>'profile'),
	array('class'=>'text-danger','style'=>'font-size:20px;font-weight:bolder; text-decoration:none')); ?><br>
<div class="col-md-2 col-sm-12 col-xs-12">
	<div class="panel panel-primary text-center no-boder bg-color-green">
		<div class="panel-body">
			<i class="fa fa-bar-chart-o fa-5x"></i>
			<h3>8,457</h3>
		</div>
		<div class="panel-footer back-footer-green">
			Daily Visits

		</div>
	</div>
</div>
<div class="col-md-2 col-sm-12 col-xs-12">
	<div class="panel panel-primary text-center no-boder bg-color-blue">
		<div class="panel-body">
			<i class="fa fa-shopping-cart fa-5x"></i>
			<h3>52,160 </h3>
		</div>
		<div class="panel-footer back-footer-blue">
			Sales

		</div>
	</div>
</div>
<div class="col-md-2 col-sm-12 col-xs-12">
	<div class="panel panel-primary text-center no-boder bg-color-red">
		<div class="panel-body">
			<i class="fa fa fa-comments fa-5x"></i>
			<h3>15,823 </h3>
		</div>
		<div class="panel-footer back-footer-red">
			Comments

		</div>
	</div>
</div>
<div class="col-md-2 col-sm-12 col-xs-12">
	<div class="panel panel-primary text-center no-boder bg-color-brown">
		<div class="panel-body">
			<i class="fa fa-users fa-5x"></i>
			<h3>36,752 </h3>
		</div>
		<div class="panel-footer back-footer-brown">
			No. of Visits

		</div>
	</div>
</div>
</div>
<div class="col-md-2 col-sm-12 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Donut Chart Example
		</div>
		<div class="panel-body">
			<div id="morris-donut-chart"></div>
		</div>
	</div>
</div>
<!--<div><?php /*echo $this->element('Admin/dashboard/employees'); */?></div>
<div><?php /*echo $this->element('Admin/dashboard/engines'); */?></div>
<div><?php /*echo $this->element('Admin/dashboard/jobs'); */?></div>
<div><?php /*echo $this->element('Admin/dashboard/contracts'); */?></div>
-->
