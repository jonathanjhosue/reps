<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('PanamaReps: Product Catalogue:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

        echo $this->Html->css('south-street/jquery-ui.css');
	echo $this->Html->script('jquery.js');
        echo $this->Html->script('jquery-ui.js');
        echo $this->Html->script('view.js');
		echo $scripts_for_layout;
     

         //echo $this->Html->css('nivoslider/themes/default/default.css');
         /*echo $this->Html->css('nivoslider/themes/pascal/pascal.css');
         echo $this->Html->css('nivoslider/themes/orman/orman.css');*/
         // echo $this->Html->css('nivoslider/nivo-slider.css');
        
         /* echo $this->Html->script('jquery.nivo.slider.js');*/
        echo $this->Html->script('galleria/galleria-1.2.6.min.js');   
        

                
             echo $this->Html->css('desing_style.css');
          

  echo $this->Html->script('fancybox/jquery.fancybox-1.3.4.pack.js');  
  echo $this->Html->css('fancybox/jquery.fancybox-1.3.4.css');



	?>
    	<!--[if IE]> <?php echo $this->Html->css('ie.css'); ?> <![endif]-->
    	
    	<?php
  echo $this->Html->scriptBlock('

            $(function() {
            
             $(".iframe").fancybox({
                   
                    "type" : "iframe",
                     "width" : 650,
                     "height" : 560
                });
                
                $("tr.record").bind("click", function(){
                    $.fancybox({
                        "width" : 650,
                        "height": 560,
                        "type"  : "iframe",
                        "href"  : $(this).attr("itemid")
                    });

                });
                
                              
                $(".iframeBig").fancybox({
                   
                    "type" : "iframe",
                     "width" : 820,
                     "height" : 660
                });
                
                $("tr.record").bind("click", function(){
                    $.fancybox({
                        "width" : 820,
                        "height": 660,
                        "type"  : "iframe",
                        "href"  : $(this).attr("itemid")
                    });

                });
                            
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>true));
?>

</head>
<body>
    <?php //echo $this->Session->read("Config.language") ?>
    <?php 
$localLanguage=$this->Session->read("Config.language_only") ;
$localCountry =$this->Session->read("Config.country") ;

?>
    <!--div id="barCountry" class="bar">				
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
			
			
			
			</div-->
	<div id="container">
		<!--div id="header">
			<h1><?php echo $this->Html->link(__('Reps: Product Catalogue', true), '../'); ?></h1>
                        <div id="menubar">
				<?php 	
					if(isset($_SESSION['Auth']['User'])){ 
							echo $this->Html->link($this->Html->image('_log_out.png', array('alt' => 'Login', 'width'=>'24px')), array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); 
						}else{ echo $this->Html->link($this->Html->image('_log_in.png', array('alt' => 'Login', 'width'=>'15px')), array('controller' => 'users', 'action' => 'login'), array('escape'=>false)); }
				?>
				&nbsp;&nbsp;					
				<?php echo $this->Html->link($this->Html->image('_espanol_flag.png', array('alt' => 'Español', 'width'=>'24px')), array('controller' => 'Languages', 'action' => 'changeLanguage', 'id'=>1), array('escape'=>false)); ?>
				&nbsp;&nbsp;
				<?php	echo $this->Html->link($this->Html->image('_english_flag.png', array('alt' => 'English', 'width'=>'24px')), array('controller' => 'Languages', 'action' => 'changeLanguage', 'id'=>2), array('escape'=>false));?>						
			</div>
		</div-->
		<div id="content"> <!-- este es el pagecell1 del template-->						
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<div id="siteInfo"> 
				<!-- <a href="http://www.panamareps.com/home/aboutus/company.php">About Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy Policy</a> | <a href="http://www.panamareps.com/home/contactus/contactus.php">Contact Us</a> | &copy;--> 
                                <?php //echo __('2012 | Costa Rica Reps DMC and its logo are registered Trade Marks'); ?>
                                	
			</div>
		</div>
	</div>
	<?php //pr( $this->element('sql_dump')); ?>
    <?php //pr( $this->Session->read()); ?>
</body>
</html>
