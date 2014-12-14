<div class="flightdestinations form">
<?php echo $this->Form->create('FlightDestination');?>
	<fieldset>
		<legend><?php echo __('Admin Add Flight Destination'); ?></legend>
	<?php

		echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("name",array('label'=>__('Name')));
                echo $this->Form->input('country', array('options' => array('CR'=>__('Costa Rica'),'PA'=>__('Panamá'))));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Flight Destinations'), array('action' => 'index'));?></li>
	</ul>
</div>
