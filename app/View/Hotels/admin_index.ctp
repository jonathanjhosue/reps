<div class="hotels index">
	<h1><?php echo __('Hotels');?></h1>
        <table cellpadding="0" cellspacing="0" class="jtable">
	<thead><tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('Product.product_name');?></th>
			<th><?php echo $this->Paginator->sort('hotel_category_id');?></th>			
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	foreach ($hotels as $hotel): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($hotel['Product']['id'], array('controller' => 'hotels', 'action' => 'admin_edit', $hotel['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($hotel['Product']['product_name'], array('controller' => 'hotels', 'action' => 'admin_edit', $hotel['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($hotel['HotelCategory']['category_name'], array('controller' => 'hotel_categories', 'action' => 'view', $hotel['HotelCategory']['id'])); ?>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('admin'=>false,'action' => 'view', $hotel['Hotel']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hotel['Hotel']['product_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hotel['Hotel']['product_id']), null, __('Are you sure you want to delete # %s?', $hotel['Hotel']['product_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
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

