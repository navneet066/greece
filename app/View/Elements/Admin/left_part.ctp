<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<?php $authUser = $this->requestAction(array("controller"=>"users","action"=> "getAuthDetail"));?>
			<li>
				<!--<a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>-->
				<?php echo $this->Html->link('<i class="fa fa-dashboard"></i> <span>' . __('Dashboard') . '</span>', '/users/dashboard', array('escape' => false)); ?>
			</li>
			<?php if($authUser['User']['group_id'] == 1){?>
			<li>
				<a href="#"><i class="fa fa-archive"></i>Packages<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Packages') . '</span>', '/packages/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Package') . '</span>', '/packages/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<?php }?>
			<li>
				<a href="#"><i class="fa fa-magnet"></i>My Engines<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('My Engines') . '</span>', '/engines/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Engines') . '</span>', '/engines/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-arrow-circle-up"></i>My Translation Jobs<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level dropdown-bg">
					<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Jobs') . '</span>', '/translation_jobs/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Jobs') . '</span>', '/translation_jobs/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-bookmark-o"></i>My Contracts<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('My Contracts') . '</span>', '/contracts/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Contracts') . '</span>', '/contracts/create', array('escape' => false)); ?></li>
				</ul>
			</li>

			<li>
				<a href="#"><i class="fa fa-paperclip"></i>My Reports<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Reports') . '</span>', '/reports/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Reports') . '</span>', '/reports/create', array('escape' => false)); ?></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-group"></i> My Co-workers<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Employee') . '</span>', '/employees/index', array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Employee') . '</span>', '/employees/add_employee', array('escape' => false)); ?></li>
				</ul>
			</li>

			<li>
				<?php echo $this->Html->link('<i class="fa fa-edit"></i> <span>' . __('Company Profile') . '</span>', '/companies/update', array('escape' => false)); ?></li>
			</li>
		</ul>
	</div>
</nav>
