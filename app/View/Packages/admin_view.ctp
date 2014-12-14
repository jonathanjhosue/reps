<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
/*print_r($package); 
print('\n');
print_r($product);
print('\n');
print_r($languages);*/ ?>

<div class="packages view">
	<div class="serviceImage">
		<h2>View Package</h2>
	</div>
	<dl>
		<dt class="altrow">Id</dt>
		<dd class="altrow"><?php echo $package['Package']['product_id']; ?>&nbsp;</dd>
		<dt class="altrow">Product</dt>
		<dd class="altrow"><?php echo $package['Product']['id']; ?>&nbsp;</dd>
		<dt>Location</dt>
		<dd><?php echo $package['Product']['tour_location']; ?>&nbsp;</dd>
		<dt>Package Name</dt>
		<dd><?php echo $package['Product']['product_name']; ?>&nbsp;</dd>
		<dt>Infant Age Max</dt>
		<dd><?php echo $package['Package']['pax_max']; ?>&nbsp;</dd>
		
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Package', array('action'=>'edit', 'id'=>$package['Package']['id']) ); ?></li>
		<li><?php echo $html->link('Delete Package', array('action'=>'delete', 'id'=>$package['Package']['product_id']), null, 'Are you sure you want to delete this Package?'); ?></li>
		<li><?php echo $html->link('Back to Packages', array('action'=>'index')); ?></li>
		<li><?php echo $html->link('New Package', array('action'=>'add')); ?></li>
	</ul>
</div>

<!-- Rooms ends-->
<!-- Reviews starts-->
<div class="related">
		<h3>Related Reviews</h3>
		<table cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<th>Id</th>
					<th>Product Id</th>
					<th>Language</th>
					<th>From</th>
					<th>Text</th>
					<th class="actions">Actions</th>
				</tr>
				<?php $altrow = true; foreach($product['Review'] as $review): ?>
				<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
					<td><?php echo $review['id']; ?></td>
					<td><?php echo $review['product_id']; ?></td>
					<td><?php echo $languages[$review['language_id']]; ?></td>
					<td><?php if ($review['from'] == 'S'){ echo 'Staff';}else{echo 'Traveller';} ?></td>
					<td><?php echo $review['text']; ?></td>
					<td class="actions">
						<?php echo $html->link('View', array('controller'=>'reviews', 'action'=>'view', 'id'=>$review['id']) ); ?>
						<?php echo $html->link('Edit', array('controller'=>'reviews', 'action'=>'edit', 'id'=>$review['id']) ); ?>
						<?php echo $html->link('Delete', array('controller'=>'reviews', 'action'=>'delete', 'id'=>$review['id']), null, 'Are you sure you want to delete the Review #'.$review['id']); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>		
		<div class="actions">
			<ul>
				<li><?php echo $html->link('New Review', array('controller'=>'reviews', 'action'=>'add')); ?></li>
			</ul>
		</div>
</div>

