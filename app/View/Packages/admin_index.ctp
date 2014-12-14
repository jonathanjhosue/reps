<div class="packages index">
	<h1><?php echo __('Packages');?></h1>
        <table cellpadding="0" cellspacing="0" class="jtable">
	<thead><tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('Product.product_name',__("Package Name"));?></th>
                        <th><?php echo $this->Paginator->sort('code');?></th>
			<th><?php echo $this->Paginator->sort('tour_type');?></th>
                        <th><?php echo $this->Paginator->sort('location');?></th>
                        <th class="actions"><?php echo __('Actions');?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	foreach ($packages as $package): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($package['Package']['product_id'], array('controller' => 'packages', 'action' => 'admin_edit', $package['Package']['product_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($package['Product']['product_name'], array('controller' => 'packages', 'action' => 'admin_edit', $package['Package']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($package['Package']['code'], array('controller' => 'packages', 'action' => 'admin_edit', $package['Package']['product_id'])); ?>
		</td>	
		<td>
			<?php echo $this->Html->link($package['Package']['tour_type'], array('controller' => 'packages', 'action' => 'admin_edit', $package['Package']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($package['Package']['tour_location'], array('controller' => 'packages', 'action' => 'admin_edit', $package['Package']['product_id'])); ?>
		</td>
                	
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('admin'=>false,'action' => 'view', $package['Package']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $package['Package']['product_id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $package['Package']['product_id']), null, __('Are you sure you want to delete # %s?', $package['Package']['product_id'])); ?>
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

