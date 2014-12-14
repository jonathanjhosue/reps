<?php $altrow = true; //variable para controlar la distinción entre una línea y otra de una tabla.
/*print_r($flight); 
print('\n');
print_r($product);
print('\n');
print_r($languages);*/ ?>

<div class="vehicles view">
	<div class="serviceImage">
		<h2><?php echo __('View Flight'); ?></h2>
	</div>
	<dl>
		<dt class="altrow">Id</dt>
		<dd class="altrow"><?php echo $Flight['Flight']['product_id']; ?>&nbsp;</dd>
		<dt class="altrow">Flight Type</dt>
		<dd class="altrow"><?php echo $Flight['Flight']['type']; ?>&nbsp;</dd>
		<dt><?php echo __('Leaving from'); ?></dt>
		<dd><?php echo $Flight['FlightDestination']['name']; ?>&nbsp;</dd>                
                <dt><?php echo __('Flying to'); ?></dt>
		<dd><?php echo $Flight['FlightDestination2']['name']; ?>&nbsp;</dd>
		<dt><?php echo __('Flight number'); ?></dt>
		<dd><?php echo $Flight['Flight']['flight_number']; ?>&nbsp;</dd>
                <dt><?php echo __('Frequency'); ?></dt>
		<dd><?php echo $Flight['Flight']['frequency']; ?>&nbsp;</dd>
		<dt><?php echo __('Departure'); ?></dt>
		<dd><?php echo $Flight['Flight']['departure']; ?>&nbsp;</dd>
		<dt><?php echo __('Arrival'); ?></dt>
		<dd><?php echo $Flight['Flight']['arrival']; ?>&nbsp;</dd>
                <dt><?php echo __('Duration'); ?></dt>
		<dd><?php echo $Flight['Flight']['duration']; ?>&nbsp;</dd>
                <dt><?php echo __('One Way Fare'); ?></dt>
		<dd><?php echo $Flight['Flight']['oneway_fare']; ?>&nbsp;</dd>
                <dt><?php echo __('Return Fare'); ?></dt>
		<dd><?php echo $Flight['Flight']['return_fare']; ?>&nbsp;</dd>
                <dt><?php echo __('Scales'); ?></dt>
		<dd><?php echo $Flight['Flight']['scale']; ?>&nbsp;</dd>
                <dt><?php echo __('Aircraft'); ?></dt>
		<dd><?php echo $Flight['Flight']['aircraft']; ?>&nbsp;</dd>
                <dt><?php echo __('Capacity'); ?></dt>
		<dd><?php echo $Flight['Flight']['capacity']; ?>&nbsp;</dd>
                <dt><?php echo __('Max Weight'); ?></dt>
		<dd><?php echo $Flight['Flight']['max_weight']; ?>&nbsp;</dd>
                <dt><?php echo __('Round Trip'); ?></dt>
		<dd><?php echo $Flight['Flight']['round_trip']; ?>&nbsp;</dd>
                <dt><?php echo __('Hr/Waiting'); ?></dt>
		<dd><?php echo $Flight['Flight']['hr_waiting']; ?>&nbsp;</dd>
                <dt><?php echo '________________________________________________________________'; ?></dt>
                <dt><?php echo '* blank spaces does not apply for this flight'; ?></dt>
		
        </dl><br>
</div>

<div class="actions" >
	<ul>
		<li><?php echo $this->Html->link('Edit Flight', array('action'=>'edit', 'id'=>$Flight['Flight']['product_id']) ); ?></li>
                <li><?php echo $this->Form->postLink(__('Delete Flight'), array('action' => 'delete', $Flight['Flight']['product_id']), null, __('Are you sure you want to delete # %s?', $Flight['Flight']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link('Back to Flights', array('action'=>'index')); ?></li>
		<li><?php echo $this->Html->link('New Flight', array('action'=>'add')); ?></li>
	</ul>
</div>