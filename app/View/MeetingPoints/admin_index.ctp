<div class="meetingPoints index">
	<h2><?php echo __('Meeting Points');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($meetingPoints as $meetingPoint): ?>
	<tr>
		<td><?php echo h($meetingPoint['MeetingPoint']['id']); ?>&nbsp;</td>
		<td><?php echo h($meetingPoint['MeetingPoint']['name']);?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meetingPoint['MeetingPoint']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $meetingPoint['MeetingPoint']['id']), null, __('Are you sure you want to delete  %s?', $meetingPoint['MeetingPoint']['name'])); ?>
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
		<li><?php echo $this->Html->link(__('New Meeting Point'), array('action' => 'add')); ?></li>
	</ul>
</div>

