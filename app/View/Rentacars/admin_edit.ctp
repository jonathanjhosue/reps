<?php	
      //  echo $this->Html->script('easypaginate/easypaginate.min.js');  
      //   echo $this->Html->css('easypaginate/easypaginate.css');
            echo $this->Html->script('jPaginate.js');   
   echo $this->Html->script('dljquery.js');
    echo $this->Html->scriptBlock(
            '$(function() {
		$( "#divItinerary" ).accordion({autoHeight: false,navigation: true,collapsible: true,active:false,  header:"div > h3"});
                $( "#divReviews" ).accordion({autoHeight: false,navigation: true,collapsible: true});
                $( "#divRoomRates" ).accordion({autoHeight: false,navigation: true,collapsible: true});
                $( "#tabs" ).tabs({
                   // cookie: {  expires: 1 }
                });
                $( "input:submit" ).button();    
                 $(".tableLocationRentacar").hide();
                $(".locationrentacar_"+$("#RentacarSelectLocationRentacar").attr("value")).show();
                
                if($("#tablePickupDropoff div.error-message").length){
                 $("#selectPickupDropoff").addClass("error");
                }

        $("#RentacarSelectLocationRentacar").change(function()
        {
            //alert("Value change to " + $(this).attr("value"));
            $(".tableLocationRentacar").hide();
             $(".locationrentacar_"+$(this).attr("value")).show();
            
        });

       $("#divItinerary").jPaginate({items: 10,next:"'.__('Next').'",previous:"'.__('Previous').'"});

             /*   $("#divItinerary").easyPaginate({
                    step: 4,
                    nextprev:false
                }); */
                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>

<h1><?php echo __('Edit Rentacar'); ?></h1>

<div class="packages form">
    

    <?php 
    $indexI18n=0 ; 
    ?>
	
<div id="tabs">
    <ul>
		<li><a href="#tabs-1"><?php echo __('Overview'); ?></a></li>
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
                <li><a href="#tabs-3"><?php echo __('Pickup / Drop Off'); ?></a></li>
                <li><a href="#tabs-4"><?php echo __('Tips and Safety'); ?></a></li>
                <li><a href="#tabs-5"><?php echo __('Aditional Services'); ?></a></li>
		<li><a href="#tabs-6"><?php echo __('Season'); ?></a></li>
              
	</ul>
     <?php echo $this->Form->create('Rentacar', array('type' => 'file')); ?>
    <div id="tabs-1">
       

	<?php
        echo $this->Form->input('Product.id',array('readonly'=>true));
        echo $this->Form->input('Product.product_name',array('label'=>__('Rentacar Name'),'div'=>'name')); 
         echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));
        $inputs=array(array('type'=>TiposGlobal::I18N_TYPE_RENTACAR_SERVICENOTES,array('label'=>__('Service Notes'),'type'=>'textarea')));
        echo $this->RipsWeb->getInputsI18nAll($indexI18n,
                            $this->data['I18nKey'],
                            'I18nKey',
                            $inputs
                            );         
        
        
        $locationRentacars=Set::combine($this->data['LocationRentacar'],'{n}.id','{n}.name');
         ?>
        
        <fieldset  class="fieldsetLocationRentacars">
            <div class="divLocationRentacar" >
               <table class="jtable">
                    <thead>
                        <tr>

                            <th colspan="3" >
                                    <?php 
                                    echo __(' New Pickup / Drop Off');
                                    ?>
                                </th>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <?php
                                    
                                    echo $this->Form->input('LocationRentacar.rentacar_id',array('type'=>'hidden','value'=>$this->request->data['Rentacar']['product_id']));
                                    echo $this->Form->input('LocationRentacar.name',array('label'=>__('Location Name'),'required'=>false));
                                ?>
                            </th>
                            <th>
                            <?php                        
                                echo $this->Form->submit(__('Add New'),array('div'=>false,'name'=>'data[Action][Add][LocationRentacar]'));
                            ?> 
                            </th>
                        </tr>
                        
                       
                        <tr>
                            <th  colspan="3"><?php echo __('Location Name') ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php                
                            foreach($this->request->data['LocationRentacar'] as $key=>$location):
                              
                         ?>                           
                            <tr>
                                <td   colspan="2">
                                   <?php
                                   // echo $key+1;
                                            echo $this->Form->input('LocationRentacar.'.$key.'.id',array('type'=>'hidden','label'=>false));
                                            echo $this->Form->input('LocationRentacar.'.$key.'.name' ,array('label'=>false, 'div'=>false));
                                   ?>
                                       
                                </td>                                 
                                <td >
                                    <?php                                  
                                            echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][LocationRentacar]['.$location['id'].']', 'div'=>false)); 
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
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Rentacar]'));
               
            ?>  
         </fieldset> 
         
    </div>
    <div id="tabs-2">
         
	  <?php  echo $this->element('admin_images',
                                    array('totalImages'=>Configure::read('Hotels.TotalImages'),
                                          'tipo'=>TiposGlobal::PRODUCT_TYPE_RENTACAR
                                         )
                                    ); 
          ?>
        
         <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Rentacar]'));
              
            ?>  
         </fieldset> 
        
   
    </div>
    <div id="tabs-3">
         <fieldset  class="fieldsetLocationRentacars">
            <div class="divLocationRentacar" >
                <table id="tablePickupDropoff" class="jtable">
                    <thead>
                        <tr>

                                <th colspan="3">
                                    <?php 
                                    echo __(' New Pickup / Drop Off');
                                    ?>
                                </th>
                        </tr>
                                                
                        <tr>
                            <th colspan="3" id="selectPickupDropoff">
                                <?php 
                                echo __('Pick up');
                                echo $this->Form->input('SelectLocationRentacar',array('label'=>__('Location Rentacar'),'type'=>'select','options'=>$locationRentacars));
                                 ?>
                            </th>
                        </tr>
                        
                    <tbody>
                        <?php                
                            foreach($this->request->data['LocationRentacar'] as $key1=>$location1):
                                $rentacarPrices=$location1['RentacarPrice'];
                                $rentacarPrices=Set::combine($rentacarPrices, array('{0}:{1}', '{n}.location_id1', '{n}.location_id2'), '{n}');
                         ?>                           
                            <tr>
                                <td colspan="3" class="tableLocationRentacar locationrentacar_<?php echo $location1['id']?>">
                                    <table class="jtable" >
                                        <thead>
                                        <tr>
                                                <th><?php echo __('Drop Off') ?></th><th><?php echo __('Rack') ?></th><th><?php echo __('Net') ?></th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                    <?php    
                                    
                                    foreach($this->request->data['LocationRentacar'] as $key2=>$location2):
                                        
                                        $rentacarPrice=array('rack'=>'','net'=>'','location_id2'=>$location1['id'],'location_id2'=>$location2['id']);
                          
                                         if(isset($rentacarPrices[$location1['id'].':'.$location2['id']])){
                                            $rentacarPrice=$rentacarPrices[$location1['id'].':'.$location2['id']];                         
                                        }  
                                    ?>                           
                                        <tr>
                                            <td><?php 
                                            if(isset($rentacarPrice['id'])){
                                               echo $this->Form->input('LocationRentacar.'.$key1.'.RentacarPrice.'.$key2.'.id',array('type'=>'hidden','value'=>$rentacarPrice['id'],'label'=>false));
                                            }
                                            echo $this->Form->input('LocationRentacar.'.$key1.'.RentacarPrice.'.$key2.'.location_id1',array('type'=>'hidden','value'=>$location1['id'],'label'=>false));
                                            echo $this->Form->input('LocationRentacar.'.$key1.'.RentacarPrice.'.$key2.'.location_id2',array('type'=>'hidden','value'=>$location2['id'],'label'=>false));

                                            echo $locationRentacars[$rentacarPrice['location_id2']];
                                                ?>
                                            </td> 
                                            <td><?php echo $this->Form->input('LocationRentacar.'.$key1.'.RentacarPrice.'.$key2.'.rack', array('label'=>false,'div'=>false,'class'=>'number','value'=>$rentacarPrice['rack'])) ?></td> 
                                            <td><?php echo $this->Form->input('LocationRentacar.'.$key1.'.RentacarPrice.'.$key2.'.net', array('label'=>false,'div'=>false,'class'=>'number','value'=>$rentacarPrice['net']))  ?></td>
                                        </tr>

                                    <?php    
                                        endforeach;               
                                    ?>
                                        </tbody>
                                    </table>
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
                    echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Rentacar]'));
                   
                ?>  
         </fieldset> 
       
    </div>
    <div id="tabs-4">
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
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Rentacar]'));
                    ?>  
        </fieldset>
        
   
    </div>
    <div id="tabs-5">
                    
              <fieldset  class="fieldsetAditionalServices">
            <div class="divAditionalServices" >
               <table class="jtable">
                    <thead>
                      
                       
                        <tr>
                            <th  colspan="7"><?php echo __(' Aditional Services') ?></th>
                            
                        </tr>
                        
                        
                        
                        <tr>
                            <th ><?php echo __('Name'); ?> </th>
                            <th><?php echo __('Price daily net'); ?></th>
                            <th><?php echo __('Price daily rack'); ?></th>
                                                   
                             <th><?php echo __('Price weekly net'); ?></th>
                            <th><?php echo __('Price weekly rack'); ?></th>
                            <th><?php echo __('Type'); ?></th>
                           
                            <th>
                            
                            </th>
                        </tr>
                        
                        
                    </thead>
                    <tbody>
                        
                         <tr>
                            <td >
                                <?php
                                    
                                    echo $this->Form->input('AditionalService.product_id',array('type'=>'hidden','value'=>$this->request->data['Rentacar']['product_id']));
                                    echo $this->Form->input('AditionalService.name',array('div'=>false,'label'=>false));
                                ?>
                            </td>
                            <td><?php echo $this->Form->input('AditionalService.price_daily_net',array('div'=>false,'label'=>false)); ?></td>
                            <td><?php echo $this->Form->input('AditionalService.price_daily_rack',array('div'=>false,'label'=>false)); ?></td>

                           
                            <td><?php echo $this->Form->input('AditionalService.price_weekly_net',array('div'=>false,'label'=>false)); ?></td>
                            <td><?php echo $this->Form->input('AditionalService.price_weekly_rack',array('div'=>false,'label'=>false)); ?></td>
                            <td><?php 
                            $types=array('UNIT'=>__('Unit'),'VEHICLE'=>__('Vehicle'));
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
                                <td><?php echo $this->Form->input('AditionalService.'.$key.'.price_daily_net' ,array('label'=>false, 'div'=>false)); ?> </td>
                                <td><?php echo $this->Form->input('AditionalService.'.$key.'.price_daily_rack' ,array('label'=>false, 'div'=>false)); ?> </td>  
                                <td><?php echo $this->Form->input('AditionalService.'.$key.'.price_weekly_net' ,array('label'=>false, 'div'=>false)); ?> </td>
                                <td><?php echo $this->Form->input('AditionalService.'.$key.'.price_weekly_rack' ,array('label'=>false, 'div'=>false)); ?> </td>
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
                    echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Rentacar]'));
                   
                ?>  
         </fieldset> 
     
    </div>
   
    <div id="tabs-6">  
          
        <table class="Season">
            <thead>
                <tr>
                    <th>
                    </th>
                    <th><?php echo __('Name') ?></th>
                    <th><?php echo __('Date Star') ?></th>
                    <th><?php echo __('Date End') ?></th>                    
                    <th><?php echo __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>                        

                <?php
                if(isset($this->data['Season'])){
                  $c=count($this->data['Season']);
                  
                  foreach($this->data['Season'] as $x=>$season){
                        echo '<tr><td>'.
                               $this->Form->input("Season.$x.id",array('type'=>'hidden')).
                               $this->Form->input("Season.$x.product_id",array('type'=>'hidden'));
                               '</td>';     
                        echo '<td>'.$this->Form->input("Season.$x.name",array('label'=>false,'div'=>false)).'</td>';    
                        echo '<td>'.$this->Form->input("Season.$x.date_start",array('type'=>'date','label'=>false,'div'=>false)).'</td>';              
                        echo '<td>'.$this->Form->input("Season.$x.date_end",array('type'=>'date','label'=>false,'div'=>false)).'</td>';   
                        echo '<td>';   
                           
                            echo $this->Form->submit(__('Add Exception'),array('name'=>'data[Action][Add][SeasonException]['.$season['id'].']','div'=>false));
                
                            echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Season]['.$season['id'].']', 'div'=>false));                                      
                       
                            echo '</td>';

                        echo '</tr>';
                        
                        if(isset($season['SeasonException'])){
                            foreach($season['SeasonException'] as $n=>$exepcion){
                                $c+=$n;
                                echo '<tr><td>'.
                                $this->Form->input("Season.$x.SeasonException.$n.id",array('type'=>'hidden', 'value'=>$exepcion['id']) ).
                                $this->Form->input("Season.$x.SeasonException.$n.product_id",array('type'=>'hidden', 'value'=>$exepcion['product_id'])).
                                $this->Form->input("Season.$x.SeasonException.$n.parent_id",array('type'=>'hidden', 'value'=>$exepcion['parent_id']));
                                '</td>';  
                                echo '<td>Exc&rarr;'.$this->Form->input("Season.$x.SeasonException.$n.name",array('label'=>false,'div'=>false, 'value'=>$exepcion['name'])).'</td>';    
                                echo '<td>'.$this->Form->input("Season.$x.SeasonException.$n.date_start",array('type'=>'date','label'=>false,'div'=>false, 'selected'=>$exepcion['date_start'])).'</td>';              
                                echo '<td>'.$this->Form->input("Season.$x.SeasonException.$n.date_end",array('type'=>'date','label'=>false,'div'=>false, 'selected'=>$exepcion['date_end'])).'</td>';   
                                echo '<td>';   

                                    echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Season]['.$exepcion['id'].']', 'div'=>false));                                      

                                    echo '</td>';

                                echo '</tr>';

                            }
                        }
                        
                    }
                }
                ?>
        </tbody>
                    
            </table>
       
         <fieldset class="hotelsActions"> 
                    <?php   
                        echo $this->Form->input('id',array('type'=>'hidden'));
                        echo $this->Form->input('product_id',array('type'=>'hidden'));    
                    ?> 
             <div class="buttongroup">
                 <?php 
                    echo $this->Form->input('Action.Add.Seasons_count',array('type'=>'text','label'=>__('New Seasons'),'maxlength'=>2,'div'=>'number','value'=>1));
                    echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][Seasons]'));
                   ?> 
             </div>
                    <?php     
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Seasons]'));
                    ?>  
        </fieldset>
         
 
     </div>
    
  <?php  echo $this->Form->end();  ?>
</div>
   
       
</div>

<div class="actions">
	<ul>
		<li>
			<?php echo $this->Form->postLink('Delete', array('controller'=>'packages', 'action'=>'delete', $this->Form->value('Product.id')), null, 'Are you sure you want to delete this Rentacar?'); ?>
		</li>			
		<li><?php echo $this->Html->link('Back to Rentacars', array('action'=>'index')); ?></li>
                <li>
			<?php echo $this->Html->link('View', array('admin'=>false,'controller'=>'packages', 'action'=>'view', $this->Form->value('Product.id'))); ?>
		</li>
	</ul>
</div>


