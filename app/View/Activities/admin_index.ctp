<div class="activities index">
	<h2><?php echo __('Activities');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('activity_type_id');?></th>
			<th><?php echo $this->Paginator->sort('duration');?></th>
			<th><?php echo $this->Paginator->sort('age_min');?></th>
			<th><?php echo $this->Paginator->sort('age_max');?></th>
			<th><?php echo $this->Paginator->sort('pax_min');?></th>
			<th><?php echo $this->Paginator->sort('pax_max');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($activities as $activity): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($activity['Product']['id'], array('controller' => 'products', 'action' => 'view', $activity['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['ActivityType']['id'], array('controller' => 'activity_types', 'action' => 'view', $activity['ActivityType']['id'])); ?>
		</td>
		<td><?php echo h($activity['Activity']['duration']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['age_min']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['age_max']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['pax_min']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['pax_max']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $activity['Activity']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $activity['Activity']['product_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $activity['Activity']['product_id']), null, __('Are you sure you want to delete # %s?', $activity['Activity']['product_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activity Types'), array('controller' => 'activity_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity Type'), array('controller' => 'activity_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
