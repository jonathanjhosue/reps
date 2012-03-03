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
	
        echo $this->Html->scriptBlock('
            /*$(window).load(function() {
                $("#slider").nivoSlider({
                pauseTime:5000
                });
            });*/
            $(function() {
                $( "#tabs" ).tabs(); 
                
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
                   /* imagePanSmoothness:12,*/
                     transition: "fade",
                     autoplay: 5500,
                     carousel:true,
                     imageMargin:0,
                    /* thumbnails:"empty",*/
              /*  extend: function(options) {

                        Galleria.log(this) // the gallery instance
                        Galleria.log(options) // the gallery options

                        // listen to when an image is shown
                        this.bind("image", function(e) {

                            Galleria.log(e) // the event object may contain custom objects, in this case the main image
                            Galleria.log(e.imageTarget) // the current image

                            // lets make galleria open a lightbox when clicking the main image:
                            $(e.imageTarget).click(this.proxy(function() {
                            this.openLightbox();
                            }));
                        });
                    }*/
                });
            })', array('allowCache'=>true,'safe'=>true,'inline'=>false));
	//echo $this->Html->scriptBlock($jsGalleryDec, array('allowCache'=>true,'safe'=>true,'inline'=>false));
	
	//echo $this->element('v_nav_regions',array('cache' => array('time' => '+1 day')));
	
	//print_r($_SESSION);
?>


