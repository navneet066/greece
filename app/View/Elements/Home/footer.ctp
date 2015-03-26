<div class="footer-body">
	<div class="container">
		<div class="col-md-4 social-group-button">
			<div class="">
				<p><?php echo __('FOLLOW US ON :')?></p>

				<p>

				<div class="btn-group" role="group" aria-label="...">
					<a href="#" class="btn btn-default"><?php echo $this->Html->image('/files/social/img/google.jpg',array('class'=>'social-img-size',));?></a>
					<a href="#" class="btn btn-default"><?php echo $this->Html->image('/files/social/img/linkedin.png',array('class'=>'social-img-size'));?></a>
					<a href="#" class="btn btn-default"><?php echo $this->Html->image('/files/social/img/twitter.png',array('class'=>'social-img-size'));?></a>
					<a href="#" class="btn btn-default"><?php echo $this->Html->image('/files/social/img/facebook.png',array('class'=>'social-img-size'));?></a>
				</div>
				</p>
			</div>
			<div class="btn-hover">
				<p><?php echo __('MAILING LIST');?></p>
				<?php echo $this->Html->link('SUBSCRIBE',array('controller'=>'users','action'=>''),
					array('class'=>'btn btn-blue'));?>
			</div>
		</div>
		<div class="col-md-8 footer-link">
			<div class="col-md-2">
				<?php echo $this->Html->link('ABOUT', array("controller" => "users", "action" => ""))?>
				<ul class="list-unstyled">
					<li><?php echo $this->Html->link('Mission Statement', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('History Of', array('controller' => 'users', 'action' => ''))?></li>
					<li><?php echo $this->Html->link('Contact', array('controller' => 'users', 'action' => ''))?></li>
					<li><?php echo $this->Html->link('Partner', array('controller' => 'users', 'action' => ''));?></li>
				</ul>
			</div>
			<div class="col-md-2">
				<?php echo $this->Html->link('PEOPLE', array("controller" => "users", "action" => ""))?>
				<ul class="list-unstyled">
					<li><?php echo $this->Html->link('Team', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Advisory Board', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Representative', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Ambassadors', array('controller' => '', 'action' => ''));?></li>
				</ul>
			</div>
			<div class="col-md-2">
				<?php echo $this->Html->link('LEGAL & POLICIES', array("controller" => "users", "action" => ""))?>
				<ul class="list-unstyled">
					<li><?php echo $this->Html->link('Privacy Policy', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Terms Of Use', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Membership Terms', array('controller' => 'users', 'action' => ''));?></li>
				</ul>
			</div>
			<div class="col-md-2">
				<?php echo $this->Html->link('MEMBERSHIP', array('controller' => 'users', 'action' => ''))?>
				<ul class="list-unstyled">
					<li><?php echo $this->Html->link('Why Be a Member', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Directory', array('controller' => 'users', 'action' => ''));?></li>
					<li><?php echo $this->Html->link('Membership Plans', array('controller' => '', 'action' => ''));?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
