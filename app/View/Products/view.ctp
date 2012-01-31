<?php print_r($product);?>
<div class="products view">
	<h2>View Product</h2>
	<dl>
		<dt class="altrow">Id</dt>
		<dd class="altrow"><?php echo $product['Product']['id']; ?>&nbsp;</dd>
		<dt>Location</dt>
		<dd><?php echo $html->link($product['Location']['location_name'], array('controller'=>'locations', 'action'=>'view', 'id'=>$product['Location']['id']) ); ?>&nbsp;</dd>
		<dt class="altrow">Gpslatitude</dt>
		<dd class="altrow"><?php echo $product['Product']['gpslatitude']; ?>&nbsp;</dd>
		<dt>Gpslongitude</dt>
		<dd><?php echo $product['Product']['gpslongitude']; ?>&nbsp;</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Product', array('action'=>'edit', 'id'=>$product['Product']['id']) ); ?></li>
		<li><?php echo $html->link('Delete Product', array('action'=>'delete', 'id'=>$product['Product']['id']), null, 'Are you sure you want to delete this product?'); ?></li>
		<li><?php echo $html->link('List Products', '/Products'); ?></li>
		<li><?php echo $html->link('New Product', '/Products/add'); ?></li>
	</ul>
</div>
