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

       $("#divItinerary").jPaginate({items: 10,next:"'.__('Next').'",previous:"'.__('Previous').'"});

             /*   $("#divItinerary").easyPaginate({
                    step: 4,
                    nextprev:false
                }); */
                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>

<h1><?php echo __('Edit Vehicle'); ?></h1>

<div class="packages form">
    

    <?php 
    $indexI18n=0 ; 
    ?>
	
<div id="tabs">
    <ul>
		<li><a href="#tabs-1"><?php echo __('Vehicle'); ?></a></li>
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
                <li><a href="#tabs-3"><?php echo __('Seasons'); ?></a></li>
                <li><a href="#tabs-4"><?php echo __('Rates'); ?></a></li>
                
              
	</ul>
     <?php echo $this->Form->create('Vehicle', array('type' => 'file')); ?>
    <div id="tabs-1">
       

	<?php
                echo $this->Form->input('Product.id',array('type'=>'hidden'));    
                echo $this->Form->input('Product.product_name',array('type'=>'hidden','value'=>'-'));      
                 echo $this->Form->input("product_id",array('type'=>'hidden'));
                 echo $this->Form->input("rentacar_id",array('label'=>__('RentaCar '),'div'=>'name'));
                 echo $this->Form->input("category_id",array('label'=>__('Category '),'div'=>'name'));
                 echo $this->Form->input('subcategory',array('label'=>__('Subcategory')));                
                 echo $this->Form->input('type',array('label'=>__('Type')));
                 echo $this->Form->input('engine',array('label'=>__('Engine')));
                 echo $this->Form->input('transmission', array('options' => array('MANUAL'=>__('Manual'),'AUTOMATIC'=>__('Automatic'))));
                 echo $this->Form->input('fuel', array('options' => array('GASOLINE'=>__('Gasoline'),'DIESEL'=>__('Diesel'),'HYBRID'=>__('Hybrid'),'OTHER'=>__('Other'))));
                 echo $this->Form->input('pax',array('label'=>__('Pax')));
                 echo $this->Form->input('doors',array('label'=>__('Doors')));
                 echo $this->Form->input('luggage',array('label'=>__('Luggage')));
       ?>
                                              
               
        <fieldset class="packagesActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Vehicle]'));
               
            ?>  
         </fieldset> 
         
    </div>
    <div id="tabs-2">
         
	<fieldset  id="fieldsetImages">
		
	<?php
        for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
            
		 $img='<div class="img">';
                 $img.= $this->Form->input("Image.$i.owner_id",array('type'=>'hidden'));
                 $img.= $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_VEHICLE));
                 $del='';
                 
                 
		if(isset($this->request->data['Image'][$i]['id'])){     
                    if(!isset($this->request->data['Image'][$i]['urlname'])){//validation                        
                        $this->request->data['Image'][$i]['urlname']=$this->request->data['Image'][$i]['image_name'];
                    }elseif(is_array($this->request->data['Image'][$i]['image_name'])){//save
                        $imageName=$this->request->data['Image'][$i]['image_name']['name'];
                        $this->request->data['Image'][$i]['urlname']=$imageName!=""?$imageName:$this->request->data['Image'][$i]['urlname'];
                    }
                        
                    $img.= '<label>'.$this->request->data['Image'][$i]['urlname'].'</label>';
                    $img.= $this->Form->input("Image.$i.id",array('type'=>'hidden'));
                    $img.= $this->Form->input("Image.$i.urlname",array('type'=>'hidden'));
                    $img.=$this->Html->image("image/".$this->request->data['Image'][$i]['id']."/90x45_".$this->request->data['Image'][$i]['urlname']);
                    
                    if($this->request->data['Image'][$i]['urlname']!=""){
                        $del.=' '.$this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Image]['.$this->request->data['Image'][$i]['id'].']', 'div'=>false));
             
                    }
                }
                $img.='</div>';
                
                 
                echo $this->Form->input("Image.$i.image_name",array( 'before'=>$img,'label'=>__('Image ').($i+1),'type'=>'file', 
                    'after'=>$del));
                }
	?>
	</fieldset>
        
         <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Vehicle]'));
              
            ?>  
         </fieldset> 
        
   
    </div>
    <div id="tabs-3">
        <?php //pr($seasonsRentacar) ?>
       <table class="Season">
            <thead>
                <tr>
                    <th>
                    </th>
                    <th><?php echo __('Name') ?></th>
                    <th><?php echo __('Date Start') ?></th>
                    <th><?php echo __('Date End') ?></th>                    
                    <th><?php echo __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>    
                
                 <?php
                if(isset($seasonsRentacar)){
                  $c=count($seasonsRentacar);
                  if($c>0){
                     echo '<tr ><td colspan="5"  class="subtitle">'.__('Rentacar Seasons').'</td></tr>';
                                    
                  }
                  foreach($seasonsRentacar as $x=>$season){
                        echo '<tr><td>';
                               '</td>';     
                        echo '<td>'.$season['Season']['name'].'</td>';    
                        echo '<td>'.$season['Season']['date_start'].'</td>';              
                        echo '<td>'.$season['Season']['date_end'].'</td>';   
                        echo '<td>';  
                        echo '</td>';
                        echo '</tr>';
                        
                        if(isset($season['SeasonException'])){
                            foreach($season['SeasonException'] as $n=>$exepcion){
                                $c+=$n;
                                echo '<tr><td></td>';  
                                echo '<td>Exc&rarr;'.$exepcion['name'].'</td>';    
                                echo '<td>'.$exepcion['date_start'].'</td>';              
                                echo '<td>'.$exepcion['date_end'].'</td>';   
                                echo '<td>';   

                               

                                    echo '</td>';

                                echo '</tr>';

                            }
                        }
                        
                    }
                }
                ?>
                
                
                
               
                
                

                <?php
                if(isset($this->data['Season'])){
                  $c=count($this->data['Season']);
                   if($c>0){
                     echo '<tr><td  colspan="5" class="subtitle">'.__('Vehicle Seasons').'</td></tr>';
                                    
                  }
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
                    echo $this->Form->input('Action.Add.Seasons_count',array('type'=>'text','label'=>__('New Rentacar Seasons'),'maxlength'=>2,'div'=>'number','value'=>1));
                    echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][Seasons]'));
                   ?> 
             </div>
                    <?php     
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Seasons]'));
                    ?>  
        </fieldset>
         
 
     </div>
    <div id="tabs-4">  

              
       <?php echo $this->element('admin_rate_vehicle',array('seasonsRentacar'=>$seasonsRentacar)); ?>
         <div id="divRates">

         </div>
     </div>
       
  <?php  echo $this->Form->end();  ?>
</div>
          
</div>

<div class="actions">
	<ul>
		<li>
			<?php echo $this->Form->postLink('Delete', array('controller'=>'packages', 'action'=>'delete', $this->Form->value('Product.id')), null, 'Are you sure you want to delete this Package?'); ?>
		</li>			
		<li><?php echo $this->Html->link('Back to Packages', array('action'=>'index')); ?></li>
                <li>
			<?php echo $this->Html->link('View', array('admin'=>false,'controller'=>'packages', 'action'=>'view', $this->Form->value('Product.id'))); ?>
		</li>
	</ul>
</div>


