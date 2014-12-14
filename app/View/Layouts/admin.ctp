<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Content Management System Home:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                
                echo $this->Html->css('admin');
        echo $this->Html->css('smoothness/jquery-ui.css');
	echo $this->Html->script('jquery.js');
        echo $this->Html->script('jquery-ui.js');
  echo $this->Html->script('view.js');
		echo $scripts_for_layout;
         
         echo $this->Html->css('menu/pro_dropdown_2.css');
        echo $this->Html->script('menu/stuHover.js');

	?>
</head>
<body>
<?php 
//echo $this->Session->read("Config.country") ;
$localLanguage=$this->Session->read("Config.language_only") ;
$localCountry =$this->Session->read("Config.country") ;

?>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('Content Management System', true), '../'); ?></h1>
			<div id="barLanguage" class="bar">
				<?php echo $this->Html->link($this->Html->image('_log_out.png', array('alt' => 'Login', 'width'=>'20px')), array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php echo $this->Html->link($this->Html->image('_espanol_flag.png', array('alt' => 'Español', 'width'=>'20px', 'class'=>('es'==$localLanguage)?'selected':'')), array('controller' => 'Languages', 'action' => 'change', 'id'=>1), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('_english_flag.png', array('alt' => 'English', 'width'=>'20px', 'class'=>('en'==$localLanguage)?'selected':'')), array('controller' => 'Languages', 'action' => 'change', 'id'=>2), array('escape'=>false));?>										
										
			</div>
			<div id="barCountry" class="bar">				
				&nbsp;&nbsp;
				<?php echo $this->Html->link($this->Html->image('flag_countries/cr.png', array('alt' => 'Costa Rica', 'width'=>'48px', 'class'=>('CR'==$localCountry?'selected':''))), array('controller' => 'Countries', 'action' => 'change', 'CR'), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('flag_countries/pa.png', array('alt' => 'Panamá', 'width'=>'48px', 'class'=>'PA'==$localCountry?'selected':'')), array('controller' => 'Countries', 'action' => 'change', 'PA'), array('escape'=>false));?>										
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('flag_countries/gt.png', array('alt' => 'Guatemala', 'width'=>'48px', 'class'=>'GT'==$localCountry?'selected':'')), array('controller' => 'Countries', 'action' => 'change', 'GT'), array('escape'=>false));?>										
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('flag_countries/sv.png', array('alt' => 'Salvador', 'width'=>'48px', 'class'=>'SV'==$localCountry?'selected':'')), array('controller' => 'Countries', 'action' => 'change', 'SV'), array('escape'=>false));?>										
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('flag_countries/hn.png', array('alt' => 'Honduras', 'width'=>'48px', 'class'=>'HN'==$localCountry?'selected':'')), array('controller' => 'Countries', 'action' => 'change', 'HN'), array('escape'=>false));?>										
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('flag_countries/ni.png', array('alt' => 'Nicaragua', 'width'=>'48px', 'class'=>'NI'==$localCountry?'selected':'')), array('controller' => 'Countries', 'action' => 'change', 'NI'), array('escape'=>false));?>										
			
			
			
			</div>
		</div>
            
            <?php echo $this->element('menu',array('cache' => array('time' => '+4 day'))); ?>
            
            <div id="content"> 
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
