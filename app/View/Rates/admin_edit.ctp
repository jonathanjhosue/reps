<div class="roomRates form">
<?php echo $this->Form->create('RoomRate');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Room Rate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('season_id');
		echo $this->Form->input('room_id');
		echo $this->Form->input('single');
		echo $this->Form->input('double');
		echo $this->Form->input('triple');
		echo $this->Form->input('quadruple');
		echo $this->Form->input('child');
		echo $this->Form->input('infant');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RoomRate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RoomRate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
	</ul>
</div>
