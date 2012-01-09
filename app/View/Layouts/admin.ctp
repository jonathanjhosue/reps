<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
 
 	/*if(isset($_SESSION['language']))
	{
		$_SESSION['language']=2;
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('PanamaReps: Content Management System Home:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 style="float:left;"><?php echo $html->link(__('PanamaReps: Content Management System', true), '../'); ?></h1>
			<div style="float:right;">
				<?php echo $html->link($html->image('_log_out.png', array('alt' => 'Login', 'width'=>'15%')), array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php echo $html->link($html->image('_espanol_flag.png', array('alt' => 'Español', 'width'=>'15%')), array('controller' => 'Languages', 'action' => 'changeLanguage', 'id'=>1), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php	echo $html->link($html->image('_english_flag.png', array('alt' => 'English', 'width'=>'15%')), array('controller' => 'Languages', 'action' => 'changeLanguage', 'id'=>2), array('escape'=>false));?>										
			</div>
		</div>
		<div id="content"> <!-- este es el pagecell1 del template-->						
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<div id="siteInfo"> 
				<!-- <a href="http://www.panamareps.com/home/aboutus/company.php">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="http://www.panamareps.com/home/contactus/contactus.php">Contact Us</a> | --> &copy;2010 | Panama Reps DMC and its logo are registered Trade Marks	
			</div>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
