<h4><strong>Welcome  </strong></h4>&nbsp;&nbsp;
<?php echo $this->Html->link($user['User']['full_name']." "."!", array('controller'=>'users','action'=>'profile'),
	array('class'=>'text-danger','style'=>'font-size:20px;font-weight:bolder; text-decoration:none')); ?><br>

<div><?php echo $this->element('Admin/dashboard/employees'); ?></div>
<div><?php echo $this->element('Admin/dashboard/engines'); ?></div>
<div><?php echo $this->element('Admin/dashboard/jobs'); ?></div>
<div><?php echo $this->element('Admin/dashboard/contracts'); ?></div>
