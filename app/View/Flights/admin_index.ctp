<div class="flights index">
    <h1><?php echo __('Flights');?></h1><br>
        <table cellpadding="0" cellspacing="0" class="jtable">
	<thead><tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('Type');?></th>
                        <th><?php echo $this->Paginator->sort('FlightFrom.name');?></th>
			<th><?php echo $this->Paginator->sort('FlightTo.name');?></th>
                        <th><?php echo $this->Paginator->sort('Duration');?></th>
                        <th class="actions"><?php echo __('Actions');?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	foreach ($flights as $flight): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($flight['Flight']['product_id'], array('controller' => 'flights', 'action' => 'admin_edit', $flight['Flight']['product_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($flight['Flight']['type'], array('controller' => 'flights', 'action' => 'view', $flight['Flight']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($flight['FlightFrom']['name'], array('controller' => 'flights', 'action' => 'admin_edit', $flight['Flight']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($flight['FlightTo']['name'], array('controller' => 'flights', 'action' => 'view', $flight['Flight']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($flight['Flight']['duration'], array('controller' => 'flights', 'action' => 'view', $flight['Flight']['product_id'])); ?>
		</td>
                	
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('admin'=>true,'action' => 'view', $flight['Flight']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $flight['Flight']['product_id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $flight['Flight']['product_id']), null, __('Are you sure you want to delete # %s?', $flight['Flight']['product_id'])); ?>
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

