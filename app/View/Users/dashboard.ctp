<?php echo "Hello Dashboard page"; ?>
<?php echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));?>
<?php echo $this->Html->link('Add Employee', array('controller'=>'users','action'=>'add_employee'));?>
<?php echo $this->Html->link('Update Password', array('controller'=>'users','action'=>'reset_password'));?>
