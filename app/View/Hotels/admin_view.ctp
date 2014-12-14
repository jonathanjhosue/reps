<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
/*print_r($hotel); 
print('\n');
print_r($product);
print('\n');
print_r($languages);*/ ?>

<div class="hotels view">
	<div class="serviceImage">
		<h2>View Hotel</h2>
	</div>
	<dl>
		<dt class="altrow">Id</dt>
		<dd class="altrow"><?php echo $hotel['Hotel']['id']; ?>&nbsp;</dd>
		<dt class="altrow">Product</dt>
		<dd class="altrow"><?php echo $hotel['Hotel']['product_id']; ?>&nbsp;</dd>
		<dt>Location</dt>
		<dd><?php echo $hotel['Product']['location_id']; ?>&nbsp;</dd>
		<dt class="altrow">Gps Latitude</dt>
		<dd class="altrow"><?php echo $hotel['Product']['gpslatitude']; ?>&nbsp;</dd>
		<dt>Gps Longitude</dt>
		<dd><?php echo $hotel['Product']['gpslongitude']; ?>&nbsp;</dd>
		<dt class="altrow">Hotel Category</dt>
		<dd class="altrow"><?php echo $hotel['HotelCategory']['category_name']; ?>&nbsp;</dd>
		<dt>Hotel Name</dt>
		<dd><?php echo $hotel['Hotel']['hotel_name']; ?>&nbsp;</dd>
		<dt class="altrow">Total Rooms</dt>
		<dd class="altrow"><?php echo $hotel['Hotel']['total_rooms']; ?>&nbsp;</dd>
		<dt>Infant Age Max</dt>
		<dd><?php echo $hotel['Hotel']['infant_age_max']; ?>&nbsp;</dd>
		<dt class="altrow">Child Age Max</dt>
		<dd class="altrow"><?php echo $hotel['Hotel']['child_age_max']; ?>&nbsp;</dd>
		<dt>Restaurant</dt>
		<dd><?php if($hotel['Hotel']['restaurant']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt class="altrow">Bar</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['bar']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt>Swimmingpool</dt>
		<dd><?php if($hotel['Hotel']['swimmingpool']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt class="altrow">Wet Bar</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['wet_bar']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;	</dd>		
		<dt>Wheelchair Accessible</dt>
		<dd><?php if($hotel['Hotel']['wheelchair_accessible']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt class="altrow">Internet</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['internet']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt>Business Center</dt>
		<dd><?php if($hotel['Hotel']['business_center']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt class="altrow">Fitness Center</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['fitness_center']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt>Private Car Park</dt>
		<dd><?php if($hotel['Hotel']['private_car_park']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt class="altrow">Gift Shop</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['gift_shop']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt>Tour Desk</dt>
		<dd><?php if($hotel['Hotel']['tour_desk']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt class="altrow">Certifications</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['certifications']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt>Free Shuttle Service</dt>
		<dd><?php if($hotel['Hotel']['free_shuttle_service']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt class="altrow">Laundry Service</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['laundry_service']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
		<dt>Gardens</dt>
		<dd><?php if($hotel['Hotel']['gardens']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt class="altrow">Nature Trails</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['nature_trails']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt>Socialfunctions Services</dt>
		<dd><?php if($hotel['Hotel']['socialfunctions_services']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt class="altrow">Golf Court</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['golf_court']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt>Tennis Court</dt>
		<dd><?php if($hotel['Hotel']['tennis_court']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt class="altrow">Conference Facilities</dt>
		<dd class="altrow"><?php if($hotel['Hotel']['conference_facilities']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>		
		<dt>Childcare</dt>
		<dd><?php if($hotel['Hotel']['childcare']==1){echo 'Yes';}else{echo 'No'; } ; ?>&nbsp;</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Hotel', array('action'=>'edit', 'id'=>$hotel['Hotel']['id']) ); ?></li>
		<li><?php echo $html->link('Delete Hotel', array('action'=>'delete', 'id'=>$hotel['Hotel']['product_id']), null, 'Are you sure you want to delete this Hotel?'); ?></li>
		<li><?php echo $html->link('Back to Hotels', array('action'=>'index')); ?></li>
		<li><?php echo $html->link('New Hotel', array('action'=>'add')); ?></li>
	</ul>
</div>
<div class="related">
	<h3>Related Rooms</h3>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>Id</th>
				<th>Hotel Id</th>
				<th>Category</th>
				<th>Count</th>
				<th class="actions">Actions</th>
			</tr>
			<?php foreach($hotel['Room'] as $room): ?>
			<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
				<td><?php echo $room['id']; ?></td>
				<td><?php echo $room['hotel_id']; ?></td>
				<td><?php echo $room['category']; ?></td>
				<td><?php echo $room['count']; ?></td>
				<td class="actions">
					<?php echo $html->link('View', array('controller'=>'rooms', 'action'=>'view', 'id'=>$room['id']) ); ?>
					<?php echo $html->link('Edit', array('controller'=>'rooms', 'action'=>'edit', 'id'=>$room['id']) ); ?>
					<?php echo $html->link('Delete', array('controller'=>'rooms', 'action'=>'delete', 'id'=>$room['id']), null, 'Are you sure you want to delete the '.$room['category']. ' category?'); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="actions">
		<ul>
			<li><?php echo $html->link('New Room', array('controller'=>'rooms', 'action'=>'add')); ?></li>
		</ul>
	</div>
</div>
<!-- Rooms ends-->
<!-- Reviews starts-->
<div class="related">
		<h3>Related Reviews</h3>
		<table cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<th>Id</th>
					<th>Product Id</th>
					<th>Language</th>
					<th>From</th>
					<th>Text</th>
					<th class="actions">Actions</th>
				</tr>
				<?php $altrow = true; foreach($product['Review'] as $review): ?>
				<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
					<td><?php echo $review['id']; ?></td>
					<td><?php echo $review['product_id']; ?></td>
					<td><?php echo $languages[$review['language_id']]; ?></td>
					<td><?php if ($review['from'] == 'S'){ echo 'Staff';}else{echo 'Traveller';} ?></td>
					<td><?php echo $review['text']; ?></td>
					<td class="actions">
						<?php echo $html->link('View', array('controller'=>'reviews', 'action'=>'view', 'id'=>$review['id']) ); ?>
						<?php echo $html->link('Edit', array('controller'=>'reviews', 'action'=>'edit', 'id'=>$review['id']) ); ?>
						<?php echo $html->link('Delete', array('controller'=>'reviews', 'action'=>'delete', 'id'=>$review['id']), null, 'Are you sure you want to delete the Review #'.$review['id']); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>		
		<div class="actions">
			<ul>
				<li><?php echo $html->link('New Review', array('controller'=>'reviews', 'action'=>'add')); ?></li>
			</ul>
		</div>
</div>
<!-- Reviews ends-->
<!-- Directions starts-->
<div class="related">
		<h3>Related Directions</h3>
		<table cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<th>Id</th>
					<th>Product Id</th>
					<th>Language</th>
					<th>Text</th>
					<th class="actions">Actions</th>
				</tr>
				<?php $altrow = true; foreach($product['Direction'] as $direction): ?>
				<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
					<td><?php echo $direction['id']; ?></td>
					<td><?php echo $direction['product_id']; ?></td>
					<td><?php echo $languages[$direction['language_id']]; ?></td>
					<td><?php echo $direction['text']; ?></td>
					<td class="actions">
						<?php echo $html->link('View', array('controller'=>'directions', 'action'=>'view', 'id'=>$direction['id']) ); ?>
						<?php echo $html->link('Edit', array('controller'=>'directions', 'action'=>'edit', 'id'=>$direction['id']) ); ?>
						<?php echo $html->link('Delete', array('controller'=>'directions', 'action'=>'delete', 'id'=>$direction['id']), null, 'Are you sure you want to delete the Direction #'.$direction['id']); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>		
		<div class="actions">
			<ul>
				<li><?php echo $html->link('New Direction', array('controller'=>'directions', 'action'=>'add')); ?></li>
			</ul>
		</div>
</div>
<!-- Directions ends-->
<!-- Descriptions starts -->
<div class="related">
	<h3>Related Descriptions</h3>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>Id</th>
				<th>Product Id</th>
				<th>Language</th>
				<th>Text</th>
				<th class="actions">Actions</th>
			</tr>
			<?php $altrow = true; foreach($product['Description'] as $description): ?>
			<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
				<td><?php echo $description['id']; ?></td>
				<td><?php echo $description['product_id']; ?></td>
				<td><?php echo $languages[$description['language_id']]; ?></td>
				<td><?php echo $description['text']; ?></td>
				<td class="actions">
					<?php echo $html->link('View', array('controller'=>'descriptions', 'action'=>'view', 'id'=>$description['id']) ); ?>
					<?php echo $html->link('Edit', array('controller'=>'descriptions', 'action'=>'edit', 'id'=>$description['id']) ); ?>
					<?php echo $html->link('Delete', array('controller'=>'descriptions', 'action'=>'delete', 'id'=>$description['id']), null, 'Are you sure you want to delete the Description #'.$description['id']); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>	
	<div class="actions">
		<ul>
			<li><?php echo $html->link('New Description', array('controller'=>'descriptions', 'action'=>'add')); ?></li>
		</ul>
	</div>
</div>
<!-- Descriptions ends -->
<!-- Images starts -->
<div class="related">
	<h3>Related Images</h3>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>Id</th>
				<th>Product Id</th>
				<th>Image Name</th>
				<th class="actions">Actions</th>
			</tr>
			<?php $altrow = true; foreach($product['Image'] as $image): ?>
			<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
				<td><?php echo $image['id']; ?></td>
				<td><?php echo $image['product_id']; ?></td>
				<td><?php echo $image['image_name']; ?></td>
				<td class="actions">
					<?php echo $html->link('View', array('controller'=>'images', 'action'=>'view', 'id'=>$image['id']) ); ?>
					<?php echo $html->link('Edit', array('controller'=>'images', 'action'=>'edit', 'id'=>$image['id']) ); ?>
					<?php echo $html->link('Delete', array('controller'=>'images', 'action'=>'delete', 'id'=>$image['id']), null, 'Are you sure you want to delete the Image #'.$image['id']); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="actions">
		<ul>
			<li><?php echo $html->link('New Image', array('controller'=>'images', 'action'=>'add')); ?></li>
		</ul>
	</div>
</div>
<!-- Images ends -->
