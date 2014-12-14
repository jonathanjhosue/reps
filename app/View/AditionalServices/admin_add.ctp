<div class="AditionalService form">
<?php echo $this->Form->create('AditionalService');?>
	<fieldset>
		<legend><?php echo __('Admin Add AditionalService'); ?></legend>
	<?php

		//echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("rentacar_id",array('label'=>__('RentaCar ')));
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

		<li><?php echo $this->Html->link(__('List Aditional Service'), array('action' => 'index'));?></li>
	</ul>
</div>
