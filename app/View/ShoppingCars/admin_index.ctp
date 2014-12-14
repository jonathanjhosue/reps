<div class="vehicles index">
	<h1><?php echo __('Vehicles');?></h1>
        <table cellpadding="0" cellspacing="0" class="jtable">
	<thead><tr>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('Rentacar.name',__('Rentacar'));?></th>
                        <th><?php echo $this->Paginator->sort('VehicleCategory.name',__('Category'));?></th>
                        <th><?php echo $this->Paginator->sort('subcategory');?></th>
                        <th><?php echo $this->Paginator->sort('type');?></th>			
                        <th><?php echo $this->Paginator->sort('fuel');?></th>
                        <th class="actions"><?php echo __('Actions');?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	foreach ($vehicles as $vehicle): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($vehicle['Vehicle']['product_id'], array('controller' => 'vehicles', 'action' => 'admin_edit', $vehicle['Vehicle']['product_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vehicle['Rentacar']['Product']['product_name'], array('controller' => 'vehicle_categories', 'action' => 'view', $vehicle['Vehicle']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($vehicle['VehicleCategory']['name'], array('controller' => 'vehicle', 'action' => 'view', $vehicle['Vehicle']['product_id'])); ?>
		</td>
                <td>
			<?php echo $this->Html->link($vehicle['Vehicle']['subcategory'], array('controller' => 'vehicles', 'action' => 'admin_edit', $vehicle['Vehicle']['product_id'])); ?>
		</td>
                 <td>
			<?php echo $this->Html->link($vehicle['Vehicle']['type'], array('controller' => 'vehicles', 'action' => 'admin_edit', $vehicle['Vehicle']['product_id'])); ?>
		</td>

                <td>
			<?php echo $this->Html->link($vehicle['Vehicle']['fuel'], array('controller' => 'vehicle', 'action' => 'view', $vehicle['Vehicle']['product_id'])); ?>
		</td>
                	
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('admin'=>false,'action' => 'view', $vehicle['Vehicle']['product_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $vehicle['Vehicle']['product_id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $vehicle['Vehicle']['product_id']), null, __('Are you sure you want to delete # %s?', $vehicle['Vehicle']['product_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
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

<?php pr($vehicles) ?>

