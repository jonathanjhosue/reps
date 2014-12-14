<?php 
/*
	if ($_SESSION['language'] == 1){ include('esview.ctp'); }
	elseif($_SESSION['language'] == 2){ include('enview.ctp'); }
	else{ include('enview.ctp'); }
 * 
 */
?>
 <?php pr($xx); ?>
<?php pr($result); ?>

<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla. 
	//incluye en el view las instrucciones JavaScript para el control del tabpanel.

   //echo $this->Html->script('easypaginate/easypaginate.min.js');  
   //echo $this->Html->css('easypaginate/easypaginate.css');
    echo $this->Html->script('jPaginate.js');       
	echo $this->Html->script('fancybox/jquery.fancybox-1.3.4.pack.js');  
        echo $this->Html->css('fancybox/jquery.fancybox-1.3.4.css');
        echo $this->Html->scriptBlock('
            /*$(window).load(function() {
                $("#slider").nivoSlider({
                pauseTime:5000
                });
            });*/
            $(function() {
                $( "#divItinerary" ).accordion({autoHeight: false,collapsible: true,active:false,event: "mouseover",header:"div > h3" });
               
                $( "#tabs" ).tabs(); 
                $( "#tabsRate" ).tabs(); 
                 $( "input:submit" ).button(); 
                 $( "input:reset" ).button();
                $(".iframe").fancybox({
                   
                    "type" : "iframe",
                     "width" : 850,
                     "height" : 560
                });
                $("#divItinerary").jPaginate({cookies:false,items: 10,pagination_class: "paginateItinerary",next:"'.__('Next').'",previous:"'.__('Previous').'"});  
                /*$("#divItinerary").easyPaginate({
                    step: 5,
                    nextprev:false,
                    numeric:true
                }); */
                            
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
    echo $this->Html->script('galleria/themes/classic/galleria.classic.min.js');       
     echo $this->Html->scriptBlock('
           $(function() {
            $("#gallery").galleria({
                    width: 600,
                    height: 270,
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


<div class="vehicle view">
    	
    <!-- overview tab starts -->
    <div id="tabs-1"> 
        <?php echo $this->Form->create('ShoppingVehicle', array('id'=>'formReserve','url'=>'/ShoppingCars/addVehicle')) ?>
        
                <fieldset id="fieldsetAditionalService">
                <legend><?php echo __('Aditional Services') ?></legend>
                <ul>
                    <?php foreach($vehicle['Rentacar']['AditionalService'] as $i =>$aditionalService): ?>
                    <li>
                        <?php 
                            echo $this->Form->input("AditionalService.$i",array( 'type'=>'checkbox','label'=>$aditionalService['name']));
                    
                        ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                
                <label><?php echo __('Notes') ?>:</label>
                <p>
                <?php 
                 //echo $vehicle['Rentacar']['I18nKey']['0']['value'] ;
                 echo  $this->I18nKeys->getKeyByType($vehicle['Rentacar']['I18nKey'],  TiposGlobal::I18N_TYPE_RENTACAR_SERVICENOTES);
                 ?>
                </p>
            </fieldset>
            <fieldset>
                  <legend><?php echo __('Reserve') ?></legend>
                 <?php 
                 echo $this->Form->input("units",array('type'=>'text','label'=>__('# Vehicles'),'div'=>'number','maxlength'=>2));

                 echo $this->Form->input("adults",array('type'=>'text','div'=>'number','maxlength'=>2));
                 echo $this->Form->input("childrens",array('type'=>'text','div'=>'number','maxlength'=>2));
                 echo $this->Form->input("infants",array('type'=>'text','div'=>'number','maxlength'=>2));
                 
                 ?>
            </fieldset>
            <?php 
            
            ?>
            <fieldset>
                  <legend><?php echo __('Vehicle Collection/PickUp') ?></legend>
                  <?php 
                 echo $this->Form->input("pickup_date",array('label'=>'Date','type' => 'date'));
                 echo $this->Form->input("pickup_time",array('label'=>'Time','type' => 'time', 'interval' => 15));
                 echo $this->Form->input("pickup_location",array('label'=>'Location','options'=>$locationsRentacar));
                 ?>
            </fieldset>
            
            <fieldset>
                  <legend><?php echo __('Vehicle Return/DropOff') ?></legend>
                 <?php 
                 echo $this->Form->input("dropoff_date",array('label'=>'Date','type' => 'date'));
                 echo $this->Form->input("dropoff_time",array('label'=>'Time','type' => 'time', 'interval' => 15));
                 echo $this->Form->input("dropoff_location",array('label'=>'Location','options'=>$locationsRentacar));
                 ?>
            </fieldset>
            
        
             <fieldset class="hotelsActions"> 
                 <label  class="price"><?php echo __('Total Fare US$')?><span id="totalFare"> <span> </label>
            <?php 
                echo $this->Form->submit(__('Add to Shopping Car'),array('name'=>'data[Action][AddShoppingCar]'));
                 echo $this->Form->submit(__('ReserveNow'),array('name'=>'data[Action][AddShoppingCar]'));
                  echo $this->Form->reset(__('Clear Form'),array('name'=>'data[Action][Reset]'));
              
            ?>  
         </fieldset>
            
 
        <?php echo $this->Form->end(__('Submit'));?>
        

    </div>
    <!-- overview tab ends -->
	
    <!-- rooms tab starts -->
    <div id="tabs-2"> 
         <ul>
            <?php foreach($vehicle['Rentacar']['TipsAndSafety'] as $tipsAndSafety): ?>
            <li>
                <?php 
                 echo  $this->I18nKeys->getKeyByType($tipsAndSafety['I18nKey'],  TiposGlobal::I18N_TYPE_RENTACAR_TIPSANDSAFETY);
                   
                ?>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>


    <!-- rates tab ends -->	          	
</div>
<!--
<div class="actions">
	 <ul>
		  <li><a href="/beta/Packages/edit/1">Edit Package</a></li>
		  <li><a onClick="return confirm('Are you sure you want to delete this Package?');" href="/beta/Packages/delete/1">Delete Package</a></li>
		  <li><a href="/beta/Packages">List Packages</a></li>
		  <li><a href="/beta/Packages/add">New Package</a></li>
	 </ul>
</div>
-->
</div>
<pre><?php //print_r($activities); ?></pre>
