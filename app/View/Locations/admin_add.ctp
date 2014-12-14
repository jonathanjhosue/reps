<div class="Location form">
<?php echo $this->Form->create('Location');?>
	<fieldset>
		<legend><?php echo __('Admin Add Location'); ?></legend>
	<?php

		//echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("region_id",array('label'=>__('Region ')));
                echo $this->Form->input("location_name",array('label'=>__('Location ')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Location'), array('action' => 'index'));?></li>
	</ul>
</div>