<div class="hotels view">
    <div id="viewheader">
	<div id="gallery">          
            <?php for($i=0;$i<count($hotel['Image']);$i++): 
            if($hotel['Image'][$i]['image_name']) 
                echo '<a title="sdfs" alt="texto esxtesdf s" href="'.$this->request->webroot.'img/image/'.$hotel['Image'][$i]['dir'].'/800x400_'.$hotel['Image'][$i]['image_name'].'">'.
                    $this->Html->image('image/'.$hotel['Image'][$i]['dir'].'/90x45_'.$hotel['Image'][$i]['image_name']).
                    "</a>"; 
            endfor; ?>           	
        </div>     
        
    <h1 style="top: -35px;bottom: -35px;left:10px; display: inline; position: relative;"><?php echo $hotel['Product']['product_name']; ?></h1>
    </div>
    <div id="tabs">

				
    <p>
    <label><?php echo __('Category')?>:</label><?php echo $hotel['HotelCategory']['category_name']; ?>&nbsp;&nbsp;&nbsp;  
    <label><?php echo __('Location')?>:</label><?php echo $hotel['Product']['Location']['location_name'].', '.$hotel['Product']['Location']['Region']['region_name']; ?>&nbsp;&nbsp;&nbsp;  
    <label><?php echo __('Total Rooms')?>:</label><?php echo $hotel['Hotel']['total_rooms']; ?>&nbsp;&nbsp;&nbsp; 
    <span class="admin_bar">
        <?php if ($this->Session->check('Auth.User.id')): 
            echo $this->Html->link(__('Edit'), array('admin' => true, 'prefix' => 'admin','controller' => 'hotels', 'action' => 'edit',$hotel['Product']['id'])); 
         endif; ?>
    </span>
    </p>

    
    <ul>
		<li><a href="#tabs-1"><?php echo __('Overview'); ?></a></li>
		<li><a href="#tabs-2"><?php echo __('Rooms'); ?></a></li>
		<li><a href="#tabs-3"><?php echo __('Features'); ?></a></li>
                <li><a href="#tabs-4"><?php echo __('Reviews'); ?></a></li>
                <li><a href="#tabs-5"><?php echo __('Activities'); ?></a></li>
                <li><a href="#tabs-6"><?php echo __('Rates'); ?></a></li>
	</ul>
	
	<!-- overview tab starts -->
	<div id="tabs-1"> 
            <p>
            <label><?php echo __('Check in Time') ?>:</label><?php echo $hotel['Hotel']['check_in']; ?>&nbsp;</span> &nbsp;&nbsp;&nbsp;  
            <label><?php echo __('Check Out Time') ?>:</label><?php echo $hotel['Hotel']['check_out']; ?>&nbsp;</span>   
            </p>
           
                <label><?php echo __('Description') ?>:</label>
            <p class="texto">
            <?php echo  $this->I18nKeys->getKeyByType($hotel['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION); ?>
            </p>

            <label><?php echo __('Directions') ?>:&nbsp;&nbsp;&nbsp;</label>
                <label><?php echo __('Gps Coordinates')?>:&nbsp;</label>
                <label>N:&nbsp;</label><?php echo $hotel['Product']['gpslatitude']; ?>&nbsp; 
                <label>E:&nbsp;</label><?php echo $hotel['Product']['gpslongitude']; ?>&nbsp;

                <p class="texto">
                <?php echo  $this->I18nKeys->getKeyByType($hotel['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION); ?>
                </p>
                
                <div id="mapaGoogle">
                <?php if($hotel['Product']['map']!=''): 
                    $link= str_replace("&","&amp;",$hotel['Product']['map']); 
                    ?>
                   <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $link.'&amp;output=embed' ?>">

                    </iframe><br />
                    <small><a href="<?php echo $link.'&amp;source=embed'; ?>" target="_blank" style="color:#0000FF;text-align:left"><?php echo __('Ver mapa más grande') ?></a></small>
                <?php endif; ?>
                    </div>
	</div>
	<!-- overview tab ends -->
	
	<!-- rooms tab starts -->
	<div id="tabs-2"> 
		
		<!-- room category starts -->
		<?php foreach($hotel['Room'] as $room): ?>
		
                <p class="clsRoom">
                    <span class="room_title"><label><?php echo __('Category') ?>:</label> <?php echo $room['category']; ?></span >&nbsp;&nbsp;&nbsp;		
				<label><?php echo __('Rooms') ?>:</label> <?php echo $room['count']; ?>&nbsp;											
		</p>							
		<div class="clsRoom">
			
                    <p><?php echo  $this->I18nKeys->getKeyByType($room['I18nKey'],  TiposGlobal::I18N_TYPE_ROOM_DESCRIPTION) ?></p>	
			
			
                    <div class="clsAmenities">
                            <label><?php echo __('Amenities')?>:</label> 					
                                <?php echo $this->RipsWeb->getAmenitiesList($room) ?>					
                    </div>
		</div>
		
		<hr />
		<?php endforeach; ?>
		<!-- room category ends -->
	</div> 
	<!-- rooms tab ends -->			  
	
	<!-- features tab starts -->		
	<div id="tabs-3"> 
            <div id="divFeatures" class="">
		<?php echo $this->RipsWeb->getFeaturesList($hotel['Hotel']) ?>
            </div>
            <hr/>
            <div id="divDiningAndDrinking">
                <label><?php echo __('Dining & Drinking')?></label>                       
                    <?php echo $this->RipsWeb->getDiningAndDrinkingList($hotel['Hotel']) ?>            
                <p>
                     <?php echo  $this->I18nKeys->getKeyByType($hotel['I18nKey'],  TiposGlobal::I18N_TYPE_HOTEL_DININGANDDRINKING); ?>
                </p>
            </div>
	</div> 
	<!-- features tab ends -->		
	
	<!-- review tab starts -->		
	<div id="tabs-4"> 
	  		
                <fieldset class="jfieldset">
                        <legend ><?php echo __('Staff Reviews') ?>:</legend>
                        <?php foreach($hotel['Product']['StaffReview'] as $review): ?>		
                        <p class='review_texto'>                    
                            <q><?php echo  $this->I18nKeys->getKeyByType($review['I18nKey'],  TiposGlobal::I18N_TYPE_REVIEW); ?> </q>
                           <span><?php echo $review['review_date']; ?></span>
                        </p>  	
                        
                        <?php endforeach; ?>
                </fieldset>	

                <fieldset class="jfieldset">
                        <legend ><?php echo  __('Traveller Reviews')?>:</legend>

                        <?php foreach($hotel['Product']['TravellerReview'] as $review): ?>	
                         <p class='review_texto'>                    
                            <q><?php echo  $this->I18nKeys->getKeyByType($review['I18nKey'],  TiposGlobal::I18N_TYPE_REVIEW); ?> </q>
                           <span><?php echo $review['review_date']; ?></span>
                        </p> 
                        <?php endforeach; ?>
                </fieldset>							
	</div>
	<!-- review tab ends -->
        
        
        <!-- Activities tab starts -->		
	<div id="tabs-5"> 
	  <br />
		<div>
			
                        					
		</div>
	</div>
	<!-- Activities tab ends -->	
        
		
	<!-- rates tab starts -->	

	<div id="tabs-6"> 
			<!-- room category starts -->
			<?php foreach($hotel['Room'] as $room): 
						$altrow = true;
			?>
			<div>			
			   <p class="clsRoom">
                            <span class="room_title"><label><?php echo __('Category') ?>:</label>&nbsp;<?php echo $room['category']; ?></span>&nbsp;&nbsp;&nbsp;												
				</p>							
						
                                <table class="jtable" style="width: 100%;">
					<thead>
						<tr>
							<th><?php echo ('Season') ?></th><th>Sgl</th><th>Dbl</th><th>Tpl</th><th>Qdlp</th>
                                                        <th><?php echo ('Child') ?> <?php echo $hotel['Hotel']['child_age_min'].'-'.$hotel['Hotel']['child_age_max'].' y/o' ?></th>
                                                        <th><?php echo ('Infant')?> <?php echo $hotel['Hotel']['infant_age_min'].'-'.$hotel['Hotel']['infant_age_max'].' y/o' ?></th>
                                                </tr>
                                        </thead>
                                                <tbody>
						<?php foreach($room['RoomRate'] as $roomRate): ?>
						<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
                                                        <td> <?php echo __('From: ').$roomRate['Season']['date_start'].' '.__('To: ').$roomRate['Season']['date_end']; ?></td>
							<td><?php echo $roomRate['single']; ?></td>
							<td><?php echo $roomRate['double']; ?></td>
							<td><?php echo $roomRate['triple']; ?></td>
							<td><?php echo $roomRate['quadruple']; ?></td>
                                                        <td><?php echo $roomRate['child']; ?></td>
                                                        <td><?php echo $roomRate['infant']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			           
                        <p>
                            <label><?php echo __('Room Rate Includes')?>: </label> <span><?php echo $this->I18nKeys->getKeyByType($room['I18nKey'],  TiposGlobal::I18N_TYPE_ROOM_INCLUDE); ?>&nbsp;</span>												
			</p>
                        <hr/>
			<!-- room category ends -->
			<?php endforeach; ?>	
                       <br/>
                       
                       <fieldset class="jfieldset">
                    <legend class="tab"><?php echo __('Notes') ?>: </legend>
                    
                    <?php echo $this->I18nKeys->getKeyByType($hotel['I18nKey'],  TiposGlobal::I18N_TYPE_HOTEL_ROOMNOTES);?>												
                </fieldset>
              
                        
	
	<!-- rates tab ends -->	          	
</div>
<!--
<div class="actions">
	 <ul>
		  <li><a href="/beta/Hotels/edit/1">Edit Hotel</a></li>
		  <li><a onClick="return confirm('Are you sure you want to delete this Hotel?');" href="/beta/Hotels/delete/1">Delete Hotel</a></li>
		  <li><a href="/beta/Hotels">List Hotels</a></li>
		  <li><a href="/beta/Hotels/add">New Hotel</a></li>
	 </ul>
</div>
-->
</div>
<pre><?php //print_r($deb); ?></pre>

  <pre><?php //print_r($hotel); ?></pre>