<nav class="navbar navbar-default top-navbar" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".top-bar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php echo $this->Html->link('Greece', array('controller'=>'users','action'=>'dashboard'),array('class'=>'navbar-brand')); ?>
	</div>
	<div class=".top-bar">
		<ul class="nav navbar-top-links navbar-right text-color">
			<?php $lastLogin = $this->requestAction(array('controller'=>'users','action'=>'getLastLogin'));?>
			<li>
				<span class="text-info" style="color:white ">Last Login : <?php echo $this->Time->format('l,j F Y, H:i:s',$lastLogin['User']['last_login']);?></span>
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
