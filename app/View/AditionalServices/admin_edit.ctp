<div class="AditionalService form">
<?php echo $this->Form->create('AditionalService');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Aditional Service'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->label(__("Product").": ".$this->Form->value('AditionalService.product_id'));
                
                echo $this->Form->input("name",array('label'=>__('AditionalService ')));
                echo $this->Form->input("price_daily_rack",array('label'=>__('Price Daily Rack ')));
                echo $this->Form->input("price_daily_net",array('label'=>__('Price Daily Net ')));
                echo $this->Form->input("price_weekly_rack",array('label'=>__('Price Weekly Rack ')));
                echo $this->Form->input("price_weekly_net",array('label'=>__('Price Weekly Net ')));
                echo $this->Form->input('type', array('options' => array('UNIT'=>__('Price Unit'),'VEHICLE'=>__('Price Vehicle'))));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AditionalService.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AditionalService.name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aditional Service'), array('action' => 'index'));?></li>
	</ul>
</div>
