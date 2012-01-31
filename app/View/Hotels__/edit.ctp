<div class="hotels form">
<?php echo $this->Form->create('Hotel');?>
	<fieldset>
		<legend><?php echo __('Edit Hotel'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('hotel_category_id');
		echo $this->Form->input('child_age_max');
		echo $this->Form->input('infant_age_max');
		echo $this->Form->input('child_age_min');
		echo $this->Form->input('infant_age_min');
		echo $this->Form->input('check_in');
		echo $this->Form->input('check_out');
		echo $this->Form->input('restaurant');
		echo $this->Form->input('bar');
		echo $this->Form->input('swimmingpool');
		echo $this->Form->input('wet_bar');
		echo $this->Form->input('wheelchair_accessible');
		echo $this->Form->input('internet');
		echo $this->Form->input('business_center');
		echo $this->Form->input('fitness_center');
		echo $this->Form->input('private_car_park');
		echo $this->Form->input('gift_shop');
		echo $this->Form->input('tour_desk');
		echo $this->Form->input('certifications');
		echo $this->Form->input('certifications_details');
		echo $this->Form->input('free_shuttle_service');
		echo $this->Form->input('freeshuttleservice_details');
		echo $this->Form->input('laundry_service');
		echo $this->Form->input('gardens');
		echo $this->Form->input('nature_trails');
		echo $this->Form->input('socialfunctions_services');
		echo $this->Form->input('golf_court');
		echo $this->Form->input('tennis_court');
		echo $this->Form->input('conference_facilities');
		echo $this->Form->input('conferencefacilities_details');
		echo $this->Form->input('childcare');
		echo $this->Form->input('lift');
		echo $this->Form->input('spa');
		echo $this->Form->input('beauty_salon');
		echo $this->Form->input('room_service');
		echo $this->Form->input('concierge');
		echo $this->Form->input('i18n_dining&drinking');
		echo $this->Form->input('vegetarian');
		echo $this->Form->input('kosher');
		echo $this->Form->input('i18n_roomnotes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Hotel.product_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Hotel.product_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Categories'), array('controller' => 'hotel_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Category'), array('controller' => 'hotel_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
	</ul>
</div>
