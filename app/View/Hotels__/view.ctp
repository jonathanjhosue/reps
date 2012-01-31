<div class="hotels view">
<h2><?php  echo __('Hotel');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['Product']['id'], array('controller' => 'products', 'action' => 'view', $hotel['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotel Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($hotel['HotelCategory']['category_name'], array('controller' => 'hotel_categories', 'action' => 'view', $hotel['HotelCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Child Age Max'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['child_age_max']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infant Age Max'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['infant_age_max']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Child Age Min'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['child_age_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Infant Age Min'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['infant_age_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Check In'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['check_in']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Check Out'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['check_out']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurant'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['restaurant']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bar'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['bar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Swimmingpool'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['swimmingpool']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wet Bar'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['wet_bar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wheelchair Accessible'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['wheelchair_accessible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Internet'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['internet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Center'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['business_center']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fitness Center'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['fitness_center']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Private Car Park'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['private_car_park']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gift Shop'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['gift_shop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tour Desk'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['tour_desk']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certifications'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['certifications']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certifications Details'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['certifications_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Free Shuttle Service'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['free_shuttle_service']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freeshuttleservice Details'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['freeshuttleservice_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Laundry Service'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['laundry_service']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gardens'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['gardens']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nature Trails'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['nature_trails']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Socialfunctions Services'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['socialfunctions_services']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Golf Court'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['golf_court']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tennis Court'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['tennis_court']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conference Facilities'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['conference_facilities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conferencefacilities Details'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['conferencefacilities_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Childcare'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['childcare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lift'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['lift']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spa'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['spa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Beauty Salon'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['beauty_salon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room Service'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['room_service']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concierge'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['concierge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('I18n Dining&drinking'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['i18n_dining&drinking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vegetarian'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['vegetarian']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kosher'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['kosher']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('I18n Roomnotes'); ?></dt>
		<dd>
			<?php echo h($hotel['Hotel']['i18n_roomnotes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel'), array('action' => 'edit', $hotel['Hotel']['product_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel'), array('action' => 'delete', $hotel['Hotel']['product_id']), null, __('Are you sure you want to delete # %s?', $hotel['Hotel']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Images');?></h3>
	<?php if (!empty($hotel['Image'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Image Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Owner Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id'];?></td>
			<td><?php echo $image['image_name'];?></td>
			<td><?php echo $image['type'];?></td>
			<td><?php echo $image['owner_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'images', 'action' => 'delete', $image['id']), null, __('Are you sure you want to delete # %s?', $image['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related I18n Keys');?></h3>
	<?php if (!empty($hotel['I18nKey'])):?>
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
		foreach ($hotel['I18nKey'] as $i18nKey): ?>
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
<div class="related">
	<h3><?php echo __('Related Rooms');?></h3>
	<?php if (!empty($hotel['Room'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Count'); ?></th>
		<th><?php echo __('I18n Description'); ?></th>
		<th><?php echo __('I18n Include'); ?></th>
		<th><?php echo __('Suite Bathrooms'); ?></th>
		<th><?php echo __('Free Internet'); ?></th>
		<th><?php echo __('Air Conditioning'); ?></th>
		<th><?php echo __('Orthopedic Matresses'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Alarm Clock'); ?></th>
		<th><?php echo __('Cable Tv'); ?></th>
		<th><?php echo __('Desk & Chair'); ?></th>
		<th><?php echo __('Jacuzzi'); ?></th>
		<th><?php echo __('Hairdryer'); ?></th>
		<th><?php echo __('Minibar'); ?></th>
		<th><?php echo __('Coffee Maker'); ?></th>
		<th><?php echo __('Microwave'); ?></th>
		<th><?php echo __('Refrigerator'); ?></th>
		<th><?php echo __('Iron & Ironing Board'); ?></th>
		<th><?php echo __('Safe Deposit Box'); ?></th>
		<th><?php echo __('Fan'); ?></th>
		<th><?php echo __('Make Up Mirror'); ?></th>
		<th><?php echo __('Balcony'); ?></th>
		<th><?php echo __('Private Garden'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['Room'] as $room): ?>
		<tr>
			<td><?php echo $room['id'];?></td>
			<td><?php echo $room['hotel_id'];?></td>
			<td><?php echo $room['category'];?></td>
			<td><?php echo $room['count'];?></td>
			<td><?php echo $room['i18n_description'];?></td>
			<td><?php echo $room['i18n_include'];?></td>
			<td><?php echo $room['suite_bathrooms'];?></td>
			<td><?php echo $room['free_internet'];?></td>
			<td><?php echo $room['air_conditioning'];?></td>
			<td><?php echo $room['orthopedic_matresses'];?></td>
			<td><?php echo $room['telephone'];?></td>
			<td><?php echo $room['alarm_clock'];?></td>
			<td><?php echo $room['cable_tv'];?></td>
			<td><?php echo $room['desk_&_chair'];?></td>
			<td><?php echo $room['jacuzzi'];?></td>
			<td><?php echo $room['hairdryer'];?></td>
			<td><?php echo $room['minibar'];?></td>
			<td><?php echo $room['coffee_maker'];?></td>
			<td><?php echo $room['microwave'];?></td>
			<td><?php echo $room['refrigerator'];?></td>
			<td><?php echo $room['iron_&_ironing_board'];?></td>
			<td><?php echo $room['safe_deposit_box'];?></td>
			<td><?php echo $room['fan'];?></td>
			<td><?php echo $room['make_up_mirror'];?></td>
			<td><?php echo $room['balcony'];?></td>
			<td><?php echo $room['private_garden'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rooms', 'action' => 'view', $room['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rooms', 'action' => 'edit', $room['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rooms', 'action' => 'delete', $room['id']), null, __('Are you sure you want to delete # %s?', $room['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Seasons');?></h3>
	<?php if (!empty($hotel['Season'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Date Start'); ?></th>
		<th><?php echo __('Date End'); ?></th>
		<th><?php echo __('Hotel Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($hotel['Season'] as $season): ?>
		<tr>
			<td><?php echo $season['id'];?></td>
			<td><?php echo $season['name'];?></td>
			<td><?php echo $season['date_start'];?></td>
			<td><?php echo $season['date_end'];?></td>
			<td><?php echo $season['hotel_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seasons', 'action' => 'view', $season['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seasons', 'action' => 'edit', $season['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seasons', 'action' => 'delete', $season['id']), null, __('Are you sure you want to delete # %s?', $season['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
