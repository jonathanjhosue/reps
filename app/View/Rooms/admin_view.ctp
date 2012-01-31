<div class="rooms view">
<h2><?php  echo __('Room');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($room['Room']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($room['Hotel']['product_id'], array('controller' => 'hotels', 'action' => 'view', $room['Hotel']['product_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($room['Room']['category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Count'); ?></dt>
		<dd>
			<?php echo h($room['Room']['count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('I18n Description'); ?></dt>
		<dd>
			<?php echo h($room['Room']['i18n_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('I18n Include'); ?></dt>
		<dd>
			<?php echo h($room['Room']['i18n_include']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suite Bathrooms'); ?></dt>
		<dd>
			<?php echo h($room['Room']['suite_bathrooms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Free Internet'); ?></dt>
		<dd>
			<?php echo h($room['Room']['free_internet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Air Conditioning'); ?></dt>
		<dd>
			<?php echo h($room['Room']['air_conditioning']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orthopedic Matresses'); ?></dt>
		<dd>
			<?php echo h($room['Room']['orthopedic_matresses']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($room['Room']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alarm Clock'); ?></dt>
		<dd>
			<?php echo h($room['Room']['alarm_clock']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cable Tv'); ?></dt>
		<dd>
			<?php echo h($room['Room']['cable_tv']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desk & Chair'); ?></dt>
		<dd>
			<?php echo h($room['Room']['desk_&_chair']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jacuzzi'); ?></dt>
		<dd>
			<?php echo h($room['Room']['jacuzzi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hairdryer'); ?></dt>
		<dd>
			<?php echo h($room['Room']['hairdryer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minibar'); ?></dt>
		<dd>
			<?php echo h($room['Room']['minibar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coffee Maker'); ?></dt>
		<dd>
			<?php echo h($room['Room']['coffee_maker']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Microwave'); ?></dt>
		<dd>
			<?php echo h($room['Room']['microwave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Refrigerator'); ?></dt>
		<dd>
			<?php echo h($room['Room']['refrigerator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iron & Ironing Board'); ?></dt>
		<dd>
			<?php echo h($room['Room']['iron_&_ironing_board']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Safe Deposit Box'); ?></dt>
		<dd>
			<?php echo h($room['Room']['safe_deposit_box']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fan'); ?></dt>
		<dd>
			<?php echo h($room['Room']['fan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Make Up Mirror'); ?></dt>
		<dd>
			<?php echo h($room['Room']['make_up_mirror']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Balcony'); ?></dt>
		<dd>
			<?php echo h($room['Room']['balcony']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Private Garden'); ?></dt>
		<dd>
			<?php echo h($room['Room']['private_garden']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room'), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room'), array('action' => 'delete', $room['Room']['id']), null, __('Are you sure you want to delete # %s?', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Rates'), array('controller' => 'room_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Rate'), array('controller' => 'room_rates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Room Rates');?></h3>
	<?php if (!empty($room['RoomRate'])):?>
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
		foreach ($room['RoomRate'] as $roomRate): ?>
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
<div class="related">
	<h3><?php echo __('Related I18n Keys');?></h3>
	<?php if (!empty($room['I18nKey'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th><?php echo __('Language'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Owner Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($room['I18nKey'] as $i18nKey): ?>
		<tr>
			<td><?php echo $i18nKey['id'];?></td>
			<td><?php echo $i18nKey['key'];?></td>
			<td><?php echo $i18nKey['language'];?></td>
			<td><?php echo $i18nKey['type'];?></td>
			<td><?php echo $i18nKey['value'];?></td>
			<td><?php echo $i18nKey['owner_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'i18n_keys', 'action' => 'view', $i18nKey['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'i18n_keys', 'action' => 'edit', $i18nKey['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'i18n_keys', 'action' => 'delete', $i18nKey['id']), null, __('Are you sure you want to delete # %s?', $i18nKey['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
