<div class="rooms form">
<?php echo $this->Form->create('Room');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Room'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('hotel_id');
		echo $this->Form->input('category');
		echo $this->Form->input('count');
		echo $this->Form->input('i18n_description');
		echo $this->Form->input('i18n_include');
		echo $this->Form->input('suite_bathrooms');
		echo $this->Form->input('free_internet');
		echo $this->Form->input('air_conditioning');
		echo $this->Form->input('orthopedic_matresses');
		echo $this->Form->input('telephone');
		echo $this->Form->input('alarm_clock');
		echo $this->Form->input('cable_tv');
		echo $this->Form->input('desk_&_chair');
		echo $this->Form->input('jacuzzi');
		echo $this->Form->input('hairdryer');
		echo $this->Form->input('minibar');
		echo $this->Form->input('coffee_maker');
		echo $this->Form->input('microwave');
		echo $this->Form->input('refrigerator');
		echo $this->Form->input('iron_&_ironing_board');
		echo $this->Form->input('safe_deposit_box');
		echo $this->Form->input('fan');
		echo $this->Form->input('make_up_mirror');
		echo $this->Form->input('balcony');
		echo $this->Form->input('private_garden');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Room.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Room.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('controller' => 'room_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Rate'), array('controller' => 'room_rates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
	</ul>
</div>
