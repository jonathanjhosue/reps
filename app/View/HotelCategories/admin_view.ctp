<div class="hotel category view">
<h2><?php  echo __('HotelCategory');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelcategory['HotelCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Name'); ?></dt>
		<dd>
			<?php echo h($hotelcategory['HotelCategory']['category_name']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Category'), array('action' => 'edit', $hotelcategory['HotelCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Category'), array('action' => 'delete', $hotelcategory['HotelCategory']['id']), null, __('Are you sure you want to delete # %s?', $hotelcategory['HotelCategory']['category_name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List HotelCategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New HotelCategory'), array('action' => 'add')); ?> </li>
	</ul>
</div>
