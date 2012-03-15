<div class="activities form">
<?php echo $this->Form->create('Activity');?>
	<fieldset>
		<legend><?php echo __('Edit Activity'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('activity_type_id');
		echo $this->Form->input('duration');
		echo $this->Form->input('age_min');
		echo $this->Form->input('age_max');
		echo $this->Form->input('pax_min');
		echo $this->Form->input('pax_max');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Activity.product_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Activity.product_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activity Types'), array('controller' => 'activity_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity Type'), array('controller' => 'activity_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
