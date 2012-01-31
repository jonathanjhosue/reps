<div class="roomRates view">
<h2><?php  echo __('Room Rate');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Season'); ?></dt>
		<dd>
			<?php echo $this->Html->link($roomRate['Season']['name'], array('controller' => 'seasons', 'action' => 'view', $roomRate['Season']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($roomRate['Room']['category'], array('controller' => 'rooms', 'action' => 'view', $roomRate['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Single'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['single']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Double'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['double']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Triple'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['triple']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quadruple'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['quadruple']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Child'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['child']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infant'); ?></dt>
		<dd>
			<?php echo h($roomRate['RoomRate']['infant']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room Rate'), array('action' => 'edit', $roomRate['RoomRate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room Rate'), array('action' => 'delete', $roomRate['RoomRate']['id']), null, __('Are you sure you want to delete # %s?', $roomRate['RoomRate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Rate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
	</ul>
</div>
