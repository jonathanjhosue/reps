<div class="hotelcategories index">
	<h2><?php echo __('hotel categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hotelcategory_name');?></th>
		
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($hotelcategories as $hotelcategory): ?>
	<tr>
		<td><?php echo h($hotelcategory['HotelCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($hotelcategory['HotelCategory']['category_name']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hotelcategory['HotelCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hotelcategory['HotelCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hotelcategory['HotelCategory']['id']), null, __('Are you sure you want to delete # %s?', $hotelcategory['HotelCategory']['category_name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Hotel Category'), array('action' => 'add')); ?></li>
	</ul>
</div>
<pre><?php pr($hotelcategories) ?></pre>