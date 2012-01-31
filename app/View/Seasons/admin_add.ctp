<div class="seasons form">
<?php echo $this->Form->create('Season');?>
	<fieldset>
		<legend><?php echo __('Admin Add Season'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('date_start');
		echo $this->Form->input('date_end');
		echo $this->Form->input('hotel_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('controller' => 'room_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Rate'), array('controller' => 'room_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>
