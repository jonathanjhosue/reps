<div class="vehiclecategories form">
<?php echo $this->Form->create('VehicleCategory');?>
	<fieldset>
		<legend><?php echo __('Admin Add VehicleCategory'); ?></legend>
	<?php

		echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("name",array('label'=>__('VehicleCategory')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List VehicleCategories'), array('action' => 'index'));?></li>
	</ul>
</div>
