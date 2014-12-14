<?php	
 
    echo $this->Html->scriptBlock(
            '
            function changeFlightType(){
                $(".flightType").hide();
                $("#FlightType_"+$( "#FlightType" ).val()).show();
            }    
                
            $(function() {
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();                
                $( "#FlightType" ).change(function(){changeFlightType();});
                
                changeFlightType();
                
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
?>

<h1><?php echo __('Add Flight'); ?></h1>
<div class="flights form">
 <?php echo $this->Form->create('Flight', array('type' => 'file'));?>
 <div id="tabs">
      
    <ul>
		<li><a href="#tabs-1"><?php echo __('Flight'); ?></a></li>
   </ul>
    
    <div id="tabs-1">
      <?php
                 echo $this->Form->input('Product.product_name',array('type'=>'hidden','value'=>'-')); 
                 echo $this->Form->input('type', array('options' => array('REGULAR'=>__('Regular'),'CHARTER'=>__('Charter'))));
                 echo $this->Form->input('leaving_from_id', array('options' => array($flightdestinations)));
                 echo $this->Form->input('flying_to_id', array('options' => array($flightdestinations)));
                 echo $this->Form->input('duration',array('label'=>__('Duration')));
                 echo $this->Form->input('oneway_fare',array('label'=>__('Oneway Fare')));
                 echo $this->Form->input('return_fare',array('label'=>__('Return Fare')));
                 echo $this->Form->input('round_trip',array('label'=>__('Round Trip')));
                              
    ?>
        <fieldset class="flightType" id="FlightType_REGULAR">
            <legend><?php echo __('Regular'); ?></legend>
    
    
      <?php
                 echo $this->Form->input("flight_number",array('label'=>__('Flight Number')));
                 echo $this->Form->input("frequency",array('label'=>__('Frequency')));
                 echo $this->Form->input("departure",array('label'=>__('Departure')));
                 echo $this->Form->input("arrival",array('label'=>__('Arrival')));
                 echo $this->Form->input('scale', array('options' => array(' '=>__('-'),'DIRECT'=>__('Direct'),'1_StopOver'=>__('1 Stop Over'),'2_StopOvers'=>__('2 Stop Overs'))));
    ?>
    </fieldset>
        <fieldset class="flightType" id="FlightType_CHARTER">
            <legend><?php echo __('Charter'); ?></legend>

         <?php
                 echo $this->Form->input("aircraft",array('label'=>__('Aircraft')));
                 echo $this->Form->input("capacity",array('label'=>__('Capacity')));
                 echo $this->Form->input("max_weight",array('label'=>__('Max Weight')));
                 echo $this->Form->input("hr_waiting",array('label'=>__('Hr/Waiting')));
                 
                
    ?>
               </fieldset>
    </div>
 
</div>

 
<?php echo $this->Form->end(__('Submit'));?>
</div>   
   
<?php pr( $dd); ?>
