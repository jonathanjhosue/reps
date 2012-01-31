<div class="rooms index">
	<h2><?php echo __('Rooms');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hotel_id');?></th>
			<th><?php echo $this->Paginator->sort('category');?></th>
			<th><?php echo $this->Paginator->sort('count');?></th>
			<th><?php echo $this->Paginator->sort('i18n_description');?></th>
			<th><?php echo $this->Paginator->sort('i18n_include');?></th>
			<th><?php echo $this->Paginator->sort('suite_bathrooms');?></th>
			<th><?php echo $this->Paginator->sort('free_internet');?></th>
			<th><?php echo $this->Paginator->sort('air_conditioning');?></th>
			<th><?php echo $this->Paginator->sort('orthopedic_matresses');?></th>
			<th><?php echo $this->Paginator->sort('telephone');?></th>
			<th><?php echo $this->Paginator->sort('alarm_clock');?></th>
			<th><?php echo $this->Paginator->sort('cable_tv');?></th>
			<th><?php echo $this->Paginator->sort('desk_&_chair');?></th>
			<th><?php echo $this->Paginator->sort('jacuzzi');?></th>
			<th><?php echo $this->Paginator->sort('hairdryer');?></th>
			<th><?php echo $this->Paginator->sort('minibar');?></th>
			<th><?php echo $this->Paginator->sort('coffee_maker');?></th>
			<th><?php echo $this->Paginator->sort('microwave');?></th>
			<th><?php echo $this->Paginator->sort('refrigerator');?></th>
			<th><?php echo $this->Paginator->sort('iron_&_ironing_board');?></th>
			<th><?php echo $this->Paginator->sort('safe_deposit_box');?></th>
			<th><?php echo $this->Paginator->sort('fan');?></th>
			<th><?php echo $this->Paginator->sort('make_up_mirror');?></th>
			<th><?php echo $this->Paginator->sort('balcony');?></th>
			<th><?php echo $this->Paginator->sort('private_garden');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($rooms as $room): ?>
	<tr>
		<td><?php echo h($room['Room']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($room['Hotel']['product_id'], array('controller' => 'hotels', 'action' => 'view', $room['Hotel']['product_id'])); ?>
		</td>
		<td><?php echo h($room['Room']['category']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['count']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['i18n_description']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['i18n_include']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['suite_bathrooms']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['free_internet']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['air_conditioning']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['orthopedic_matresses']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['telephone']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['alarm_clock']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['cable_tv']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['desk_&_chair']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['jacuzzi']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['hairdryer']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['minibar']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['coffee_maker']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['microwave']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['refrigerator']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['iron_&_ironing_board']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['safe_deposit_box']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['fan']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['make_up_mirror']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['balcony']); ?>&nbsp;</td>
		<td><?php echo h($room['Room']['private_garden']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $room['Room']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $room['Room']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $room['Room']['id']), null, __('Are you sure you want to delete # %s?', $room['Room']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Room'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('controller' => 'room_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Rate'), array('controller' => 'room_rates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
	</ul>
</div>
