<div class="seasons view">
<h2><?php  echo __('Season');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($season['Season']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($season['Season']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Start'); ?></dt>
		<dd>
			<?php echo h($season['Season']['date_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date End'); ?></dt>
		<dd>
			<?php echo h($season['Season']['date_end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($season['Hotel']['Product.product_name'], array('controller' => 'hotels', 'action' => 'view', $season['Hotel']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Season'), array('action' => 'edit', $season['Season']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Season'), array('action' => 'delete', $season['Season']['id']), null, __('Are you sure you want to delete # %s?', $season['Season']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('controller' => 'room_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Rate'), array('controller' => 'room_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Room Rates');?></h3>
	<?php if (!empty($season['RoomRate'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Season Id'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Single'); ?></th>
		<th><?php echo __('Double'); ?></th>
		<th><?php echo __('Triple'); ?></th>
		<th><?php echo __('Quadruple'); ?></th>
		<th><?php echo __('Child'); ?></th>
		<th><?php echo __('Infant'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($season['RoomRate'] as $roomRate): ?>
		<tr>
			<td><?php echo $roomRate['id'];?></td>
			<td><?php echo $roomRate['season_id'];?></td>
			<td><?php echo $roomRate['room_id'];?></td>
			<td><?php echo $roomRate['single'];?></td>
			<td><?php echo $roomRate['double'];?></td>
			<td><?php echo $roomRate['triple'];?></td>
			<td><?php echo $roomRate['quadruple'];?></td>
			<td><?php echo $roomRate['child'];?></td>
			<td><?php echo $roomRate['infant'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'room_rates', 'action' => 'view', $roomRate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'room_rates', 'action' => 'edit', $roomRate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'room_rates', 'action' => 'delete', $roomRate['id']), null, __('Are you sure you want to delete # %s?', $roomRate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Room Rate'), array('controller' => 'room_rates', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
