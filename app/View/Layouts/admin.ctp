<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('PanamaReps: Content Management System Home:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                
                echo $this->Html->css('admin');
        echo $this->Html->css('smoothness/jquery-ui.css');
	echo $this->Html->script('jquery.js');
        echo $this->Html->script('jquery-ui.js');

		echo $scripts_for_layout;
                

	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 style="float:left;"><?php echo $this->Html->link(__('PanamaReps: Content Management System', true), '../'); ?></h1>
			<div style="float:right;">
				<?php echo $this->Html->link($this->Html->image('_log_out.png', array('alt' => 'Login', 'width'=>'15%')), array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php echo $this->Html->link($this->Html->image('_espanol_flag.png', array('alt' => 'Espa�ol', 'width'=>'15%')), array('controller' => 'Languages', 'action' => 'changeLanguage', 'id'=>1), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('_english_flag.png', array('alt' => 'English', 'width'=>'15%')), array('controller' => 'Languages', 'action' => 'changeLanguage', 'id'=>2), array('escape'=>false));?>										
			</div>
		</div>
		<div id="content"> <!-- este es el pagecell1 del template-->
                 <?php echo $this->Session->flash('flash', array('element' => 'message')); ?>   
                 <?php echo $this->Session->flash('error', array('element' => 'error')); ?>       
                    
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<div id="siteInfo"> 
				<!-- <a href="http://www.panamareps.com/home/aboutus/company.php">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="http://www.panamareps.com/home/contactus/contactus.php">Contact Us</a> | --> &copy;2010 | Panama Reps DMC and its logo are registered Trade Marks	
			</div>
		</div>
	</div>
	<?php pr( $this->element('sql_dump')); ?>
    <?php pr( $this->data); ?>
    
</body>
</html>
