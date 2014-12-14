<div class="ActivityType form">
<?php echo $this->Form->create('ActivityType');?>
	<fieldset>
		<legend><?php echo __('Admin Add ActivityType'); ?></legend>
	<?php

		//echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('category', array('options' => array('Land Activities'=>__('Land Activities'),'Water & Active Adventures'=>__('Water & Active Adventures'),'Above Ground Activities'=>__('Above Ground Activities'))));
                echo $this->Form->input("activity_type_name",array('label'=>__('ActivityType ')));
?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List ActivityType'), array('action' => 'index'));?></li>
	</ul>
</div>
