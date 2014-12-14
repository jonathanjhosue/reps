<div class="activities index">
	<h2><?php echo __('Activities');?></h2>
	<table cellpadding="0" cellspacing="0" class="jtable">
	<tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
                        <th><?php echo $this->Paginator->sort('Product.product_name',__('Name'));?></th>
			<th><?php echo $this->Paginator->sort('ActivityType.activity_type_name',__('Activity Type'));?></th>
			<th><?php echo $this->Paginator->sort('ActivityType.category',__('Category'));?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($activities as $activity): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($activity['Product']['id'], array('controller' => 'products', 'action' => 'view', $activity['Product']['id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($activity['Product']['product_name'], array('action' => 'edit', $activity['Activity']['product_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['ActivityType']['activity_type_name'], array('controller' => 'activity_types', 'action' => 'view', $activity['ActivityType']['id'])); ?>
		</td>
		<td><?php echo h($activity['ActivityType']['category']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('admin'=>false,'action' => 'view', $activity['Activity']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $activity['Activity']['product_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $activity['Activity']['product_id']), null, __('Are you sure you want to delete # %s?', $activity['Product']['product_name'])); ?>
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
		<li><?php echo $this->Html->link(__('List Activity Types'), array('controller' => 'activity_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity Type'), array('controller' => 'activity_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
