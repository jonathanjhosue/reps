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
	echo $this->Html->css('cake.cms.css', null, array("inline"=>false));
	echo $this->Html->script('jquery.js');
	echo $this->Html->script('tabcontrol.js');
	echo $this->Html->scriptBlock($jsGalleryDec, array('allowCache'=>true,'safe'=>true,'inline'=>false));
	
	echo $this->element('v_nav_regions');
	
	print_r($_SESSION);
?>

<div class="hotels view">
  
	<div>
		<p><?php echo $this->Html->image('hotels/'.$hotel['Image'][0]['image_name'], array('class' => 'serviceImageMain', 'name' => 'slide')); ?></p>
		<?php echo $this->Html->scriptBlock($jsGalleryFunc, array('allowCache'=>true,'safe'=>true,'inline'=>true)); ?>
		<div class="serviceImageThumbs">
			<?php for($i=0;$i<5 && $i<count($hotel['Image']);$i++): ?>
              
			<p><?php echo $this->Html->image('hotels/'.$hotel['Image'][$i]['image_name'], array('height' => '75px', 'style'=> 'padding-bottom:3px;')); ?></p>
			<?php endfor; ?>
		</div>						
		<div class="serviceName"><span class="label"><?php echo $hotel['Product']['product_name']; ?></span></div>		
		<table class="serviceHeader">
			<tr>
				<td><span class="label">Category:&nbsp;</span><?php echo $hotel['HotelCategory']['category_name']; ?></td>
				<td><span class="label">Location:&nbsp;</span><?php echo $hotel['Product']['Location']['location_name'].', '.$hotel['Product']['Location']['Region']['name_region']; ?></td>  
				<td><span class="label">Total Room:</span>&nbsp;<?php echo $hotel['Hotel']['total_rooms']; ?></td>
		  </tr>
		</table>
	</div>  
	<br />
	<div class="tab-box"> 
		<a href="javascript:;" class="tabLink activeLink" id="cont-1">Overview</a> 
		<a href="javascript:;" class="tabLink " id="cont-2">Rooms</a> 
		<a href="javascript:;" class="tabLink " id="cont-3">Features</a>
		<a href="javascript:;" class="tabLink " id="cont-4">Reviews</a>
		<a href="javascript:;" class="tabLink " id="cont-5">Activities</a>
		<a href="javascript:;" class="tabLink " id="cont-6">Rates</a> 
		
	</div>
	<!-- overview tab starts -->
	<div class="tabcontent" id="cont-1-1"> 
		<br />
                <div>
			<div style="text-align:left;">
				<span class="label">Check in Time: &nbsp;</span><span><?php echo $hotel['Hotel']['check_in']; ?>&nbsp;</span> &nbsp;&nbsp;&nbsp;  
                                <span class="label">Check Out Time: &nbsp;</span><span><?php echo $hotel['Hotel']['check_out']; ?>&nbsp;</span>   
			</div>
			
		</div>
		<br />
                
		<div>
			<div style="text-align:left;">
				<span class="label">Description:&nbsp;</span>
			</div>
			<div style="border: 1px solid #ddd; min-height:70px;" >
				<?php echo  $this->I18nKeys->getKey($hotel['Product']['i18n_description']); ?>
			</div>
		</div>
		<br />
		<div>
			<div style="text-align:left; float:left;">
				<span class="label">Directions&nbsp;</span>
			</div>
			<div style="text-align:right;">
				<span class="label">Gps Coordinates:&nbsp;</span>
				<span class="label">N:&nbsp;</span><span><?php echo $hotel['Product']['gpslatitude']; ?>&nbsp;</span>   
				<span class="label">E:&nbsp;</span><span><?php echo $hotel['Product']['gpslongitude']; ?>&nbsp;</span>
			</div>
			<div style="border: 1px solid #ddd; min-height:50px;">
				<?php echo  $this->I18nKeys->getKey($hotel['Product']['i18n_direction']); ?>
			</div>
		</div>					
	</div>
	<!-- overview tab ends -->
	
	<!-- rooms tab starts -->
	<div class="tabcontent hide" id="cont-2-1"> 
		<br />		
		<!-- room category starts -->
		<?php foreach($hotel['Room'] as $room): ?>
		<div>
			<div style="text-align:left;">
				<span class="label">Category:&nbsp;</span> <span><?php echo $room['category']; ?>&nbsp;</span>		
				<span class="label">Rooms:&nbsp;</span> <span><?php echo $room['count']; ?>&nbsp;</span>											
			</div>							
			<div style="border: 1px solid #ddd;">
				<div>
					<span><?php echo  $this->I18nKeys->getKey($room['i18n_description']) ?>&nbsp;</span>	
				</div>
				<br />
                                <div class="clsAmenities">
					<span class="label">Amenities:&nbsp;</span> 
					
                                            <?php echo $this->RipsWeb->getAmenitiesList($room) ?>
                                           
						
				</div>
			</div>
		</div>
		<br />
		<?php endforeach; ?>
		<!-- room category ends -->
	</div> 
	<!-- rooms tab ends -->			  
	
	<!-- features tab starts -->		
	<div class="tabcontent hide" id="cont-3-1"> 
            <div id="divFeatures" class="">
		<?php echo $this->RipsWeb->getFeaturesList($hotel['Hotel']) ?>
            </div>
		
            
            <div id="divDiningAndDrinking">
                <div style="text-align:left;">
                    <br />
                    <span class="label"><?php __('Dining & Drinking')?></span> 
                        <?php echo $this->RipsWeb->getDiningAndDrinkingList($hotel['Hotel']) ?>
                    	
                </div>
                <div style="border: 1px solid #ddd; min-height:70px;" >
                                    <?php echo  $this->I18nKeys->getKey($hotel['Hotel']['i18n_dining&drinking']); ?>
                </div>
            </div>
	</div> 
	<!-- features tab ends -->		
	
	<!-- review tab starts -->		
	<div class="tabcontent hide" id="cont-4-1"> 
	  <br />
		<div>
			
                        <fieldset class="tab">
                                <legend class="tab"><span class="label">Staff Reviews:&nbsp;</span></legend>
                                <?php foreach($hotel['Product']['StaffReview'] as $review): ?>		
                                <p><?php echo $review['review_date']; ?></p>
                                <div style="border: 1px solid #ddd; min-height:35px;"> 
                                        <p><?php echo  $this->I18nKeys->getKey($review['i18n_review']); ?>&nbsp;</p>	
                                </div>
                                <br />
                                <?php endforeach; ?>
                        </fieldset>	
			
			<fieldset class="tab">
				<legend class="tab"><span class="label">Traveller Reviews:&nbsp;</span></legend>
                               
				<?php foreach($hotel['Product']['TravellerReview'] as $review): ?>	
                                
                                
                                <p><?php echo $review['review_date']; ?></p>
				<div style="border: 1px solid #ddd; min-height:35px;">
                                    
					<p><?php echo  $this->I18nKeys->getKey($review['i18n_review']); ?></p>	
				</div>
				<br />
				<?php endforeach; ?>
			</fieldset>							
		</div>
	</div>
	<!-- review tab ends -->
        
        
        <!-- Activities tab starts -->		
	<div class="tabcontent hide" id="cont-5-1"> 
	  <br />
		<div>
			
                        					
		</div>
	</div>
	<!-- Activities tab ends -->	
        
		
	<!-- rates tab starts -->	

		<div class="tabcontent hide" id="cont-6-1"> 
		  <br />
			<!-- room category starts -->
			<?php foreach($hotel['Room'] as $room): 
						$altrow = true;
			?>
			<div>			
				<div style="text-align:left; float:left;">
					<span class="label">Category:&nbsp;</span> <span><?php echo $room['category']; ?>&nbsp;</span>												
				</div>							
				<br />
				
				<table class="tab" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<th></th><th>Sgl</th><th>Dbl</th><th>Tpl</th><th>Qdlp</th>
                                                        <th>Child <?php echo $hotel['Hotel']['child_age_min'].'-'.$hotel['Hotel']['child_age_max'].' y/o' ?></th>
                                                        <th>Infant <?php echo $hotel['Hotel']['infant_age_min'].'-'.$hotel['Hotel']['infant_age_max'].' y/o' ?></th>
                                                </tr>
						<?php foreach($room['RoomRate'] as $roomRate): ?>
						<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
                                                        <td>From: <?php echo $roomRate['Season']['date_start']; ?> To: <?php echo $roomRate['Season']['date_end']; ?></td>
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
			           
                        <div style="text-align:left; float:left;">
					<span class="label">Room Rate Includes: </span> <span><?php echo $this->I18nKeys->getKey($room['i18n_include']); ?>&nbsp;</span>												
				</div>
                            <br/>
			<!-- room category ends -->
			<?php endforeach; ?>	
                       <br/> 
		<div style="text-align:left; float:left;">
                            <span class="label">Notes: </span> <span><?php echo $this->I18nKeys->getKey($hotel['Hotel']['i18n_roomnotes']);//$hotel['I18nKey'][$hotel['Hotel']['i18n_roomnotes']]['value']; ?>&nbsp;</span>												
                    </div>
                <br/>
                        
	
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
<?php echo $this->element('sql_dump'); ?>
  <pre><?php print_r($hotel); ?></pre>