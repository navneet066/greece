<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->css('/bootstrap/css/bootstrap.min.css');
	echo $this->Html->css('/font-awesome/css/font-awesome.css');
	echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
    echo $this->Html->css('custom.css');
    ?>
    <?php
    echo $this->Html->script('/bootstrap/js/jquery.min.js');
    echo $this->Html->script('/bootstrap/js/bootstrap.min.js');
    echo $this->Html->script('/captcha/js/gen_validatorv31.js');
    ?>
    <?php echo $this->fetch('script');?>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php echo $this->element('Home/header'); ?>
    </div>
    <div>
        <?php echo $this->Session->flash(); ?>
        <div>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <div class="row" style="background: darkgrey">
        <?php echo $this->element('Home/lower_breadcum');?>
    </div>
    <div class="row">
        <?php echo $this->element('Home/footer'); ?>
    </div>
</div>
</body>
</html>
