<div class="images form">
<?php echo $this->Form->create('Image', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Admin Add Image'); ?></legend>
	<?php

		echo $this->Form->input('owner_id',array('type'=>'hidden','value'=>  '33'));
                echo $this->Form->input("image_name",array('label'=>__('Image '),'type'=>'file'));
		echo $this->Form->input("owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_HOTEL));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index'));?></li>
	</ul>
</div>
