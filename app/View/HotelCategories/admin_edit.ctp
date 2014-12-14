<div class="HotelCategory form">
<?php echo $this->Form->create('HotelCategory');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Hotel Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		 echo $this->Form->input("category_name",array('label'=>__('HotelCategory ')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('category_name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hotel Categories'), array('action' => 'index'));?></li>
	</ul>
</div>
