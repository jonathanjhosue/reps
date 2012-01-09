<div class="hotels form">
	<?php echo $form->create('Hotel', array('action' => 'add')); ?>
	<fieldset>
		<legend>New Hotel</legend>
		<?php	
			echo $form->input('Hotel.hotel_name');
			echo $form->input('Product.location_id');
			echo $form->input('Product.gpslatitude');
			echo $form->input('Product.gpslongitude');
			//echo $form->input('Hotel.product_id'); //No es necesario el mismo sistema crea el Product primero.
			echo $form->input('Hotel.hotel_category_id');			
			echo $form->input('Hotel.total_rooms');
			echo $form->input('Hotel.infant_age_max');		
			echo $form->input('Hotel.child_age_max');
			echo $form->input('Hotel.restaurant');				
			echo $form->input('Hotel.bar');
			echo $form->input('Hotel.swimmingpool');
			echo $form->input('Hotel.wet_bar');
			echo $form->input('Hotel.wheelchair_accessible');
			echo $form->input('Hotel.internet');
			echo $form->input('Hotel.business_center');
			echo $form->input('Hotel.fitness_center');
			echo $form->input('Hotel.private_car_park');
			echo $form->input('Hotel.gift_shop');
			echo $form->input('Hotel.tour_desk');
			echo $form->input('Hotel.certifications');
			echo $form->input('Hotel.free_shuttle_service');
			echo $form->input('Hotel.laundry_service');
			echo $form->input('Hotel.gardens');
			echo $form->input('Hotel.nature_trails');
			echo $form->input('Hotel.socialfunctions_services');
			echo $form->input('Hotel.golf_court');
			echo $form->input('Hotel.tennis_court');
			echo $form->input('Hotel.conference_facilities');
			echo $form->input('Hotel.childcare');			
		?>	
	</fieldset>
	<?php echo $form->end('Submit'); ?>
</div>
<div class="actions">
	<ul>	
		<li><?php echo $html->link('Back to Hotels', array('action' => 'index')); ?></li>
	</ul>
</div>
