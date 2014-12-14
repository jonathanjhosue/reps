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
            /*$(window).load(function() {
                $("#slider").nivoSlider({
                pauseTime:5000
                });
            });*/
            $(function() {
                $( "#tabs" ).tabs(); 
                $( "#tabsRate" ).tabs(); 
                 $( "input:submit" ).button(); 
                 $( "input:reset" ).button();
                $(".iframe").fancybox({
                   
                    "type" : "iframe",
                     "width" : 850,
                     "height" : 560
                });
               
                            
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
    echo $this->Html->script('galleria/themes/classic/galleria.classic.min.js');       
     echo $this->Html->scriptBlock('
           $(function() {
            $("#gallery").galleria({
                    width: 600,
                    height: 270,
                    imageCrop: true,
                    imagePan:false,
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


<div class="flight view">
    <div class="divLigthbox">
        <!--h1><?php echo __('Flight'); ?></h1-->
       <div id="gallery">

        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_1.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_1.jpg'); ?>
         </a> 
        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_2.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_2.jpg'); ?>
         </a>    
        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_3.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_3.jpg'); ?>
         </a>    
        <a title="" alt="" href="<?php echo $this->request->webroot.'img/flights/800x400_4.jpg' ?>">
            <?php echo $this->Html->image('flights/90x45_4.jpg'); ?>
         </a>    
        </div>     
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo $flight['Flight']['type']; ?></h1>
    </div>
    <div id="tabs" class="divLigthbox">			
    <p>
    <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            //echo $this->Html->link(__('Add Review'), array('admin' => true, 'prefix' => 'admin','controller' => 'reviews', 'action' => 'add',$package['Product']['id'])); 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'flights', 'action' => 'edit',$flight['Product']['id'])); 
         endif; 
         ?>
    </span>
    </p>
    <div  class="descriptionLabels">
    <table border="0px">
        <tr>    
    <td><label><?php echo __('Leaving From')?>:</label></td><td><?php echo $flight['FlightFrom']['name']; ?>&nbsp;&nbsp;</td>
    <td><label><?php echo __('Flying To')?>:</label></td><td><?php echo $flight['FlightTo']['name']; ?>&nbsp;&nbsp;</td>       
    <td><label><?php echo __('Flight Number')?>:</label></td><td><?php echo $flight['Flight']['flight_number']; ?>&nbsp;&nbsp;</td>   
    </tr><tr>
    <td><label><?php echo __('Scales')?>:</label></td><td><?php echo $flight['Flight']['scale']; ?>&nbsp;&nbsp;</td> 
    <td><label><?php echo __('Duration')?>:</label></td><td><?php echo $flight['Flight']['duration']; ?>&nbsp;&nbsp;</td>
    <td><label><?php echo __('Frequency')?>:</label></td><td><?php echo $flight['Flight']['frequency']; ?>&nbsp;&nbsp;</td>
    </tr><tr>
    <td><label><?php echo __('Capacity')?>:</label></td><td><?php echo $flight['Flight']['capacity']; ?>&nbsp;&nbsp;</td>  
    <td><label><?php echo __('Departure')?>:</label></td><td><?php echo $flight['Flight']['departure']; ?>&nbsp;&nbsp;</td> 
    <td><label><?php echo __('Arrival')?>:</label></td><td><?php echo $flight['Flight']['arrival']; ?>&nbsp;&nbsp;</td>
    </tr><tr>
    <td><label><?php echo __('Aircraft')?>:</label></td><td><?php echo $flight['Flight']['aircraft']; ?>&nbsp;&nbsp;</td> 
    <td><label><?php echo __('Max Weight')?>:</label></td><td><?php echo $flight['Flight']['max_weight']; ?>&nbsp;&nbsp;</td> 
    <td><label><?php echo __('Hr Waiting')?>:</label></td><td><?php echo $flight['Flight']['hr_waiting']; ?>&nbsp;&nbsp;</td> 
    </tr><tr>
    <td><label class="price"><?php echo __('One Way Fare')?>:</label></td><td><?php echo $flight['Flight']['oneway_fare']; ?>&nbsp;&nbsp;</td>    
    <td><label class="price"><?php echo __('Return Fare')?>:</label></td><td><?php echo $flight['Flight']['return_fare']; ?>&nbsp;&nbsp;</td>
    <td><label class="price"><?php echo __('Round Trip')?>:</label></td><td><?php echo $flight['Flight']['round_trip']; ?>&nbsp;&nbsp;</td> 

    </tr>
    </table>
    <br><?php echo __('* blank spaces does not apply for this flight'); ?>
       
    <label class="price"><?php //echo __('From US$'). $flight['Flight']['luggage']. __(' per person')?> </label>
        </p>

    </div>  
    
    <ul>
            <li><a href="#tabs-1"><?php echo __('Reserve Now'); ?></a></li>
            <li><a href="#tabs-2"><?php echo __('Tips & Safety'); ?></a></li>
    </ul>
	
    <!-- overview tab starts -->
    <div id="tabs-1"> 
        <form id="formReserve">
            
         <fieldset id="">
                <legend><?php echo __('Aditional Services') ?></legend>
                <ul>
                    <?php foreach($flight['Flight']['AditionalService'] as $i =>$aditionalService): ?>
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
                 /*echo $flight['Flight']['I18nKey']['0']['value'] ;
                 echo  $this->I18nKeys->getKeyByType($flight['Flight']['I18nKey'],  TiposGlobal::I18N_TYPE_FLIGHT_SERVICENOTES);*/
                 ?>
                </p>
            </fieldset>
            <?php 
            
            ?>
      
            
            
            
            
            <fieldset class="hotelsActions"> 
                 <label  class="price"><?php echo __('Total Fare US$')?><span id="totalFare"> <span> </label>
            <?php 
                echo $this->Form->submit(__('Add to Shopping Car'),array('name'=>'data[Action][AddShoppingCar]'));
                 echo $this->Form->submit(__('ReserveNow'),array('name'=>'data[Action][AddShoppingCar]'));
                  echo $this->Form->reset(__('Clear Form'),array('name'=>'data[Action][Reset]'));
              
            ?>  
         </fieldset>
 
        </form>
        

    </div>
    <!-- overview tab ends -->
	
    <!-- rooms tab starts -->
    <div id="tabs-2"> 
         <ul>
            <?php foreach($flight['TipsAndSafety'] as $tipsAndSafety): ?>
            <li>
                <?php 
                 echo  $this->I18nKeys->getKeyByType($tipsAndSafety['I18nKey'],  TiposGlobal::I18N_TYPE_FLIGHT_TIPSANDSAFETY);
                   
                ?>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>


    <!-- rates tab ends -->	          	
</div>
</div>
<pre><?php //print_r($activities); ?></pre>

  <pre><?php //print_r($flight); ?></pre>