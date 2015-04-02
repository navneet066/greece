<nav class="navbar brb" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-reorder"></span>
		</button>
		<a class="navbar-brand"><?php echo $this->Html->image('logo1.jpg',array('width'=>'20',"height"=>'30'))?></a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active">
				<?php echo $this->Html->link('<i class="fa fa-dashboard text-info"></i>&nbsp;&nbsp;' . __('Dashboard'), '/admin', array('escape' => false)); ?>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group text-info"></i>&nbsp; Employee</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('All Employee') . '</span>', '/employees/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('Add Employee') . '</span>', '/employees/add_employee', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('Active Employee') . '</span>', '/employees/active_employee', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-list"></i> <span>' . __('Inactive Employee') . '</span>', '/employees/inactive_employee', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-magnet text-info"></i>&nbsp; Engines</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('All Engines').'</span>','/engines/index', array('escape'=>false)); ?></li>
					<li><?php echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('Add Engine').'</span>','/engines/create', array('escape'=>false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bookmark text-info"></i>&nbsp; Contracts</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('All Contracts').'</span>','/contracts/index', array('escape'=>false)); ?></li>
					<li><?php echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('Add Contracts').'</span>','/contracts/create', array('escape'=>false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-paperclip text-info"></i>&nbsp; Reports</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('All Reports').'</span>','/reports/index', array('escape'=>false)); ?></li>
					<li><?php echo $this->Html->link( '<i class="icon-gear"></i> <span>'. __('Add Reports').'</span>','/reports/create', array('escape'=>false)); ?></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user text-info"></i>&nbsp; Profile</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="icon-gear"></i> <span>' . __('Logout') . '</span>', '/users/logout', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-gear"></i> <span>' . __('Profile') . '</span>', '/users/profile', array('escape' => false)); ?></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
