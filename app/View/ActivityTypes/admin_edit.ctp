<div class="ActivityType form">
<?php echo $this->Form->create('ActivityType');?>
	<fieldset>
		<legend><?php echo __('Admin Edit ActivityType'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('category', array('options' => array('Land Activities'=>__('Land Activities'),'Water & Active Adventures'=>__('Water & Active Adventures'),'Above Ground Activities'=>__('Above Ground Activities'))));
		 echo $this->Form->input("activity_type_name",array('label'=>__('Activity Type ')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('activitytype_name'))); ?></li>
		<li><?php echo $this->Html->link(__('List ActivityType'), array('action' => 'index'));?></li>
	</ul>
</div>
