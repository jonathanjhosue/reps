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
    <pre><?php print_r($hotel); ?></pre>
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
				<?php echo $hotel['Product']['i18n_description']; ?>
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
				<?php echo $hotel['Product']['i18n_direction']; ?>
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
					<span><?php echo $room['i18n_description'] ?>&nbsp;</span>	
				</div>
				<br />
				<div>
					<span class="label">Amenities:&nbsp;</span> 
					<span>
						<?php if($room['air_conditioning']){ echo 'Air conditioning, '; } if($room['alarm_clock']){ echo 'Alarm clock, '; } if($room['cable_tv']){ echo 'Cable TV, '; } if($room['coffee_maker']){ echo 'Coffee maker, '; } if($room['desk_&_chair']){ echo 'Desk & chair, '; } if($room['free_internet']){ echo 'Free internet, '; } if($room['hairdryer']){ echo 'Hairdryer & mirror, '; } if($room['iron_&_ironing_board']){ echo 'Iron & ironing_board, '; } if($room['jacuzzi']){ echo 'Jacuzzi, '; } if($room['microwave']){ echo 'Microwave, '; } if($room['minibar']){ echo 'Minibar, '; } if($room['orthopedic_matresses']){ echo 'Orthopedic matresses, '; } if($room['refrigerator']){ echo 'Refrigerator, '; } if($room['safe_deposit_box']){ echo 'Safe, '; } if($room['suite_bathrooms']){ echo 'Suite bathrooms, '; } if($room['telephone']){ echo 'Telephone.'; }						
						?>
					</span>	
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
		<ul >                    
           <?php if($hotel['Hotel']['restaurant']): ?>      <li><?php echo $this->Html->image('features/icon/restaurant.png') ?> Restaurant</li> <?php endif; ?>
           <?php if($hotel['Hotel']['bar']): ?>             <li><?php echo $this->Html->image('features/icon/bar.png') ?> Bar</li> <?php endif; ?>
           <?php if($hotel['Hotel']['business_center']): ?> <li><?php echo $this->Html->image('features/icon/business_center.png') ?> Business Center</li> <?php endif; ?>                      
           <?php if($hotel['Hotel']['swimmingpool']): ?>    <li><?php echo $this->Html->image('features/icon/swimmingpool.png') ?> Swimming Pool</li> <?php endif; ?>
           <?php if($hotel['Hotel']['wet_bar']): ?>         <li><?php echo $this->Html->image('features/icon/wet_bar.png') ?> Wet Bar</li> <?php endif; ?>
           <?php if($hotel['Hotel']['wheelchair_accessible']): ?> <li><?php echo $this->Html->image('features/icon/wheelchair_accessible.png') ?> Wheelchair Accessible</li> <?php endif; ?>
           <?php if($hotel['Hotel']['internet']): ?>        <li><?php echo $this->Html->image('features/icon/internet.png') ?> Internet</li> <?php endif; ?>
           <?php if($hotel['Hotel']['fitness_center']): ?>  <li><?php echo $this->Html->image('features/icon/fitness_center.png') ?> Fitness Center</li> <?php endif; ?>
           <?php if($hotel['Hotel']['private_car_park']): ?><li><?php echo $this->Html->image('features/icon/private_car_park.png') ?> Private Car Park</li> <?php endif; ?>
           <?php if($hotel['Hotel']['gift_shop']): ?>       <li><?php echo $this->Html->image('features/icon/gift_shop.png') ?> Gift Shop</li> <?php endif; ?>
           <?php if($hotel['Hotel']['tour_desk']): ?>       <li><?php echo $this->Html->image('features/icon/tour_desk.png') ?> Tour Desk</li> <?php endif; ?>
           <?php if($hotel['Hotel']['certifications']): ?>  <li><?php echo $this->Html->image('features/icon/certifications.png') ?> Certifications 
                                                                <?php echo $hotel['Hotel']['certifications_details'] ?></li> <?php endif; ?>
           <?php if($hotel['Hotel']['free_shuttle_service']): ?> <li><?php echo $this->Html->image('features/icon/free_shuttle_service.png') ?> Free Shuttle Service 
                                                                <?php echo $hotel['Hotel']['freeshuttleservice_details'] ?></li> <?php endif; ?>
           <?php if($hotel['Hotel']['laundry_service']): ?> <li><?php echo $this->Html->image('features/icon/laundry_service.png') ?> Laundry Service</li> <?php endif; ?>
           <?php if($hotel['Hotel']['gardens']): ?>         <li><?php echo $this->Html->image('features/icon/gardens.png') ?> Gardens</li> <?php endif; ?>
           <?php if($hotel['Hotel']['nature_trails']): ?>   <li><?php echo $this->Html->image('features/icon/nature_trails.png') ?> Nature Trails</li> <?php endif; ?>
           <?php if($hotel['Hotel']['socialfunctions_services']): ?>             <li><?php echo $this->Html->image('features/icon/socialfunctions_services.png') ?> Socialfunctions Services</li> <?php endif; ?>
           <?php if($hotel['Hotel']['golf_court']): ?>      <li><?php echo $this->Html->image('features/icon/golf_court.png') ?> Golf Court</li> <?php endif; ?>
           <?php if($hotel['Hotel']['tennis_court']): ?>    <li><?php echo $this->Html->image('features/icon/tennis_court.png') ?> Tennis Court</li> <?php endif; ?>
           <?php if($hotel['Hotel']['conference_facilities']): ?> <li><?php echo $this->Html->image('features/icon/conference_facilities.png') ?> Conference Facilities 
                                                                      <?php echo $hotel['Hotel']['conferencefacilities_details'] ?> </li>   <?php endif; ?>           
           <?php if($hotel['Hotel']['childcare']): ?>      <li><?php echo $this->Html->image('features/icon/childcare.png') ?> Child Care</li> <?php endif; ?>
           <?php if($hotel['Hotel']['spa']): ?>             <li><?php echo $this->Html->image('features/icon/spa.png') ?> Spa</li> <?php endif; ?>
           <?php if($hotel['Hotel']['beauty_salon']): ?>    <li><?php echo $this->Html->image('features/icon/beauty_salon.png') ?> Beauty Salon</li> <?php endif; ?>
           <?php if($hotel['Hotel']['room_service']): ?>    <li><?php echo $this->Html->image('features/icon/room_service.png') ?> Room Service</li> <?php endif; ?>
           <?php if($hotel['Hotel']['concierge']): ?>       <li><?php echo $this->Html->image('features/icon/concierge.png') ?> Concierge</li> <?php endif; ?>
                                             
                        						
		</ul> 
            </div>
		
            
            <div>
                <div style="text-align:left;">
                    <br />
                    <span class="label">Dining & Drinking</span> 
                    	<span>
                                <?php 
                                    if($hotel['Hotel']['vegetarian']){ echo 'Vegetarian '; } 
                                    if($hotel['Hotel']['kosher']){ echo 'Kosher '; }
                                ?>
                        </span>	
                </div>
                <div style="border: 1px solid #ddd; min-height:70px;" >
                                    <?php echo $hotel['Hotel']['i18n_dining&drinking']; ?>
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
                                        <p><?php echo $review['i18n_review']; ?>&nbsp;</p>	
                                </div>
                                <br />
                                <?php endforeach; ?>
                        </fieldset>	
			
			<fieldset class="tab">
				<legend class="tab"><span class="label">Traveller Reviews:&nbsp;</span></legend>
                               
				<?php foreach($hotel['Product']['TravellerReview'] as $review): ?>	
                                
                                
                                <p><?php echo $review['review_date']; ?></p>
				<div style="border: 1px solid #ddd; min-height:35px;">
                                    
					<p><?php echo $review['i18n_review']; ?></p>	
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
					<span class="label">Room Rate Includes: </span> <span><?php echo $room['i18n_include']; ?>&nbsp;</span>												
				</div>
                            <br/>
			<!-- room category ends -->
			<?php endforeach; ?>	
                       <br/> 
		<div style="text-align:left; float:left;">
                            <span class="label">Notes: </span> <span><?php echo $hotel['Hotel']['room_notes']; ?>&nbsp;</span>												
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