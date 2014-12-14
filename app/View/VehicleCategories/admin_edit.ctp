<div class="VehicleCategory form">
<?php echo $this->Form->create('VehicleCategory');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Vehicle Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		 echo $this->Form->input("name",array('label'=>__('Vehicle Category ')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
       	<ul>
                                                                   
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VehicleCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VehicleCategory.name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicle Categories'), array('action' => 'index'));?></li>
                
	</ul>
</div>
