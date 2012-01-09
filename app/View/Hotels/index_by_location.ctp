<?php $totalPanel = 10; //cada panel pertenece a una región. Según el país en el que se utilice el sistema, se debe indicar la cantidad de regiones=panels que posee.
		echo $this->element('v_nav_regions'); ?>

<div class="hotels index_by_location" style="width:85%;">
	<h2>Hotels</h2>
		<?php foreach($hotels as $hotel): ?>
		<td>
			<table cellspacing="0" cellpadding="0" border="1" style="width:27%; clear:none; float:left; margin-right:0.5%;">
				<tbody>
					<tr>
						<td><?php echo $html->link($html->image('hotels/'.$hotel['Product']['image']['Image']['image_name'], array('alt' => $hotel['Hotel']['hotel_name'], 'width'=>'100%')),array('action'=>'view', 'id'=>$hotel['Hotel']['id']), array('escape'=>false) );
						?> </td>
					</tr>
					<tr>
						<td><?php echo $html->link($hotel['Hotel']['hotel_name'], array('action'=>'view', 'id'=>$hotel['Hotel']['id'])); ?><br/>
							<?php echo $hotel['HotelCategory']['category_name']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</td> 
		<?php endforeach; ?>
</div>
