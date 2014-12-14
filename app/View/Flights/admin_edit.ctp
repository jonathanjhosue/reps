<?php	
      //  echo $this->Html->script('easypaginate/easypaginate.min.js');  
      //   echo $this->Html->css('easypaginate/easypaginate.css');
            echo $this->Html->script('jPaginate.js');   
   echo $this->Html->script('dljquery.js');
    echo $this->Html->scriptBlock(
            '
            function changeFlightType(){
                $(".flightType").hide();
                $("#FlightType_"+$( "#FlightType" ).val()).show();
            }   
                
            $(function() {
	        $( "#tabs" ).tabs({
                   // cookie: {  expires: 1 }
                });
                $( "input:submit" ).button();   
                $( "#FlightType" ).change(function(){changeFlightType();});
                
                changeFlightType();

      
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>

<h1><?php echo __('Edit Flight'); ?></h1>

<div class="packages form">
    
<div id="tabs">
    <ul>
    <li><a href="#tabs-1"><?php echo __('Flight'); ?></a></li>
    <li><a href="#tabs-2"><?php echo __('Aditional Services'); ?></a></li>
    <li><a href="#tabs-3"><?php echo __('Tips and Safety'); ?></a></li>
    </ul>
     <?php echo $this->Form->create('Flight', array('type' => 'file')); ?>
    <div id="tabs-1">
       
 <?php
                  echo $this->Form->input('Product.id',array('type'=>'hidden')); 
                  echo $this->Form->input('product_id',array('type'=>'hidden')); 
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
        
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Flight]'));
            ?>  
        
    </div>
    <div id="tabs-2">
                    
              <fieldset  class="fieldsetAditionalServices">
            <div class="divAditionalServices" >
               <table class="jtable">
                    <thead>
                      
                       
                        <tr>
                            <th  colspan="7"><?php echo __(' Aditional Services') ?></th>
                            
                        </tr>
                        
                        
                        
                        <tr>
                            <th ><?php echo __('Name'); ?> </th>
                            <th><?php echo __('Price net'); ?></th>
                            <th><?php echo __('Price rack'); ?></th>
                                                   
                            <th><?php echo __('Type'); ?></th>
                           
                            <th>
                            
                            </th>
                        </tr>
                        
                        
                    </thead>
                    <tbody>
                        
                         <tr>
                            <td >
                                <?php
                                    
                                    echo $this->Form->input('AditionalService.product_id',array('type'=>'hidden','value'=>$this->request->data['Flight']['product_id']));
                                    echo $this->Form->input('AditionalService.name',array('div'=>false,'label'=>false));
                                ?>
                            </td>
                            <td><?php echo $this->Form->input('AditionalService.price_net',array('div'=>false,'label'=>false)); ?></td>
                            <td><?php echo $this->Form->input('AditionalService.price_rack',array('div'=>false,'label'=>false)); ?></td>

                            <td><?php 
                            $types=array('UNIT'=>__('Unit'),'FLIGHT'=>__('Flight'));
                            echo $this->Form->input('AditionalService.type',
                                    array('type'=>'select','options'=>$types,'div'=>false,'label'=>false)); 
                            
                            ?></td>
                            <td>
                            <?php                        
                                echo $this->Form->submit(__('Add New'),array('div'=>false,'name'=>'data[Action][Add][AditionalService]'));
                            ?> 
                            </td>
                        </tr>
                        
                        <?php                
                            foreach($this->request->data['AditionalService'] as $key=>$item):
                              
                         ?>                           
                            <tr>
                                <td >
                                   <?php
                                   // echo $key+1;
                                            echo $this->Form->input('AditionalService.'.$key.'.id',array('type'=>'hidden','label'=>false));
                                            echo $this->Form->input('AditionalService.'.$key.'.name' ,array('label'=>false, 'div'=>false));
                                   ?>
                                       
                                </td> 
                                <td><?php echo $this->Form->input('AditionalService.'.$key.'.price_net' ,array('label'=>false, 'div'=>false)); ?> </td>
                                <td><?php echo $this->Form->input('AditionalService.'.$key.'.price_rack' ,array('label'=>false, 'div'=>false)); ?> </td>  
                                <td><?php 
                                echo $this->Form->input('AditionalService.'.$key.'.type',array('type'=>'select','options'=>$types,'div'=>false,'label'=>false)); 
                                ?> </td>
                                <td >
                                    <?php                                  
                                            echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][AditionalService]['.$item['id'].']', 'div'=>false)); 
                                     ?>
                                </td>
                         </tr>
                        <?php    
                            endforeach;               
                        ?>
                    </tbody>
                </table>
           </div>
            
        </fieldset>
          
  
        <fieldset class="packagesActions"> 
                <?php 
                    echo $this->Form->input('id',array('type'=>'hidden'));
                    echo $this->Form->input('product_id',array('type'=>'hidden'));
                    echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Flight]'));
                   
                ?>  
         </fieldset> 
     
    </div>
    
    <div id="tabs-3">
        <div id="divTipsAndSafety">
            
           <?php 
               echo $this->element('admin_tipsandsafety');
            ?> 
            
            
        </div>
	
         
        <fieldset class="hotelsActions"> 
                
             <div class="buttongroup">
                 <?php 
                    echo $this->Form->input('Action.Add.TipsAndSafety_count',array('type'=>'text','label'=>__('New Tips And Safety'),'maxlength'=>2,'div'=>'number','value'=>1));
                    echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][TipsAndSafety]'));
                   ?> 
             </div>
                    <?php     
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Flight]'));
                    ?>  
        </fieldset>
        
   
    </div>
    
  <?php  echo $this->Form->end();  ?>
</div>
          
</div>

<div class="actions">
	<ul>
		<li>
			<?php echo $this->Form->postLink('Delete', array('controller'=>'packages', 'action'=>'delete', $this->Form->value('Product.id')), null, 'Are you sure you want to delete this Flight?'); ?>
		</li>			
		<li><?php echo $this->Html->link('Back to Flights', array('action'=>'index')); ?></li>
                <li>
			<?php echo $this->Html->link('View', array('admin'=>false,'controller'=>'packages', 'action'=>'view', $this->Form->value('Product.id'))); ?>
		</li>
	</ul>
</div>


