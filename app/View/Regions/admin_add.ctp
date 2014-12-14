<div class="Region form">
<?php echo $this->Form->create('Region');?>
	<fieldset>
		<legend><?php echo __('Admin Add Regions'); ?></legend>
	<?php

		//echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("region_name",array('label'=>__('Region ')));
                echo $this->Form->input('country', array('options' => 
                array(''=>__('General'),'CR'=>__('Costa Rica'),'PA'=>__('Panamá'),'NI'=>__('Nicaragua'),
                      'GT'=>__('Guatemala'),'SV'=>__('El Salvador'),'HN'=>__('Honduras'))));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index'));?></li>
	</ul>
</div>
