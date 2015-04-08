<nav class="navbar navbar-default top-navbar" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".top-bar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Greece</a>
	</div>
	<div class=".top-bar">
		<ul class="nav navbar-top-links navbar-right text-color">
			<li class="active">
				<?php echo $this->Html->link('<i class="fa fa-dashboard"></i>&nbsp;&nbsp;' . __('Dashboard'), '/users/dashboard', array('escape' => false)); ?>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group "></i>&nbsp;
					Employee</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-list text-left"></i> <span class="pull-right">' . __('All Employee') . '</span>', '/employees/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus text-left"></i> <span class="pull-right">' . __('Add Employee') . '</span>', '/employees/add_employee', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-magnet "></i>&nbsp;
					Engines</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-gear text-left"></i> <span class="pull-right">' . __('My Engines') . '</span>', '/engines/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus text-left"></i> <span class="pull-right">' . __('Add Engine') . '</span>', '/engines/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bookmark"></i>&nbsp;
					Contracts</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-list text-left"></i> <span class="pull-right">' . __('All Contracts') . '</span>', '/contracts/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus text-left"></i> <span class="pull-right">' . __('Add Contracts') . '</span>', '/contracts/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-arrow-circle-up"></i>&nbsp;
					Jobs</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-list text-left"></i> <span class="pull-right">' . __('Job Listing') . '</span>', '/jobs/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus text-left"></i> <span class="pull-right">' . __('Add Job') . '</span>', '/jobs/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-paperclip "></i>&nbsp;
					Reports</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-list text-left"></i> <span class="pull-right">' . __('All Reports') . '</span>', '/reports/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus text-left"></i> <span class="pull-right">' . __('Add Reports') . '</span>', '/reports/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user "></i>&nbsp;
					Profile</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="fa fa-user text-left"></i> <span class="pull-right">' . __('Profile') . '</span>', '/users/profile', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-sign-out text-left"></i> <span class="pull-right">' . __('Logout') . '</span>', '/users/logout', array('escape' => false)); ?></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
