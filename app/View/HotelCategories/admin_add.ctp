<div class="hotelcategories form">
<?php echo $this->Form->create('HotelCategory');?>
	<fieldset>
		<legend><?php echo __('Admin Add HotelCategory'); ?></legend>
	<?php

		echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input("category_name",array('label'=>__('HotelCategory ')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List HotelCategories'), array('action' => 'index'));?></li>
	</ul>
</div>
