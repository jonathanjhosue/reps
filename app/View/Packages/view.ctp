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
                $( "#divItinerary" ).accordion({autoHeight: false,collapsible: true,active:false,event: "mouseover",header:"div > h3" });
               
                $( "#tabs" ).tabs(); 
                $( "#tabsRate" ).tabs(); 
                
                $(".iframe").fancybox({
                   
                    "type" : "iframe",
                     "width" : 850,
                     "height" : 550
                });
                $("#ulHotels").jPaginate(    {cookies:false,items: 6, pagination_class: "paginateHotels",next:"'.__('Next').'",previous:"'.__('Previous').'"});
                $("#ulActivities").jPaginate({cookies:false,items: 6, pagination_class: "paginateActivities",next:"'.__('Next').'",previous:"'.__('Previous').'"});
                $("#ulExtensions").jPaginate({cookies:false,items: 6, pagination_class: "paginateExtensions",next:"'.__('Next').'",previous:"'.__('Previous').'"});
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


<div class="packages view">
    <div id="viewheader">
        <h1><?php echo __('Package'); ?></h1>
	<div id="gallery">
            
            <?php 
            for($i=0;$i<count($package['Image']);$i++): 
            if($package['Image'][$i]['image_name']) 
                echo '<a title="sdfs" alt="texto esxtesdf s" href="'.$this->request->webroot.'img/image/'.$package['Image'][$i]['dir'].'/800x400_'.$package['Image'][$i]['image_name'].'">'.
                    $this->Html->image('image/'.$package['Image'][$i]['dir'].'/90x45_'.$package['Image'][$i]['image_name']).
                    "</a>"; 
            endfor; ?>           	
        </div>     
        
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo $package['Product']['product_name']; ?></h1>
    </div>
    <div id="tabs">			
    <p>
    <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            //echo $this->Html->link(__('Add Review'), array('admin' => true, 'prefix' => 'admin','controller' => 'reviews', 'action' => 'add',$package['Product']['id'])); 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'packages', 'action' => 'edit',$package['Product']['id'])); 
         endif; 
         ?>
    </span>
        
    <label><?php echo __('Code')?>:</label><?php echo $package['Package']['code']; ?>&nbsp;&nbsp;&nbsp;   
    <label><?php echo __('Location')?>:</label><?php echo $package['Package']['tour_location']; ?>&nbsp;&nbsp;&nbsp;  
    <label><?php echo __('Days')?>:</label><?php echo $package['Package']['days']; ?>&nbsp;&nbsp;&nbsp; 
    <label><?php echo __('Nights')?>:</label><?php echo $package['Package']['nights']; ?>&nbsp;&nbsp;&nbsp; 
    <label class="price"><?php echo __('From US$'). $package['Package']['price_tag']. __(' per person')?> </label>
    </p>

    
    <ul>
            <li><a href="#tabs-1"><?php echo __('Overview'); ?></a></li>
            <li><a href="#tabs-2"><?php echo __('Itinerary'); ?></a></li>
            <li><a href="#tabs-3"><?php echo __('Lodging'); ?></a></li>
            <li><a href="#tabs-4"><?php echo __('Activities'); ?></a></li>
            <li><a href="#tabs-5"><?php echo __('Rates'); ?></a></li>
            <li><a href="#tabs-6"><?php echo __('Extensions'); ?></a></li>
    </ul>
	
    <!-- overview tab starts -->
    <div id="tabs-1"> 
        <p class="texto">
        <?php echo  $this->I18nKeys->getKeyByType($package['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?>
        </p>
        <p>            
            <label><?php echo __('Category')?>:</label><?php echo $package['PackageCategory']['category_name']; ?>&nbsp;&nbsp;&nbsp;  
            <label><?php echo __('Meeting Point')?>:</label><?php echo $package['MeetingPoint']['name']; ?>&nbsp;&nbsp;&nbsp;           
            <label><?php echo __('Tour Type')?>:</label><?php echo $package['Package']['tour_type']; ?>&nbsp;&nbsp;&nbsp;  
        </p>
        <p>            
        <label><?php echo __('Group Size')?>:&nbsp;</label>
            <label><?php echo __('Pax Min')?></label><?php echo $package['Package']['pax_min']; ?>&nbsp; 
            <label><?php echo __('Pax Max')?></label><?php echo $package['Package']['pax_max']; ?>&nbsp;  
        </p>

       

            <label><?php echo __('Important Information') ?>:</label>
            <p class="texto">
            <?php echo  $this->I18nKeys->getKeyByType($package['I18nKey'],  TiposGlobal::I18N_TYPE_PACKAGE_INFORMATION); ?>
            </p>
            
            <div id="divFeatures" >
		<?php echo $this->RipsWeb->getSuitableForList($package['Package']) ?>
            </div>

    </div>
    <!-- overview tab ends -->
	
	<!-- rooms tab starts -->
	<div id="tabs-2"> 
		
            <div id="divItinerary">
		<?php foreach($package['Itinerary'] as $itinerary): ?>
                <div>
                <h3>                   		
		    <a href="#">
                        <?php echo __('Day') ?>: <?php echo $itinerary['day_number'].':  '.$this->I18nKeys->getKeyByType($itinerary['I18nKey'],  TiposGlobal::I18N_TYPE_ITENERARY_HEADLINE) ?>
                   
                        <span class="spanEat">
                        <?php 
                        echo $itinerary['breakfast']!=""?'['.$itinerary['breakfast'].']':'';
                        echo $itinerary['lunch']!=""?'['.$itinerary['lunch'].']':'';
                        echo $itinerary['dinner']!=""?'['.$itinerary['dinner'].']':'';
                        
                       ?>
                    </span>
                         </a>
                </h3>							
		<div>
			
                    <p><?php echo  $this->I18nKeys->getKeyByType($itinerary['I18nKey'],  TiposGlobal::I18N_TYPE_ITENERARY_DESCRIPTION) ?></p>	
			                    
		</div>	
                </div>
		<?php endforeach; ?>
            </div>
		<!-- room category ends -->
	</div> 
	<!-- rooms tab ends -->			  
	
	<!-- features tab starts -->		
	<div id="tabs-3"> 
            <ul id="ulHotels" class="activitylist">
		 <?php foreach($package['Hotel'] as $product): ?>	
                    <li>      
                        <?php 
                            if(isset($product['Image'][0]['image_name'])){
                                echo $this->Html->image("image/".$product['Image'][0]['id']."/200x140_".$product['Image'][0]['image_name']);
                            }
                            else{
                                echo $this->Html->image("nodisponible.jpg");
                            }
                        ?>
                        <label ><?php echo  $product['Product']['product_name'] ?> </label>
                        <span><?php echo  $product['Product']['Location']['location_name'] ?> </span>
                        <br/>
                        <p><?php echo  $this->I18nKeys->getKeyByType($product['Product']['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?></p>
                        <span class="spanlink">
                            <?php  
                            echo $this->Html->link(__('[Click here for details]'), array('controller' => 'hotels', 'action' => 'view',$product['Product']['id']),array('class'=>'iframe')); 
                          ?>
                        </span>
                    </li> 
                 <?php endforeach; ?>	
                        					
            </ul>
	</div> 
	<!-- features tab ends -->		
	
	<!-- review tab starts -->		
	<div id="tabs-4"> 
            <ul id="ulActivities" class="activitylist">
		 <?php foreach($package['Activity'] as $product): ?>	
                    <li>      
                        <?php 
                            if(isset($product['Image'][0]['image_name'])){
                                echo $this->Html->image("image/".$product['Image'][0]['id']."/200x140_".$product['Image'][0]['image_name']);
                            }
                            else{
                                echo $this->Html->image("nodisponible.jpg");
                            }
                        ?>
                        <label ><?php echo  $product['Product']['product_name'] ?> </label>
                        <span><?php echo  $product['Product']['Location']['location_name'] ?> </span>
                        <br/>
                        <p><?php echo  $this->I18nKeys->getKeyByType($product['Product']['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?></p>
                        <span class="spanlink">
                            <?php  
                            echo $this->Html->link(__('[Click here for details]'), array('controller' => 'activities', 'action' => 'view',$product['Product']['id']),array('class'=>'iframe')); 
                          ?>
                        </span>
                    </li> 
                 <?php endforeach; ?>	
                        					
            </ul>		
              						
	</div>
	<!-- review tab ends -->
        
        
      
		
	<!-- rates tab starts -->	

	<div id="tabs-5"> 
			<!-- room category starts -->
            <div id="tabsRate">           
             <table class="jtable" style="width: 100%;">
            <thead>
                    <tr>
                            <th><?php echo ('Season') ?></th>
                            <th><?php echo __('Rates (Dbl)') ?></th>
                            <th><?php echo __('Single.Sup') ?></th>
                            <th><?php echo __('Triple.Disc') ?></th>
                            <th><?php echo __('Child.D.') ?> </th>
                            <th><?php echo __('Infant.D.')?> </th>
                    </tr>
            </thead>
                    <tbody>
                    <?php foreach($package['Rate'] as $rate): ?>
                    <tr>
                            <td> <?php echo __('From: ').$rate['Season']['date_start'].' '.__('To: ').$rate['Season']['date_end']; ?></td>
                            <td><?php echo $rate['double']; ?></td>
                            <td><?php echo $rate['single']; ?></td>
                            <td><?php echo $rate['triple']; ?></td>
                            <td><?php echo $rate['child']; ?></td>
                            <td><?php echo $rate['infant']; ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
            </table>      
            </div>
            <div id="divIncludeNotes">
                <fieldset class="jfieldset">
                    <legend><?php echo __('Includes') ?></legend>
                    <ul>
                        <?php foreach( $package['IncludeNote'] as $item): ?>
                        <li><?php echo $item['I18nKey'][0]['value'] ?></li>
                         <?php endforeach?>
                    </ul>
                </fieldset>
                 <fieldset  class="jfieldset">
                    <legend><?php echo __('Excludes') ?></legend>
                    <ul>
                        <?php foreach( $package['ExcludeNote'] as $item): ?>
                        <li><?php echo $item['I18nKey'][0]['value'] ?></li>
                         <?php endforeach?>
                    </ul>
                 </fieldset>
            </div>
        </div>
                
        <!-- Activities tab starts -->		
	<div id="tabs-6"> 
	 
            <ul id="ulExtensions" class="activitylist">
		  <?php foreach($package['Extension'] as $product): ?>	
                    <li>      
                        <?php 
                            if(isset($product['Image'][0]['image_name'])){
                                echo $this->Html->image("image/".$product['Image'][0]['id']."/200x140_".$product['Image'][0]['image_name']);
                            }
                            else{
                                echo $this->Html->image("nodisponible.jpg");
                            }
                        ?>
                        <label ><?php echo  $product['Product']['product_name'] ?> </label>
                        <span><?php echo  $product['tour_location'] ?> </span>
                        <br/>
                        <p><?php echo  $this->I18nKeys->getKeyByType($product['Product']['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?></p>
                        <span class="spanlink">
                            <?php  
                            echo $this->Html->link(__('[Click here for details]'), array('controller' => 'packages', 'action' => 'view',$product['Product']['id']),array('class'=>'iframe')); 
                          ?>
                        </span>
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

  <pre><?php //print_r($package); ?></pre>