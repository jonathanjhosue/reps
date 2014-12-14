<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
/*print_r($vehicle); 
print('\n');
print_r($product);
print('\n');
print_r($languages);*/ ?>

<div class="vehicles view">
	<div class="serviceImage">
		<h2><?php echo __('View Vehicle'); ?></h2>
	</div>
	<dl>
		<dt class="altrow">Id</dt>
		<dd class="altrow"><?php echo $Vehicle['Vehicle']['product_id']; ?>&nbsp;</dd>
		<dt class="altrow">Rentacar</dt>
		<dd class="altrow"><?php echo $Vehicle['Rentacar']['name']; ?>&nbsp;</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd><?php echo $Vehicle['VehicleCategory']['name']; ?>&nbsp;</dd>                
                <dt><?php echo __('Subcategory'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['subcategory']; ?>&nbsp;</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['type']; ?>&nbsp;</dd>
                <dt><?php echo __('Engine'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['engine']; ?>&nbsp;</dd>
		<dt><?php echo __('Transmission'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['transmission']; ?>&nbsp;</dd>
		<dt><?php echo __('Fuel'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['fuel']; ?>&nbsp;</dd>
                <dt><?php echo __('Pax'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['pax']; ?>&nbsp;</dd>
                <dt><?php echo __('Doors'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['doors']; ?>&nbsp;</dd>
                <dt><?php echo __('Luggage'); ?></dt>
		<dd><?php echo $Vehicle['Vehicle']['luggage']; ?>&nbsp;</dd>
	</dl>
</div>

<div class="actions" >
	<ul>
		<li><?php echo $this->Html->link('Edit Vehicle', array('action'=>'edit', 'id'=>$Vehicle['Vehicle']['product_id']) ); ?></li>
                <li><?php echo $this->Form->postLink(__('Delete Vehicle'), array('action' => 'delete', $Vehicle['Vehicle']['product_id']), null, __('Are you sure you want to delete # %s?', $Vehicle['Vehicle']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link('Back to Vehicles', array('action'=>'index')); ?></li>
		<li><?php echo $this->Html->link('New Vehicle', array('action'=>'add')); ?></li>
	</ul>
</div>