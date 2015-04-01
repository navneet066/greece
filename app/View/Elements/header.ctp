<nav class="navbar navbar-default" style="background: #223343">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo $this->Html->image('cake.icon.png')?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
			</ul>
			<!--<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>-->
			<ul class="nav navbar-nav navbar-right">
				<li><?php echo $this->Html->link('Sign Up',array('controller'=>'users','action'=>'sign_up'))?></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><?php echo $this->Html->link('Admin Login', array('controller'=>'users','action'=>'admin_login'));?></php></li>
						<li><?php echo $this->Html->link('User Login', array('controller'=>'users','action'=>'user_login'));?></php></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
