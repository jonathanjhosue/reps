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

       /*$("#divItinerary").jPaginate({items: 10,next:"'.__('Next').'",previous:"'.__('Previous').'"});*/

             /*   $("#divItinerary").easyPaginate({
                    step: 4,
                    nextprev:false
                }); */
                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>

<h1><?php echo __('Edit Package'); ?></h1>

<div class="packages form">
    

    <?php 
    $indexI18n=0 ; 
    ?>
	
<div id="tabs">
    <ul>
		<li><a href="#tabs-1"><?php echo __('Overview'); ?></a></li>
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
                <li><a href="#tabs-3"><?php echo __('Include/Exclude'); ?></a></li>
                <li><a href="#tabs-4"><?php echo __('Itinerary'); ?></a></li>
		<li><a href="#tabs-5"><?php echo __('Lodging'); ?></a></li>
                <li><a href="#tabs-6"><?php echo __('Activities'); ?></a></li>
                <li><a href="#tabs-7"><?php echo __('Seasons'); ?></a></li>
                <li><a href="#tabs-8"><?php echo __('Rates'); ?></a></li>
                <li><a href="#tabs-9"><?php echo __('Extensions'); ?></a></li>
              
	</ul>
     <?php echo $this->Form->create('Package', array('type' => 'file')); ?>
    <div id="tabs-1">
       

	<?php
		echo $this->Form->input('Product.id',array('readonly'=>true));
                echo $this->Form->input('Product.product_name',array('label'=>__('Package Name'),'div'=>'name'));  
                 echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));
                echo $this->Form->input('code',array('label'=>__('Code')));
                echo $this->Form->input('package_category_id');                
                echo $this->Form->input('activity_level', array('options' => array('Moderate'=>__(' Moderate '))));
               
                echo $this->Form->input('tour_type', array('options' => array('Guided'=>__('Guided'),'Locally hosted'=>__('Locally hosted'),'Independent (Selfguided/Selfdrive)'=>__('Independent (Selfguided/Selfdrive)'))));
                echo $this->Form->input('tour_location',array('label'=>__('Location'),'div'=>'name'));        
                echo $this->Form->input('meeting_point_id');
                echo $this->Form->input('price_tag',array('label'=>__('Price Tag')));
                
                echo '<label>'.__('Duration').'</label>';
                echo $this->Form->input('days',array('label'=>__('Days')));
                echo $this->Form->input('nights',array('label'=>__('Nights')));
                echo '<label>'.__('Group Size').'</label>';
                echo $this->Form->input('pax_min',array('label'=>__('Pax Min')));
                echo $this->Form->input('pax_max',array('label'=>__('Pax Max')));
                ?>
                <div class="divFeatures">
                      <label><?php echo __('Suitable for') ?> </label>
                        <?php
                    echo $this->Form->input('solo_travellers');
                    echo $this->Form->input('women_only_trips');
                    echo $this->Form->input('independent_travellers');
                    echo $this->Form->input('physically_challenged');
                    echo $this->Form->input('families_with_small_children');
                    echo $this->Form->input('honeymoon_anniversary_trip');
                    echo $this->Form->input('seniors');
                    echo $this->Form->input('groups');
                    ?>
                </div>
                               
                <?php
                $inputs=array(array('type'=>TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,array('label'=>__('Description'),'type'=>'textarea')),
                               array('type'=>TiposGlobal::I18N_TYPE_PACKAGE_INFORMATION,array('label'=>__('Information'),'type'=>'textarea'))
                    );
                echo $this->RipsWeb->getInputsI18nAll($indexI18n,
                                    $this->data['I18nKey'],
                                    'I18nKey',
                                    $inputs
                                    );             

                
         ?>
        <fieldset class="packagesActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
               
            ?>  
         </fieldset> 
         
    </div>
    <div id="tabs-2">
         
	<fieldset  id="fieldsetImages">
		
	<?php
        for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
            
		$img='<div class="img">';
                 $img.= $this->Form->input("Image.$i.owner_id",array('type'=>'hidden'));
                 //$img.= $this->Form->input("Image.$i.image_name",array('type'=>'hidden', 'value'=>'Image'.($i+1)));
                 $img.= $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_PACKAGE));
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
               // echo $this->Form->input('hotels/'.$hotel['Image'][$i]['image_name'], array('height' => '75px', 'style'=> 'padding-bottom:3px;'));
         }
	?>
	</fieldset>
        
         <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
              
            ?>  
         </fieldset> 
        
   
    </div>
    <div id="tabs-3">
        <?php
         echo $this->Form->input("IncludeNote",array('label'=>__('Includes & Excludes'),'options'=>$includeNotes,'size'=>'25', 'class'=>'selectmultiple', 'title'=>'Ctrl + click'));
        ?>
        <fieldset class="hotelsActions"> 
            <?php 
                
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
              
            ?>  
         </fieldset> 
    </div>
    <div id="tabs-4">
        <div id="divItinerary">
            
           <?php 
               echo $this->element('admin_itinerary');                
              
            ?> 
            
            
        </div>
	
         <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
            ?>
            <div class="buttongroup">
                 <?php 
                    //echo $this->Form->input('Action.Delete.Itinerary_count',array('type'=>'text','label'=>__("Delete Day Itinerary"),'maxlength'=>2,'div'=>'number','value'=>1));
                    //echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Itinerary]'));
                   ?> 
             </div>
             <?php
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
              
            ?>  
         </fieldset> 
        
   
    </div>
    <div id="tabs-5">
          <div id="divLodging">
                <label><?php echo __('Lodging') ?></label>   
            
                <?php
                 //foreach($this->data['Review'] as $i=>$review){
                //echo $this->Form->input("Hotel",array('label'=>__('Lodgings'),'options'=>$hotels,'size'=>'25', 'class'=>'selectmultiple', 'title'=>'Ctrl + click'));
               
                echo $this->element('search_select',array('collection'=>$hotels,'id'=>'Hotel')); 
                ?>
          
  
         </div>
	     
     
        <fieldset class="packagesActions"> 
                <?php 
                    echo $this->Form->input('id',array('type'=>'hidden'));
                    echo $this->Form->input('product_id',array('type'=>'hidden'));
                    echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
                   
                ?>  
         </fieldset> 
     
    </div>
    <div id="tabs-6">  
         
             <div id="divActivities">
                 <label><?php echo __('Activities') ?></label>                    
            
                <?php
                 //foreach($this->data['Review'] as $i=>$review){
                //echo $this->Form->input("Activity",array('label'=>__('Activities in Region'),'options'=>$activities,'size'=>'25', 'class'=>'selectmultiple', 'title'=>'Ctrl + click'));
               
                echo $this->element('search_select',array('collection'=>$activities,'id'=>'Activity')); 
                ?>
          
            <div id="activityDescription">
            
            </div>
            
         </div>
         <fieldset class="hotelsActions"> 
                    <?php   
                        echo $this->Form->input('id',array('type'=>'hidden'));
                        echo $this->Form->input('product_id',array('type'=>'hidden'));    
                                
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
                    ?>  
        </fieldset>
        
      
      
    </div>
    <div id="tabs-7">  
          
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
    <div id="tabs-8">  
      
       <?php echo $this->element('admin_rate_package'); ?>
         <div id="divRates">

                        
         </div>
	     
     
      
     </div>
    
    <div id="tabs-9">  
          
          <div id="divExtensions">
                <label><?php echo __('Extensions') ?></label>   
            
                <?php
               
                echo $this->element('search_select',array('collection'=>$extensions,'id'=>'Extension')); 
               
                ?>
          
            
            
             </div>
            
            
         <fieldset class="packagesActions"> 
                    <?php   
                        echo $this->Form->input('id',array('type'=>'hidden'));
                        echo $this->Form->input('product_id',array('type'=>'hidden'));    
                    ?> 
           
                    <?php     
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Package]'));
                    ?>  
        </fieldset>
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


