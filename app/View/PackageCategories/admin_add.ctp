<div class="packagecategories form">
<?php echo $this->Form->create('PackageCategory');?>
	<fieldset>
		<legend><?php echo __('Admin Add PackageCategory'); ?></legend>
	<?php

		echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("category_name",array('label'=>__('PackageCategory')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List PackageCategories'), array('action' => 'index'));?></li>
	</ul>
</div>
