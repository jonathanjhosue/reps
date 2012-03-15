<div class="roomRates index">
	<h2><?php echo __('Room Rates');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('season_id');?></th>
			<th><?php echo $this->Paginator->sort('room_id');?></th>
			<th><?php echo $this->Paginator->sort('single');?></th>
			<th><?php echo $this->Paginator->sort('double');?></th>
			<th><?php echo $this->Paginator->sort('triple');?></th>
			<th><?php echo $this->Paginator->sort('quadruple');?></th>
			<th><?php echo $this->Paginator->sort('child');?></th>
			<th><?php echo $this->Paginator->sort('infant');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($roomRates as $roomRate): ?>
	<tr>
		<td><?php echo h($roomRate['RoomRate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($roomRate['Season']['name'], array('controller' => 'seasons', 'action' => 'view', $roomRate['Season']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($roomRate['Room']['category'], array('controller' => 'rooms', 'action' => 'view', $roomRate['Room']['id'])); ?>
		</td>
		<td><?php echo h($roomRate['RoomRate']['single']); ?>&nbsp;</td>
		<td><?php echo h($roomRate['RoomRate']['double']); ?>&nbsp;</td>
		<td><?php echo h($roomRate['RoomRate']['triple']); ?>&nbsp;</td>
		<td><?php echo h($roomRate['RoomRate']['quadruple']); ?>&nbsp;</td>
		<td><?php echo h($roomRate['RoomRate']['child']); ?>&nbsp;</td>
		<td><?php echo h($roomRate['RoomRate']['infant']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $roomRate['RoomRate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $roomRate['RoomRate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $roomRate['RoomRate']['id']), null, __('Are you sure you want to delete # %s?', $roomRate['RoomRate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Room Rate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
	</ul>
</div>
