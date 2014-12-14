<div class="FlightDestination form">
<?php echo $this->Form->create('FlightDestination');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Flight Destination'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input("name",array('label'=>__('Flight Destination ')));
                echo $this->Form->input('country', array('options' => array('CR'=>__('Costa Rica'),'PA'=>__('Panamá'))));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
       	<ul>
                                                                   
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FlightDestination.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FlightDestination.name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Flight Destination'), array('action' => 'index'));?></li>
                
	</ul>
</div>
