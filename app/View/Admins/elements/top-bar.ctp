<nav class="navbar brb" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-reorder"></span>
		</button>
		<a class="navbar-brand"><img src="<?php echo $this->webroot; ?>img/logo.png"/></a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active">
				<?php echo $this->Html->link('<i class="icon-home"></i>&nbsp;' . __('Dashboard'), '/admin', array('escape' => false)); ?>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-pencil"></span>
					Employee</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('All Employee') . '</span>', '/employees/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('Add Employee') . '</span>', '/employees/add_employee', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('Active Employee') . '</span>', '/employees/active_employee', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('Inactive Employee') . '</span>', '/employees/inactive_employee', array('escape' => false)); ?></li>
				</ul>
			</li>
			<!--<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-cogs"></span> Settings</a>
				<ul class="dropdown-menu">
					<li><?php /*echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('Admin Settings').'</span>','/admin_settings/index', array('escape'=>false));*/ ?></li>
					<li><?php /*echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('Add Settings').'</span>','/admin_settings/add_settings', array('escape'=>false));*/ ?></li>
				</ul>
			</li>-->
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-cogs"></span> Profile</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="icon-gear"></i> <span>' . __('Logout') . '</span>', '/users/logout', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-gear"></i> <span>' . __('Profile') . '</span>', '/users/profile', array('escape' => false)); ?></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
