<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
print_r($hotels);?>
<div class="hotels index">
	<h2>Hotels</h2>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>Id</th>
				<th>Product</th>
				<th>Hotel Category</th>
				<th>Hotel Name</th>
				<th>Total Rooms</th>
				<th>Infant Age Max</th>
				<th>Child Age Max</th>
				<th>Actions</th>
			</tr>
			<?php foreach($hotels as $hotel): ?>
			<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
				<td><?php echo $hotel['Hotel']['id']; ?></td>
				<td><?php echo $hotel['Hotel']['product_id']; ?></td>
				<td><?php echo $hotel['HotelCategory']['category_name']; ?></td>
				<td><?php echo $hotel['Hotel']['hotel_name']; ?></td>
				<td><?php echo $hotel['Hotel']['total_rooms']; ?></td>
				<td><?php echo $hotel['Hotel']['infant_age_max']; ?></td>
				<td><?php echo $hotel['Hotel']['child_age_max']; ?></td>
				<td class="actions">
					<?php echo $html->link('View', array('action'=>'view', 'id'=>$hotel['Hotel']['id']) ); ?>
					<?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$hotel['Hotel']['id']) ); ?>
					<?php echo $html->link('Delete', array('action'=>'delete', 'id'=>$hotel['Hotel']['product_id']), null, 'Are you sure you want to delete '.$hotel['Hotel']['hotel_name']); ?>
				</td>
			</tr>
			<?php endforeach; ?> 
		</tbody>
	</table>
</div>
<div class="paging">
	<div class="disabled">&lt;&lt; previous</div> | <div class="disabled">next &gt;&gt;</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('New Hotel',array('action' => 'add'))?></li>
	</ul>
</div>
