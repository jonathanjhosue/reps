<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
?>
<div class="products index">
	<h2>Products</h2>
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<!-- starts encabezado de tabla -->
			<?php echo $this->Html->tableHeaders(array('Id', 'Location', 'Gpslatitude', 'Gpslongitude', 'Actions')); ?>
			<!-- ends encabezado de tabla -->

			<!-- starts procesamiento de los productos registrados -->	
			<?php	foreach ($products as $product):?>
			<tr <?php if($altrow){echo 'class="altrow"'; $altrow = false;}else{$altrow = true;} ?> >
				<td><?php echo $product['Product']['id'];?></td>
				<td><?php echo $product['Location']['location_name'];?></td>
				<td><?php echo $product['Product']['gpslatitude'];?></td>
				<td><?php echo $product['Product']['gpslongitude'];?></td>
				<td class="actions">
					<?php echo $this->Html->link('View', array('action'=>'view', 'id'=>$product['Product']['id']) ); ?>
					<?php echo $this->Html->link('Edit', array('action'=>'edit', 'id'=>$product['Product']['id']) ); ?>
					<?php echo $this->Html->link('Delete', array('action'=>'delete', 'id'=>$product['Product']['id']), null, 'Are you sure you want to delete #'.$product['Product']['id']); ?>
				</td>
			</tr>	
			<?php endforeach; ?>
			<!-- ends procesamiento de los productos registrados -->	
			
		</tbody>
	</table>
</div>
<div class="paging">
	<div class="disabled">&lt;&lt; previous</div> | <div class="disabled">next &gt;&gt;</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('New Product',array('action' => 'add'))?></li>
	</ul>
</div>
<?php pr($products) ?> 