<?php 
/*
	if ($_SESSION['language'] == 1){ include('esview.ctp'); }
	elseif($_SESSION['language'] == 2){ include('enview.ctp'); }
	else{ include('enview.ctp'); }
 * 
 */
?>

<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla. 
	//incluye en el view las instrucciones JavaScript para el control del tabpanel.

   //echo $this->Html->script('easypaginate/easypaginate.min.js');  
   //echo $this->Html->css('easypaginate/easypaginate.css');
    echo $this->Html->script('jPaginate.js');       
	echo $this->Html->script('fancybox/jquery.fancybox-1.3.4.pack.js');  
        echo $this->Html->css('fancybox/jquery.fancybox-1.3.4.css');
        echo $this->Html->scriptBlock('

            $(function() {
               
                $( "#tabs" ).tabs(); 
                $( "#tabsRate" ).tabs(); 
                
                $(".iframe").fancybox({
                   
                    "type" : "iframe",
                     "width" : 850,
                     "height" : 550
                });
                
                            
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
    echo $this->Html->script('galleria/themes/classic/galleria.classic.min.js');       
     echo $this->Html->scriptBlock('
           $(function() {
            $("#gallery").galleria({
                    width: 800,
                    height: 330,
                    imageCrop: true,
                    imagePan:true,
                    debug:false,                 
                     transition: "fade",
                     autoplay: 5500,
                     carousel:true,
                     imageMargin:0            
                });
            })', array('allowCache'=>true,'safe'=>true,'inline'=>false));
	//echo $this->Html->scriptBlock($jsGalleryDec, array('allowCache'=>true,'safe'=>true,'inline'=>false));
	
	//echo $this->element('v_nav_regions',array('cache' => array('time' => '+1 day')));
	
	//print_r($_SESSION);
     ?>


<div class="rentacars view">
    <div id="viewheader">
        <h1><?php echo __('Rentacar'); ?></h1>
	<div id="gallery">
            
            <?php 
            for($i=0;$i<count($rentacar['Image']);$i++): 
            if($rentacar['Image'][$i]['image_name']) 
                echo '<a title="sdfs" alt="texto esxtesdf s" href="'.$this->request->webroot.'img/image/'.$rentacar['Image'][$i]['dir'].'/800x400_'.$rentacar['Image'][$i]['image_name'].'">'.
                    $this->Html->image('image/'.$rentacar['Image'][$i]['dir'].'/90x45_'.$rentacar['Image'][$i]['image_name']).
                    "</a>"; 
            endfor; ?>           	
        </div>     
        
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo $rentacar['Product']['name']; ?></h1>
    </div>
    <div id="tabs">			
    <p>
    <ul>
            <li><a href="#tabs-1"><?php echo __('Rentacars'); ?></a></li>
            <li><a href="#tabs-2"><?php echo __('Flights'); ?></a></li>
            <li><a href="#tabs-3"><?php echo __('Ground Transfers'); ?></a></li>
    </ul>
	
    <!-- overview tab starts -->
    <div id="tabs-1"> 
        <p class="texto">
        </p>
        <p>            
            <label><?php echo __('Category')?>:</label><?php echo $rentacar['PackageCategory']['category_name']; ?>&nbsp;&nbsp;&nbsp;  
            <label><?php echo __('Meeting Point')?>:</label><?php echo $rentacar['MeetingPoint']['name']; ?>&nbsp;&nbsp;&nbsp;           
            <label><?php echo __('Tour Type')?>:</label><?php echo $rentacar['Rentacar']['tour_type']; ?>&nbsp;&nbsp;&nbsp;  
        </p>
        <p>            
        <label><?php echo __('Group Size')?>:&nbsp;</label>
            <label><?php echo __('Pax Min')?></label><?php echo $rentacar['Rentacar']['pax_min']; ?>&nbsp; 
            <label><?php echo __('Pax Max')?></label><?php echo $rentacar['Rentacar']['pax_max']; ?>&nbsp;  
        </p>

       

            <label><?php echo __('Important Information') ?>:</label>
            <p class="texto">
            <?php echo  $this->I18nKeys->getKeyByType($rentacar['I18nKey'],  TiposGlobal::I18N_TYPE_PACKAGE_INFORMATION); ?>
            </p>
            
            <div id="divFeatures" >
		<?php echo $this->RipsWeb->getSuitableForList($rentacar['Rentacar']) ?>
            </div>

    </div>
    <!-- overview tab ends -->
	</div>
<pre><?php //print_r($activities); ?></pre>

  <pre><?php print_r($rentacar); ?></pre>