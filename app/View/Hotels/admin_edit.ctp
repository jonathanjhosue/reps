<?php	
    echo $this->Html->scriptBlock(
            '$(function() {
		$( "#divRooms" ).accordion({autoHeight: false,navigation: true,collapsible: true, active:false});               
               
                $( "#divReviews" ).accordion({autoHeight: false,navigation: true,collapsible: true});
                $( "#divRoomRates" ).accordion({autoHeight: false,navigation: true,collapsible: true});
                $( "#tabs" ).tabs({
                   // cookie: {  expires: 1 }
                });
                $( "input:submit" ).button();
                
               
                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>


<h1><?php echo __('Edit Hotel'); ?></h1>

<div class="hotels form">
    

    <?php $indexI18n=0 ;
   
    ?>
	
<div id="tabs">
    <ul>
		<li><a href="#tabs-1"><?php echo __('Hotel'); ?></a></li>
		<li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
		<li><a href="#tabs-3"><?php echo __('Features'); ?></a></li>
                <li><a href="#tabs-4"><?php echo __('Rooms'); ?></a></li>
                <li><a href="#tabs-5"><?php echo __('Seasons'); ?></a></li>
                <li><a href="#tabs-6"><?php echo __('Room Rates'); ?></a></li>
                <li><a href="#tabs-7"><?php echo __('Activities'); ?></a></li>
                <li><a href="#tabs-8"><?php echo __('Reviews'); ?></a></li>
	</ul>
     <?php echo $this->Form->create('Hotel', array('type' => 'file')); ?>
    <div id="tabs-1">
       

	<?php
		echo $this->Form->input('Product.id',array('readonly'=>true));
                echo $this->Form->input('Product.Location.id',array('type'=>'hidden'));
                echo $this->Form->input('Product.Location.region_id',array('type'=>'hidden'));
                        
                echo $this->Form->input('Product.product_name',array('label'=>__('Hotel Name'),'div'=>'name'));                
              
                echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));                
                 
                echo $this->Form->input('hotel_category_id');
                
                echo $this->Form->input('check_in');
		echo $this->Form->input('check_out');
                
                /*
                echo $this->Form->input('I18nKey.0.id',array('type'=>'hidden','value'=>  $this->I18nKeys->getKeyByType($this->data['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION)));
                echo $this->Form->input('I18nKey.0.type',array('type'=>'hidden','value'=>  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION));
                echo $this->Form->input('I18nKey.0.language',array('type'=>'hidden','value'=> 'en'));
                echo $this->Form->input('I18nKey.0.value',array('type'=>'textarea','label'=>__('Description')));*/
              
                ?>
            
                        
                <?php
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    $this->data['I18nKey'],
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                    array('label'=>__('Description'),'type'=>'textarea'));
                ?>
                <?php
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    $this->data['I18nKey'],
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION,
                                      array('label'=>__('Direction'),'type'=>'textarea'));
                
                /*
                echo $this->Form->input('I18nKey.1.id',array('type'=>'hidden','value'=>  $this->I18nKeys->getKeyByType($this->data['I18nKey'],  TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION)));
                echo $this->Form->input('I18nKey.1.type',array('type'=>'hidden','value'=>TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION));
                echo $this->Form->input('I18nKey.1.language',array('type'=>'hidden','value'=> 'en'));
                echo $this->Form->input('I18nKey.1.value',array('type'=>'textarea','label'=>__('Direction')));
                */
                
		echo $this->Form->label('Product.gpslatitude',__('GPS Coordenates'),'text');
                echo $this->Form->input('Product.gpslatitude',array('label'=>__('Latitude'),'div'=>'tinyname'));
		echo $this->Form->input('Product.gpslongitude',array('label'=>__('Longitude'),'div'=>'tinyname'));  
                
                 echo $this->Form->input('Product.map',array('label'=>__('Map URL'))); 
                
                 echo "<hr/>";
                
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                        $this->data['I18nKey'],
                                'I18nKey',
                                TiposGlobal::I18N_TYPE_HOTEL_ROOMNOTES,array('label'=>__('Note about the rooms'),'div'=>'fulltext'));
                
                echo $this->Form->input('child_age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber')).                 
                 $this->Form->input('child_age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));                                
                echo $this->Form->input('infant_age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber')).                 
                $this->Form->input('infant_age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
        ?>
        <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Hotel]'));
               
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
                 $img.= $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_HOTEL));
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
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Hotel]'));
              
            ?>  
         </fieldset> 
        
   
    </div>
    <div id="tabs-3">
        
	     <div class="divFeatures">
    <?php
		echo $this->Form->input('restaurant');
		echo $this->Form->input('bar');
		echo $this->Form->input('swimmingpool');
		echo $this->Form->input('wet_bar');
		echo $this->Form->input('wheelchair_accessible');
		echo $this->Form->input('internet');
		echo $this->Form->input('business_center');
		echo $this->Form->input('fitness_center');
		echo $this->Form->input('private_car_park');
		echo $this->Form->input('gift_shop');
		echo $this->Form->input('tour_desk');
                echo $this->Form->input('laundry_service');
		echo $this->Form->input('gardens');
		echo $this->Form->input('nature_trails');
		echo $this->Form->input('socialfunctions_services');
		echo $this->Form->input('golf_court');
		echo $this->Form->input('tennis_court');
                echo $this->Form->input('childcare');
		echo $this->Form->input('lift');
		echo $this->Form->input('spa');
		echo $this->Form->input('beauty_salon');
		echo $this->Form->input('room_service');
		echo $this->Form->input('concierge');
                
                echo "<hr/>";
		echo $this->Form->input('conference_facilities',array('after'=>$this->Form->input('conferencefacilities_details')));
		
                
                echo $this->Form->input('free_shuttle_service',array('after'=>$this->Form->input('freeshuttleservice_details')));
		
                
                echo $this->Form->input('certifications',array('after'=>$this->Form->input('certifications_details')));
		
        ?>                 
            
     </div>
     <hr/>
    <div class="dadDetail">
    <?php
    	echo $this->Form->input('vegetarian');
        echo $this->Form->input('kosher');
        
        echo $this->RipsWeb->getInputI18nAll($indexI18n,
                 $this->data['I18nKey'],
                 'I18nKey',
                TiposGlobal::I18N_TYPE_HOTEL_DININGANDDRINKING,
                array('label'=>__('Dining & Drinking'),'type'=>'textarea'));
	
    ?>
    </div>
     
        <fieldset class="hotelsActions"> 
                <?php 
                    echo $this->Form->input('id',array('type'=>'hidden'));
                    echo $this->Form->input('product_id',array('type'=>'hidden'));
                    echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Hotel'));
                   
                ?>  
         </fieldset> 
     
    </div>
     
    <div id="tabs-4">  
         
                <div id="divRooms">
                    
	<?php	
                //$x=0                    
                foreach($this->data['Room'] as $i=>$room){
                    $titulo=($room['category']!="")?$room['category']:__('Room ').($i+1);
                    echo '<h3><a href="#">'.$titulo.'</a></h3>';
                    echo "<div>";
                    echo $this->Form->input('Room.'.$i.'.id',array('type'=>'hidden','value'=>$room['id']));
                    echo $this->Form->input('Room.'.$i.'.hotel_id',array('type'=>'hidden','value'=>$room['hotel_id']));
                    echo $this->Form->input('Room.'.$i.'.category');
                    echo $this->Form->input('Room.'.$i.'.count',array('size'=>'4','maxlength'=>'3','div'=>'number'));
					 echo $this->Form->input('Room.'.$i.'.max_people',array('size'=>'4','maxlength'=>'3','div'=>'number'));
                    
                    
                    echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    $room['I18nKey'],
                                    'Room.'.$i.'.I18nKey',
                                    TiposGlobal::I18N_TYPE_ROOM_DESCRIPTION,
                                    array('label'=>__('Description'),'type'=>'textarea'));                   
                                      
                    echo "<hr/>";
                    ?>
                    <div class="divFeatures">
                    <?php
                    
                    echo $this->Form->input('Room.'.$i.'.suite_bathrooms');
                    echo $this->Form->input('Room.'.$i.'.free_internet');
                    echo $this->Form->input('Room.'.$i.'.air_conditioning');
                    echo $this->Form->input('Room.'.$i.'.orthopedic_matresses');
                    echo $this->Form->input('Room.'.$i.'.telephone',array('type'=>'checkbox'));
                    echo $this->Form->input('Room.'.$i.'.alarm_clock');
                    echo $this->Form->input('Room.'.$i.'.cable_tv');
                    echo $this->Form->input('Room.'.$i.'.desk_&_chair');
                    echo $this->Form->input('Room.'.$i.'.jacuzzi');
                    echo $this->Form->input('Room.'.$i.'.hairdryer');
                    echo $this->Form->input('Room.'.$i.'.minibar');
                    echo $this->Form->input('Room.'.$i.'.coffee_maker');
                    echo $this->Form->input('Room.'.$i.'.microwave');
                    echo $this->Form->input('Room.'.$i.'.refrigerator');
                    echo $this->Form->input('Room.'.$i.'.iron_&_ironing_board');
                    echo $this->Form->input('Room.'.$i.'.safe_deposit_box');
                    echo $this->Form->input('Room.'.$i.'.fan');
                    echo $this->Form->input('Room.'.$i.'.make_up_mirror');
                    echo $this->Form->input('Room.'.$i.'.balcony');
                    echo $this->Form->input('Room.'.$i.'.private_garden');                    
                 
                    
                    echo $this->RipsWeb->getInputI18nAll($indexI18n,
                        $room['I18nKey'],
                        'Room.'.$i.'.I18nKey',
                        TiposGlobal::I18N_TYPE_ROOM_INCLUDE,array('label'=>__('Rates Include'),'div'=>'fulltext'));  
                    
                       echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Room]['.$room['id'].']'));
                    
                    echo '</div>';
                    
                     ?>
                    </div>
                    <?php
                }            
        ?>  
               </div>
        
	<fieldset class="hotelsActions"> 
        <?php   
            echo $this->Form->input('id',array('type'=>'hidden'));
            echo $this->Form->input('product_id',array('type'=>'hidden'));    
	    echo $this->Form->input('Action.Add.Rooms_count',array('type'=>'text','label'=>__('New Rooms'),'maxlength'=>2,'div'=>'number','value'=>1));
            echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][Rooms]'));
            echo $this->Form->submit(__('Save'),array('id'=>'submitSaveRoom','name'=>'data[Action][Save][Rooms]'));
               
        ?>  
         </fieldset> 
      
      
    </div>
      
         
    <div id="tabs-5">  
          
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

      
     <div id="tabs-6">  

         
         <?php                                      
      
        ?>
         
         <div id="divRoomRates">           
             <?php 
             if(isset($this->data['Product']['Rate'])){
                $roomRates=$this->data['Product']['Rate'];
                $roomRates=Set::combine($roomRates, array('{0}:{1}', '{n}.season_id', '{n}.type_id'), '{n}');
                $x= count($roomRates); 
                foreach($this->data['Room'] as $i=>$room): 
                  $titulo=($room['category']!="")?$room['category']:__('Room ').($i+1);
                    echo '<h3><a href="#">'.$titulo.'</a></h3>';
               
             ?>
                    <div>
                      <table class="Rate ui-widget">
                            <thead class="ui-widget-header">
                                <tr>
                                    <th><?php echo __('Season') ?></th>
                                    <th><?php echo __('Date Star') ?></th>
                                    <th><?php echo __('Date End') ?></th>
                                    <th><?php echo __('Single') ?></th>
                                    <th><?php echo __('Double') ?></th>
                                    <th><?php echo __('Triple') ?></th>
                                    <th><?php echo __('Quadruple') ?></th>
                                <th><?php echo __('Child '); ?></th>
                                <th><?php echo __('Infant ')  ?> </th>
                                <th><?php echo __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody class="ui-widget-content">   
                       <?php                         
                        //   echo $this->Form->input("Room.$i.id",array('type'=>'hidden'));
                       //$x= count($room['RoomRate']); 
                       //$x=$c;
                       foreach($this->data['Season'] as $season): 
                          $roomRate=array('id'=>'','single'=>'','double'=>'','triple'=>'','quadruple'=>'','child'=>'','infant'=>'');
                          
                        if(isset($roomRates[$season['id'].':'.$room['id']])){
                            $roomRate=$roomRates[$season['id'].':'.$room['id']];                         
                        }                        
                            echo '<tr><td>';                            
                            //echo $this->Form->input("Season.$x.id",array('type'=>'hidden'));
                            //echo $this->Form->input("Season.$x.hotel_id",array('type'=>'hidden'));
                            
                            echo $season['name'];
                                '</td>';
                            echo '<td>'.$this->RipsWeb->getStringFromDate($season['date_start']).'</td>'.
                            '<td>'.$this->RipsWeb->getStringFromDate($season['date_end']).'</td>';
                                

                                echo '<td>'.$this->Form->input("Product.Rate.$x.id",array('type'=>'hidden','value'=>$roomRate['id']))
                                            .$this->Form->input("Product.Rate.$x.season_id",array('type'=>'hidden','value'=>$season['id']))
                                        .$this->Form->input("Product.Rate.$x.product_id",array('type'=>'hidden','value'=>$season['product_id']))  
                                            .$this->Form->input("Product.Rate.$x.type_id",array('type'=>'hidden','value'=>$room['id']));

                                echo       $this->Form->text("Product.Rate.$x.single",array('class'=>'rateNumber','value'=>$roomRate['single'])).'</td>'.
                                    '<td>'.$this->Form->text("Product.Rate.$x.double",array('class'=>'rateNumber','value'=>$roomRate['double'])).'</td>'.
                                    '<td>'.$this->Form->text("Product.Rate.$x.triple",array('class'=>'rateNumber','value'=>$roomRate['triple'])).'</td>'.
                                    '<td>'.$this->Form->text("Product.Rate.$x.quadruple",array('class'=>'rateNumber','value'=>$roomRate['quadruple'])).'</td>'.
                                    '<td>'.$this->Form->text("Product.Rate.$x.child",array('class'=>'rateNumber','value'=>$roomRate['child'])).'</td>'.
                                    '<td>'.$this->Form->text("Product.Rate.$x.infant",array('class'=>'rateNumber','value'=>$roomRate['infant'])).'</td>';
                                echo '<td>';
                               /* if(isset($roomRates[$season['id'].':'.$room['id']])){
                                    echo $this->Form->input($prefijo.'.id',array('type'=>'hidden','name'=>"data[Action][DeleteRoomRate]"));
                                    echo $this->Form->submit(__('Delete'),array('name'=>'delete_roomrate'));                                      
                                }*/
                            echo '</tr>';
                            if(isset($season['SeasonException']))foreach($season['SeasonException'] as $n=>$exception): 
                                $x++;
                                $roomRate=array('id'=>'','single'=>'','double'=>'','triple'=>'','quadruple'=>'','child'=>'','infant'=>'');

                                if(isset($roomRates[$exception['id'].':'.$room['id']])){
                                    $roomRate=$roomRates[$exception['id'].':'.$room['id']];                         
                                }                        
                                    echo '<tr><td>';                            
                                    //echo $this->Form->input("Season.$x.id",array('type'=>'hidden'));
                                    //echo $this->Form->input("Season.$x.hotel_id",array('type'=>'hidden'));

                                    echo 'Exc&rarr;'.$exception['name'];
                                        '</td>';
                                    echo '<td>'.$this->RipsWeb->getStringFromDate($exception['date_end']).'</td>'.
                                    '<td>'.$this->RipsWeb->getStringFromDate($exception['date_end']).'</td>';


                                        echo '<td>'.$this->Form->input("Product.Rate.$x.id",array('type'=>'hidden','value'=>$roomRate['id']))
                                                    .$this->Form->input("Product.Rate.$x.season_id",array('type'=>'hidden','value'=>$exception['id']))
                                                .$this->Form->input("Product.Rate.$x.product_id",array('type'=>'hidden','value'=>$exception['product_id']))    
                                                .$this->Form->input("Product.Rate.$x.type_id",array('type'=>'hidden','value'=>$room['id']));

                                        echo       $this->Form->text("Product.Rate.$x.single",array('class'=>'rateNumber','value'=>$roomRate['single'])).'</td>'.
                                            '<td>'.$this->Form->text("Product.Rate.$x.double",array('class'=>'rateNumber','value'=>$roomRate['double'])).'</td>'.
                                            '<td>'.$this->Form->text("Product.Rate.$x.triple",array('class'=>'rateNumber','value'=>$roomRate['triple'])).'</td>'.
                                            '<td>'.$this->Form->text("Product.Rate.$x.quadruple",array('class'=>'rateNumber','value'=>$roomRate['quadruple'])).'</td>'.
                                            '<td>'.$this->Form->text("Product.Rate.$x.child",array('class'=>'rateNumber','value'=>$roomRate['child'])).'</td>'.
                                            '<td>'.$this->Form->text("Product.Rate.$x.infant",array('class'=>'rateNumber','value'=>$roomRate['infant'])).'</td>';
                                        echo '<td>';
                                    /* if(isset($roomRates[$season['id'].':'.$room['id']])){
                                            echo $this->Form->input($prefijo.'.id',array('type'=>'hidden','name'=>"data[Action][DeleteRoomRate]"));
                                            echo $this->Form->submit(__('Delete'),array('name'=>'delete_roomrate'));                                      
                                        }*/
                                    echo '</tr>';
                                    
                                endforeach;
                             $x++;
                         
                        endforeach;
                      
                        ?>
                       
                        </tbody>
                    </table>
               
                     <?php  
                     
                    ?>
                </div>
                <?php                
                 endforeach;
             }
                ?>
          </div>
             
         
         <fieldset class="hotelsActions"> 
                    <?php   
                        echo $this->Form->input('id',array('type'=>'hidden'));
                        echo $this->Form->input('product_id',array('type'=>'hidden'));    
                    ?> 
             <div class="buttongroup">
                 <?php 
                    //echo $this->Form->input('Action.AddSeasons',array('type'=>'text','label'=>__('New Seasons'),'maxlength'=>2,'div'=>'number','value'=>1));
                    //echo $this->Form->submit(__('Add'),array('name'=>'add_seasons'));
                   ?> 
             </div>
                    <?php     
                        
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Roomrates]'));
                    ?>  
        </fieldset>
     </div>
    <div id="tabs-7">
        
        <div id="divActivities">

            
                <?php
                 //foreach($this->data['Review'] as $i=>$review){
                echo $this->Form->input("Activity",array('label'=>__('Activities in Region'),'options'=>$activities,'size'=>'10', 'class'=>'selectmultiple', 'title'=>'Ctrl + click'));
               
                 echo $this->Form->input("Activity",array('label'=>__('Activities in other Regions'),'options'=>$activitiesOthers,'name'=>'data[Activity][ActivityOthers]','size'=>'10', 'class'=>'selectmultiple', 'title'=>'Ctrl + click'));
                
                ?>
          
            <div id="activityDescription">
            
            </div>
            
         </div>
         <fieldset class="hotelsActions"> 
                    <?php   
                        echo $this->Form->input('id',array('type'=>'hidden'));
                        echo $this->Form->input('product_id',array('type'=>'hidden'));    
                                
                        echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Hotel]'));
                    ?>  
        </fieldset>
        
    </div>
        
    <div id="tabs-8">  	       
                     <div id="divReviews">
                <?php
                
                if(isset($this->data['Review'])) foreach($this->data['Review'] as $i=>$review){
                    $titulo=($i+1).'=>'.$review['review_date'];
                    echo '<h3><a href="#">'.$titulo.'</a></h3>';
                    echo "<div>";
                    echo $this->Form->input("Review.$i.id");
                    echo $this->Form->input("Review.$i.staff");
                    echo $this->Form->input("Review.$i.review_date",array('type'=>'hidden'));
                    echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    $review['I18nKey'],
                                    'Review.'.$i.'.I18nKey',
                                    TiposGlobal::I18N_TYPE_REVIEW,
                                    array('label'=>__('Review'),'type'=>'textarea'));  
                    
                    //echo $this->Form->input('Review.'.$i.'.id',array('type'=>'hidden','name'=>"data[Action][DeleteReview]"));
                    echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Review]['.$review['id'].']'));
                    //echo $this->Form->postLink(__('Delete'), array('action' => 'delete',$review['id']), null, __('Are you sure you want to delete # %s?', $review['id'])); 
                    echo '</div>';
                }
                
                
                        //echo $this->Form->input('review_date');
                ?>
                     </div>
             
        <fieldset class="hotelsActions"> 
        <?php   
           echo $this->Form->input('id',array('type'=>'hidden'));
            echo $this->Form->input('product_id',array('type'=>'hidden')); 
            
            
                    echo $this->Form->input('Action.Add.Reviews_count',array('type'=>'text','label'=>__('New Reviews'),'maxlength'=>2,'div'=>'number','value'=>1));
                    echo $this->Form->submit(__('Add'),array('name'=>'data[Action][Add][Reviews]'));
            
	  
            echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Reviews]'));
        ?>  
         </fieldset> 
           
        </div>
         <?php  echo $this->Form->end();  ?>
</div>

    </div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this->Form->postLink('Delete', array('controller'=>'hotels', 'action'=>'delete', $this->Form->value('Product.id')), null, 'Are you sure you want to delete this Hotel?'); ?>
		</li>			
		<li><?php echo $this->Html->link('Back to Hotels', array('action'=>'index')); ?></li>
                <li>
			<?php echo $this->Html->link('View', array('admin'=>false,'controller'=>'hotels', 'action'=>'view', $this->Form->value('Product.id'))); ?>
		</li>
	</ul>
</div>

<?php 


?>
