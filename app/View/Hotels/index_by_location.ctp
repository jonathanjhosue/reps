<?php $totalPanel = 10; //cada panel pertenece a una región. Según el país en el que se utilice el sistema, se debe indicar la cantidad de regiones=panels que posee.
		echo $this->element('v_nav_regions',array('cache' => array('time' => '+1 day'))); ?>

<div class="hotels index_by_location" style="width:85%;">
	<h2>Hotels</h2>
		<?php foreach($hotels as $hotel): ?>
		<td>
			<table cellspacing="0" cellpadding="0" border="1" style="width:27%; clear:none; float:left; margin-right:0.5%;">
				<tbody>
					<tr>
						<td><?php echo $this->Html->link($this->Html->image('hotels/'.$hotel['Image'][0]['image_name'], array('alt' => $hotel['Product']['product_name'], 'width'=>'100%')),array('action'=>'view', $hotel['Hotel']['id']), array('escape'=>false) );
						?> </td>
					</tr>
					<tr>
						<td><?php echo $this->Html->link($hotel['Product']['product_name'], array('action'=>'view', $hotel['Hotel']['id'],'sd')); ?><br/>
							<?php echo $hotel['HotelCategory']['category_name']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</td> 
		<?php endforeach; ?>

</div>
<?php pr($hotels) ?>