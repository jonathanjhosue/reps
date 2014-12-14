<div class="reviews index" >
	<h2><?php echo __('Reviews');?></h2>
	<table cellpadding="0" cellspacing="0" class="jtable">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
                        <th><?php echo $this->Paginator->sort('Product.product_name',__("Product Name"));?></th>
			<th><?php echo $this->Paginator->sort('staff');?></th>
			<th><?php echo $this->Paginator->sort('review_date');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($reviews as $review): ?>
	<tr>
		<td><?php echo h($review['Review']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($review['Product']['id'], array('controller' => 'products', 'action' => 'view', $review['Product']['id'])); ?>
		</td>
                <td>
                    <?php echo $this->Html->link($review['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $review['Product']['id'])); ?>
                </td>
		<td><?php echo h($review['Review']['staff']); ?>&nbsp;</td>
		<td><?php echo h($review['Review']['review_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $review['Review']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $review['Review']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $review['Review']['id']), null, __('Are you sure you want to delete # %s?', $review['Review']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Review'), array('action' => 'add')); ?></li>
	</ul>
</div>
