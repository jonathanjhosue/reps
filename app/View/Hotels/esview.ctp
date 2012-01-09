<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla. 
	//incluye en el view las instrucciones JavaScript para el control del tabpanel.
	echo $html->css('cake.cms.css', NULL, NULL, false);
	echo $javascript->link('jquery.js', false);
	echo $javascript->link('tabcontrol.js', false);
	echo $javascript->codeBlock($jsGalleryDec, array('allowCache'=>true,'safe'=>true,'inline'=>false));
	
	echo $this->element('v_nav_regions');
	
	print_r($_SESSION);
?>
<div class="hotels view">
	<div>
		<p><?php echo $html->image('hotels/'.$hotel['Product']['image'][0]['Image']['image_name'], array('class' => 'serviceImageMain', 'name' => 'slide')); ?></p>
		<?php echo $javascript->codeBlock($jsGalleryFunc, array('allowCache'=>true,'safe'=>true,'inline'=>true)); ?>
		<div class="serviceImageThumbs">
			<?php foreach($hotel['Product']['image'] as $img): ?>		
			<p><?php echo $html->image('hotels/'.$img['Image']['image_name'], array('height' => '75px', 'style'=> 'padding-bottom:3px;')); ?></p>
			<?php endforeach; ?>
		</div>						
		<div class="serviceName"><span class="label"><?php echo $hotel['Hotel']['hotel_name']; ?></span></div>		
		<table class="serviceHeader">
			<tr>
				<td><span class="label">Categor&iacute;:&nbsp;</span><?php echo $hotel['HotelCategory']['category_name']; ?></td>
				<td><span class="label">Localizaci&oacute;n:&nbsp;</span><?php echo $hotel['Product']['location']['Location']['location_name']; ?></td>  
				<td><span class="label">Habitaciones:</span>&nbsp;<?php echo $hotel['Hotel']['total_rooms']; ?></td>
		  </tr>
		</table>
	</div>  
	<br />
	<div class="tab-box"> 
		<a href="javascript:;" class="tabLink activeLink" id="cont-1">Res&uacute;men</a> 
		<a href="javascript:;" class="tabLink " id="cont-2">Habitaciones</a> 
		<a href="javascript:;" class="tabLink " id="cont-3">Facilidades</a>
		<a href="javascript:;" class="tabLink " id="cont-4">Comentarios</a>
		<?php if(isset($_SESSION['Auth']['User'])){ ?>
			<a href="javascript:;" class="tabLink " id="cont-5">Tarifas</a> 
		<?php } ?>
	</div>
	<!-- overview tab starts -->
	<div class="tabcontent" id="cont-1-1"> 
		<br />
		<div>
			<div style="text-align:left;">
				<span class="label">Descripci&oacute;n:&nbsp;</span>
			</div>
			<div style="border: 1px solid #ddd; min-height:70px;" >
				<?php echo $hotel['Product']['description']['text']; ?>
			</div>
		</div>
		<br />
		<div>
			<div style="text-align:left; float:left;">
				<span class="label">Directions&nbsp;</span>
			</div>
			<div style="text-align:right;">
				<span class="label">Coordenadas:&nbsp;</span>
				<span class="label">N:&nbsp;</span><span><?php echo $hotel['Product']['gpslatitude']; ?>&nbsp;</span>   
				<span class="label">E:&nbsp;</span><span><?php echo $hotel['Product']['gpslongitude']; ?>&nbsp;</span>
			</div>
			<div style="border: 1px solid #ddd; min-height:50px;">
				<?php echo $hotel['Product']['direction']['text']; ?>
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
				<span class="label">Categor&iacute;a:&nbsp;</span> <span><?php echo $room['category']; ?>&nbsp;</span>		
				<span class="label">Habitaciones:&nbsp;</span> <span><?php echo $room['count']; ?>&nbsp;</span>											
			</div>							
			<div style="border: 1px solid #ddd;">
				<div>
					<span><?php echo $room['room_description']['text'] ?>&nbsp;</span>	
				</div>
				<br />
				<div>
					<span class="label">Comodidades:&nbsp;</span> 
					<span>
						<?php if($room['air_conditioning']){ echo 'Air conditioning, '; } if($room['alarm_clock']){ echo 'Alarm clock, '; } if($room['cable_tv']){ echo 'Cable TV, '; } if($room['coffee_maker']){ echo 'Coffee maker, '; } if($room['desk_&_chair']){ echo 'Desk & chair, '; } if($room['free_internet']){ echo 'Free internet, '; } if($room['hairdryer_&_mirror']){ echo 'Hairdryer & mirror, '; } if($room['iron_&_ironing_board']){ echo 'Iron & ironing_board, '; } if($room['jacuzzi']){ echo 'Jacuzzi, '; } if($room['microwave']){ echo 'Microwave, '; } if($room['minibar']){ echo 'Minibar, '; } if($room['orthopedic_matresses']){ echo 'Orthopedic matresses, '; } if($room['refrigerator']){ echo 'Refrigerator, '; } if($room['safe']){ echo 'Safe, '; } if($room['suite_bathrooms']){ echo 'Suite bathrooms, '; } if($room['telephone']){ echo 'Telephone.'; }						
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
		<dl class="tab" style="margin-right:1em;">
			<dt class="altrow">Bar</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['bar']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt>Business Center</dt>
			<dd class="tab"><?php if($hotel['Hotel']['business_center']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt class="altrow">Certifications</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['certifications']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>	
			<dt>Childcare</dt>
			<dd class="tab"><?php if($hotel['Hotel']['childcare']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>					
			<dt class="altrow">Conference Facilities</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['conference_facilities']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>	
			<dt>Fitness Center</dt>
			<dd class="tab"><?php if($hotel['Hotel']['fitness_center']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
			<dt class="altrow">Free Shuttle Service</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['free_shuttle_service']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>						
		</dl> 
		<dl class="tab" style="margin-right:1em;">
			<dt class="altrow">Gardens</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['gardens']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
			<dt>Gift Shop</dt>
			<dd class="tab"><?php if($hotel['Hotel']['gift_shop']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt class="altrow">Golf Court</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['golf_court']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>	
			<dt>Internet</dt>
			<dd class="tab"><?php if($hotel['Hotel']['internet']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>	
			<dt class="altrow">Laundry Service</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['laundry_service']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt>Nature Trails</dt>
			<dd class="tab"><?php if($hotel['Hotel']['nature_trails']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>	
			<dt class="altrow">Private Car Park</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['private_car_park']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>					
		</dl>
		<dl class="tab">
			<dt class="altrow">Socialfunctions Services</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['socialfunctions_services']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
			<dt>Restaurant</dt>
			<dd class="tab"><?php if($hotel['Hotel']['restaurant']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt class="altrow">Swimmingpool</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['swimmingpool']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt>Tennis Court</dt>
			<dd class="tab"><?php if($hotel['Hotel']['tennis_court']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt class="altrow">Tour Desk</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['tour_desk']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
			<dt>Wet Bar</dt>
			<dd class="tab"><?php if($hotel['Hotel']['wet_bar']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;	</dd>	
			<dt class="altrow">Wheelchair Accessible</dt>
			<dd class="tab altrow"><?php if($hotel['Hotel']['wheelchair_accessible']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>				
		</dl>
	</div> 
	<!-- features tab ends -->		
	
	<!-- review tab starts -->		
	<div class="tabcontent hide" id="cont-4-1"> 
	  <br />
		<div>
			<?php if(isset($_SESSION['Auth']['User'])){ ?>
				<fieldset class="tab">
					<legend class="tab"><span class="label">Staff Reviews:&nbsp;</span></legend>
					<?php foreach($hotel['Product']['staff_review'] as $review): ?>								
					<div style="border: 1px solid #ddd; min-height:35px;"> 
						<span><?php echo $review['Review']['text']; ?>&nbsp;</span>	
					</div>
					<br />
					<?php endforeach; ?>
				</fieldset>	
			<?php } ?>
			<fieldset class="tab">
				<legend class="tab"><span class="label">Traveller Reviews:&nbsp;</span></legend>
				<?php foreach($hotel['Product']['traveller_review'] as $review): ?>							
				<div style="border: 1px solid #ddd; min-height:35px;"> 
					<span><?php echo $review['Review']['text']; ?>&nbsp;</span>	
				</div>
				<br />
				<?php endforeach; ?>
			</fieldset>							
		</div>
	</div>
	<!-- review tab ends -->	
		
	<!-- rates tab starts -->	
	<?php if(isset($_SESSION['Auth']['User'])){ ?>
		<div class="tabcontent hide" id="cont-5-1"> 
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
							<th>Validity Starts</th><th>Validity Ends</th><th>Single Rack</th><th>Single Net</th><th>Double Rack</th><th>Double Net</th><th>Triple Rack</th><th>Triple Net</th><th>Quadruple Rack</th><th>Quadruple Net</th><th>Child Rack</th><th>Child Net</th><th>Infant Rack</th><th>Infant Net</th>
						</tr>
						<?php foreach($room['room_rate'] as $roomRate): ?>
						<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
							<td><?php echo $roomRate['RoomRate']['validity_starts']; ?></td>
							<td><?php echo $roomRate['RoomRate']['validity_ends']; ?></td>
							<td><?php echo $roomRate['RoomRate']['single_rack']; ?></td>
							<td><?php echo $roomRate['RoomRate']['single_net']; ?></td>
							<td><?php echo $roomRate['RoomRate']['double_rack']; ?></td>
							<td><?php echo $roomRate['RoomRate']['double_net']; ?></td>
							<td><?php echo $roomRate['RoomRate']['triple_rack']; ?></td>
							<td><?php echo $roomRate['RoomRate']['triple_net']; ?></td>
							<td><?php echo $roomRate['RoomRate']['quadruple_rack']; ?></td>
							<td><?php echo $roomRate['RoomRate']['quadruple_net']; ?></td>
							<td><?php echo $roomRate['RoomRate']['child_rack']; ?></td>
							<td><?php echo $roomRate['RoomRate']['child_net']; ?></td>
							<td><?php echo $roomRate['RoomRate']['infant_rack']; ?></td>
							<td><?php echo $roomRate['RoomRate']['infant_net']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<br />
			<!-- room category ends -->
			<?php endforeach; ?>	
		</div>
	<?php } ?>
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