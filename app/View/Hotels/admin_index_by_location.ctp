<?php 	echo $this->element('v_nav_regions');
		$altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
		
		//Se extrae el nombre del Location al cual pertenecen los Hotels consultados.
		foreach($regions as $region):
			foreach ($region['Location'] as $location): 
				if ($location['id']==$actual_location){$actual_location = $location['location_name'];}
			endforeach;
		endforeach;	
?>
<div class="hotels index" style="width:85%;">
	<h2>Hotels</h2>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>Hotel Id</th>
				<th>Product Id</th>
				<th>Hotel Name</th>
				<th>Hotel Category</th>				
				<th>Location</th>
				<th>Actions</th>
			</tr>
			<?php foreach($hotels as $hotel): ?>
			<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
				<td><?php echo $hotel['Hotel']['id']; ?></td>
				<td><?php echo $hotel['Hotel']['product_id']; ?></td>
				<td><?php echo $hotel['Hotel']['hotel_name']; ?></td>
				<td><?php echo $hotel['HotelCategory']['category_name']; ?></td>				
				<td><?php echo $actual_location; ?></td>
				<td class="actions">
					<?php echo $this->Html->link('View', array('action'=>'view', 'id'=>$hotel['Hotel']['id']) ); ?>
					<?php echo $this->Html->link('Edit', array('action'=>'edit', 'id'=>$hotel['Hotel']['id']) ); ?>
					<?php echo $this->Html->link('Delete', array('action'=>'delete', 'id'=>$hotel['Hotel']['product_id']), null, 'Are you sure you want to delete '.$hotel['Hotel']['hotel_name']); ?>
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
