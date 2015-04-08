<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">

			<li>
				<!--<a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>-->
				<?php echo $this->Html->link('<i class="fa fa-dashboard"></i> <span>' . __('Dashboard') . '</span>', '/users/dashboard', array('escape' => false));?>
			</li>
			<?php if ((strtolower($this->name) == 'employees' && $this->action == 'index') ||
				(strtolower($this->name) == 'employees' && $this->action == 'update')||
				(strtolower($this->name) == 'employees' && $this->action == 'add_employee')
			) {
				?>
				<li>
					<a href="#"><i class="fa fa-group"></i> Employees<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Employee') . '</span>', '/employees/index', array('escape' => false));?></li>
						<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Employee') . '</span>', '/employees/add_employee', array('escape' => false));?></li>
					</ul>
				</li>
			<?php }  ?>
			<?php if ((strtolower($this->name) == 'engines' && $this->action == 'index') ||
				(strtolower($this->name) == 'engines' && $this->action == 'update')||
				(strtolower($this->name) == 'engines' && $this->action == 'create')
			) {
				?>
				<li>
					<a href="#"><i class="fa fa-magnet"></i> Engines<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('My Engines') . '</span>', '/engines/index', array('escape' => false));?></li>
						<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Engines') . '</span>', '/engines/create', array('escape' => false));?></li>
					</ul>
				</li>
			<?php }  ?>
			<?php if ((strtolower($this->name) == 'contracts' && $this->action == 'index') ||
				(strtolower($this->name) == 'contracts' && $this->action == 'update')||
				(strtolower($this->name) == 'contracts' && $this->action == 'create')
			) {
				?>
				<li>
					<a href="#"><i class="fa fa-bookmark-o"></i> Contracts<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('My Contracts') . '</span>', '/contracts/index', array('escape' => false));?></li>
						<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Contracts') . '</span>', '/contracts/create', array('escape' => false));?></li>
					</ul>
				</li>
			<?php }  ?>
			<?php if ((strtolower($this->name) == 'reports' && $this->action == 'index') ||
				(strtolower($this->name) == 'reports' && $this->action == 'update')||
				(strtolower($this->name) == 'reports' && $this->action == 'create')
			) {
				?>
				<li>
					<a href="#"><i class="fa fa-bookmark-o"></i> Reports<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Reports') . '</span>', '/reports/index', array('escape' => false));?></li>
						<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Reports') . '</span>', '/reports/create', array('escape' => false));?></li>
					</ul>
				</li>
			<?php }  ?>
			<?php if ((strtolower($this->name) == 'jobs' && $this->action == 'index') ||
				(strtolower($this->name) == 'jobs' && $this->action == 'update')||
				(strtolower($this->name) == 'jobs' && $this->action == 'create')
			) {
				?>
				<li>
					<a href="#"><i class="fa fa-archive"></i> Jobs<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level dropdown-bg">
						<li><?php echo $this->Html->link('<i class="fa fa-list"></i> <span>' . __('All Jobs') . '</span>', '/jobs/index', array('escape' => false));?></li>
						<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> <span>' . __('Add Jobs') . '</span>', '/jobs/create', array('escape' => false));?></li>
					</ul>
				</li>
			<?php }  ?>
			<!--<li>
				<a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
			</li>-->
			<li>
				<?php echo $this->Html->link('<i class="fa fa-edit"></i> <span>' . __('Company Profile') . '</span>', '/companies/update', array('escape' => false));?></li>
			</li>

			<!--<li>
				<a href="table.html" class="active-menu"><i class="fa fa-table"></i> Responsive Tables</a>
			</li>
			<li>
				<a href="form.html"><i class="fa fa-edit"></i> Forms </a>
			</li>-->


			<!--<li>
				<a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="#">Second Level Link</a>
					</li>
					<li>
						<a href="#">Second Level Link</a>
					</li>
					<li>
						<a href="#">Second Level Link<span class="fa arrow"></span></a>
						<ul class="nav nav-third-level">
							<li>
								<a href="#">Third Level Link</a>
							</li>
							<li>
								<a href="#">Third Level Link</a>
							</li>
							<li>
								<a href="#">Third Level Link</a>
							</li>

						</ul>

					</li>
				</ul>
			</li>-->
			<!--<li>
				<a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
			</li>-->
		</ul>

	</div>

</nav>
