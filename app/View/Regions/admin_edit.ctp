<div class="Region form">
<?php echo $this->Form->create('Region');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Region'); ?></legend>
	<?php
		echo $this->Form->input('id');
		 echo $this->Form->input("region_name",array('label'=>__('Region ')));
                 echo $this->Form->input('country', array('options' => array('CR'=>__('Costa Rica'),'PA'=>__('Panamá'))));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('region_name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Region'), array('action' => 'index'));?></li>
	</ul>
</div>
