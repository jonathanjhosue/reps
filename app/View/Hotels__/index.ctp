<div class="hotels index">
	<h2><?php echo __('Hotels');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('hotel_category_id');?></th>
			<th><?php echo $this->Paginator->sort('child_age_max');?></th>
			<th><?php echo $this->Paginator->sort('infant_age_max');?></th>
			<th><?php echo $this->Paginator->sort('child_age_min');?></th>
			<th><?php echo $this->Paginator->sort('infant_age_min');?></th>
			<th><?php echo $this->Paginator->sort('check_in');?></th>
			<th><?php echo $this->Paginator->sort('check_out');?></th>
			<th><?php echo $this->Paginator->sort('restaurant');?></th>
			<th><?php echo $this->Paginator->sort('bar');?></th>
			<th><?php echo $this->Paginator->sort('swimmingpool');?></th>
			<th><?php echo $this->Paginator->sort('wet_bar');?></th>
			<th><?php echo $this->Paginator->sort('wheelchair_accessible');?></th>
			<th><?php echo $this->Paginator->sort('internet');?></th>
			<th><?php echo $this->Paginator->sort('business_center');?></th>
			<th><?php echo $this->Paginator->sort('fitness_center');?></th>
			<th><?php echo $this->Paginator->sort('private_car_park');?></th>
			<th><?php echo $this->Paginator->sort('gift_shop');?></th>
			<th><?php echo $this->Paginator->sort('tour_desk');?></th>
			<th><?php echo $this->Paginator->sort('certifications');?></th>
			<th><?php echo $this->Paginator->sort('certifications_details');?></th>
			<th><?php echo $this->Paginator->sort('free_shuttle_service');?></th>
			<th><?php echo $this->Paginator->sort('freeshuttleservice_details');?></th>
			<th><?php echo $this->Paginator->sort('laundry_service');?></th>
			<th><?php echo $this->Paginator->sort('gardens');?></th>
			<th><?php echo $this->Paginator->sort('nature_trails');?></th>
			<th><?php echo $this->Paginator->sort('socialfunctions_services');?></th>
			<th><?php echo $this->Paginator->sort('golf_court');?></th>
			<th><?php echo $this->Paginator->sort('tennis_court');?></th>
			<th><?php echo $this->Paginator->sort('conference_facilities');?></th>
			<th><?php echo $this->Paginator->sort('conferencefacilities_details');?></th>
			<th><?php echo $this->Paginator->sort('childcare');?></th>
			<th><?php echo $this->Paginator->sort('lift');?></th>
			<th><?php echo $this->Paginator->sort('spa');?></th>
			<th><?php echo $this->Paginator->sort('beauty_salon');?></th>
			<th><?php echo $this->Paginator->sort('room_service');?></th>
			<th><?php echo $this->Paginator->sort('concierge');?></th>
			<th><?php echo $this->Paginator->sort('i18n_dining&drinking');?></th>
			<th><?php echo $this->Paginator->sort('vegetarian');?></th>
			<th><?php echo $this->Paginator->sort('kosher');?></th>
			<th><?php echo $this->Paginator->sort('i18n_roomnotes');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($hotels as $hotel): ?>
	<tr>
		<td><?php echo h($hotel['Hotel']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($hotel['Product']['id'], array('controller' => 'products', 'action' => 'view', $hotel['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($hotel['HotelCategory']['category_name'], array('controller' => 'hotel_categories', 'action' => 'view', $hotel['HotelCategory']['id'])); ?>
		</td>
		<td><?php echo h($hotel['Hotel']['child_age_max']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['infant_age_max']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['child_age_min']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['infant_age_min']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['check_in']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['check_out']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['restaurant']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['bar']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['swimmingpool']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['wet_bar']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['wheelchair_accessible']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['internet']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['business_center']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['fitness_center']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['private_car_park']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['gift_shop']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['tour_desk']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['certifications']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['certifications_details']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['free_shuttle_service']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['freeshuttleservice_details']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['laundry_service']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['gardens']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['nature_trails']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['socialfunctions_services']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['golf_court']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['tennis_court']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['conference_facilities']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['conferencefacilities_details']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['childcare']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['lift']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['spa']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['beauty_salon']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['room_service']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['concierge']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['i18n_dining&drinking']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['vegetarian']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['kosher']); ?>&nbsp;</td>
		<td><?php echo h($hotel['Hotel']['i18n_roomnotes']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hotel['Hotel']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hotel['Hotel']['product_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hotel['Hotel']['product_id']), null, __('Are you sure you want to delete # %s?', $hotel['Hotel']['product_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Hotel'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Categories'), array('controller' => 'hotel_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Category'), array('controller' => 'hotel_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
	</ul>
</div>
