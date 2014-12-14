<div class="rentacars index">
	<h1><?php echo __('Rentacars');?></h1>
        <table cellpadding="0" cellspacing="0" class="jtable">
	<thead><tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('Product.product_name',__("Name"));?></th>
			<th><?php echo __("Vehicles");?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	foreach ($list as $item): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($item['Rentacar']['product_id'], array('controller' => 'rentacars', 'action' => 'admin_edit', $item['Rentacar']['product_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($item['Product']['product_name'], array('controller' => 'rentacars', 'action' => 'admin_edit', $item['Rentacar']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link(__("Show Vehicles"), array('controller' => 'vehicles', 'action' => 'admin_index', $item['Rentacar']['product_id'])); ?>
		</td>               	
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Rentacar']['product_id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Rentacar']['product_id']), null, __('Are you sure you want to delete # %s?', $item['Rentacar']['product_id'])); ?>
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

