<h1><?php echo __('Edit Hotel'); ?></h1>

<div class="hotels form">
    <?php $indexI18n=0 ?>
	<?php echo $this->Form->create('Hotel'); ?>

    <fieldset id="formHotel1">  
        <legend><?php echo __('Hotel'); ?></legend>
	<fieldset>		
	<?php
		echo $this->Form->input('Product.id',array('readonly'=>true));
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
        
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
                
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    $this->data['I18nKey'],
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                    array('label'=>__('Description'),'type'=>'textarea'));
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
           
                
        ?>
       </fieldset>  
	<fieldset>
		<legend><?php echo __('Images'); ?></legend>
	<?php
        for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
            
		echo $this->Form->input("Image.$i.image_name",array('label'=>_('Image ').($i+1),'type'=>'file'));
		if(isset($this->request->data['Image'][$i])){
                    echo '<label>'.$this->request->data['Image'][$i]['image_name'].'</label>';
                    echo $this->Form->input("Image.$i.type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_HOTEL));
                    echo $this->Html->image("image/".$this->request->data['Image'][$i]['id']."/80x80_".$this->request->data['Image'][$i]['image_name']);
                }
               // echo $this->Form->input('hotels/'.$hotel['Image'][$i]['image_name'], array('height' => '75px', 'style'=> 'padding-bottom:3px;'));
         }
	?>
	</fieldset>
    </fieldset>

    
	<fieldset class="formHotel2">
        <legend><?php echo __('Features'); ?></legend>
        <fieldset>
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
		echo $this->Form->input('conference_facilities');
		echo $this->Form->input('conferencefacilities_details');
                
                echo $this->Form->input('free_shuttle_service');
		echo $this->Form->input('freeshuttleservice_details');
                
                echo $this->Form->input('certifications');
		echo $this->Form->input('certifications_details');
        ?>
       </fieldset>  
    <fieldset class="dadDetail">
    <?php
    	echo $this->Form->input('vegetarian');
        echo $this->Form->input('kosher');
        echo "<hr/>";
        echo $this->RipsWeb->getInputI18nAll($indexI18n,
                 $this->data['I18nKey'],
                 'I18nKey',
                TiposGlobal::I18N_TYPE_HOTEL_DININGANDDRINKING,
                array('label'=>__('Dining & Drinking'),'type'=>'textarea'));
	
    ?>
       </fieldset>  
     </fieldset>
    <fieldset class="formHotel3">
        <legend><?php echo __('Rooms'); ?></legend>
  

    
	<fieldset>
		<legend><?php echo __('Room'); ?></legend>
	<?php	
                foreach($this->data['Room'] as $i=>$room){
                    echo $this->Form->input('Room.'.$i.'.id',array('type'=>'hidden','value'=>$room['id']));
                    echo $this->Form->input('Room.'.$i.'.hotel_id',array('type'=>'hidden','value'=>$room['hotel_id']));
                    echo $this->Form->input('Room.'.$i.'.category');
                    echo $this->Form->input('Room.'.$i.'.count',array('size'=>'4','maxlength'=>'3','div'=>'number'));
                    
                    
                    echo $this->RipsWeb->getInputI18nAll($x=0,
                                    $room['I18nKey'],
                                    'Room.'.$i.'.I18nKey',
                                    TiposGlobal::I18N_TYPE_ROOM_DESCRIPTION,
                                    array('label'=>__('Description'),'type'=>'textarea'));                   
                                      
                    echo "<hr/>";
                    echo $this->Form->input('Room.'.$i.'.suite_bathrooms');
                    echo $this->Form->input('Room.'.$i.'.free_internet');
                    echo $this->Form->input('Room.'.$i.'.air_conditioning');
                    echo $this->Form->input('Room.'.$i.'.orthopedic_matresses');
                    echo $this->Form->input('Room.'.$i.'.telephone');
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
                }
                //echo $this->Form->input('Room.0.id');

                
              
	?>
	</fieldset>
         <?php echo $this->Form->submit(__('Save'),array('name'=>'save_rooms'));?>   
     
    </fieldset>
    
    <fieldset class="formHotel4">
        <legend><?php echo __('Room Rate'); ?></legend> 
	<fieldset>		
                <table class="RoomRate">
                    <thead>
                        <tr>
                            <th ><?php echo __('Date Star') ?></th>
                            <th><?php echo __('Date End') ?></th>
                            <th><?php echo __('Single') ?></th>
                            <th><?php echo __('Double') ?></th>
                            <th><?php echo __('Triple') ?></th>
                            <th><?php echo __('Quadruple') ?></th>
                            <th><?php echo __('Child ');                                      
                                      echo '<br/>'.$this->Form->text('child_age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'))
                                           .'-'.
                                           $this->Form->text('child_age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
                                 ?>
                            </th>
                            <th><?php echo __('Infant ');
                                      
                                      echo '<br/>'.$this->Form->text('infant_age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'))
                                           .'-'.
                                           $this->Form->text('infant_age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
                                ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>                        
                        
                        <?php
                               /* echo '<tr>'.
                        
                                     '<td>'.$this->Form->input('Season.0.date_start',array('type'=>'date','label'=>false,'div'=>false)).'</td>'.
                                     '<td>'.$this->Form->input('Season.0.date_end',array('type'=>'date','label'=>false,'div'=>false)).'</td>'.
                                        '<td>'.$this->Form->text('Room.0.RoomRate.0.single',array('class'=>'rateNumber')).'</td>'.
                                        '<td>'.$this->Form->text('Room.0.RoomRate.0.double',array('class'=>'rateNumber')).'</td>'.
                                        '<td>'.$this->Form->text('Room.0.RoomRate.0.triple',array('class'=>'rateNumber')).'</td>'.
                                        '<td>'.$this->Form->text('Room.0.RoomRate.0.quadruple',array('class'=>'rateNumber')).'</td>'.
                                        '<td>'.$this->Form->text('Room.0.RoomRate.0.child',array('class'=>'rateNumber')).'</td>'.
                                        '<td>'.$this->Form->text('Room.0.RoomRate.0.infant',array('class'=>'rateNumber')).'</td>'.
                                     '</tr>'*/
                        ?>
               </tbody>
                    
            </table>
                <?php
                /*
                 echo $this->Form->input('Room.0.I18nKey.0.id');
                 echo $this->Form->input('Room.0.I18nKey.0.type',array('type'=>'hidden','value'=>TiposGlobal::I18N_TYPE_ROOM_INCLUDE));
                echo $this->Form->input('Room.0.I18nKey.0.language',array('type'=>'hidden','value'=> 'en'));
                echo $this->Form->input('Room.0.I18nKey.0.value',array('label'=>__('Include'),'div'=>'fulltext'));
                 *
                 */
                ?>
           
	</fieldset>
         <?php
           echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                $this->data['I18nKey'],
                                'I18nKey',
                                TiposGlobal::I18N_TYPE_HOTEL_ROOMNOTES,array('label'=>__('Notes'),'div'=>'fulltext'));
      
                ?>
     </fieldset>
	<fieldset>
		<legend><?php echo __('Reviews'); ?></legend>
                <fieldset id="">
                <?php
                
                foreach($this->data['Review'] as $i=>$review){
                    echo $this->Form->input("Review.$i.id");
                    echo $this->Form->input("Review.$i.staff");
                    echo $this->Form->input("Review.$i.review_date",array('type'=>'hidden'));
                    echo $this->RipsWeb->getInputI18nAll($x=0,
                                    $review['I18nKey'],
                                    'Review.'.$i.'.I18nKey',
                                    TiposGlobal::I18N_TYPE_REVIEW,
                                    array('label'=>__('Review'),'type'=>'textarea'));  
                }
                
                
                        //echo $this->Form->input('review_date');
                ?>
                </fieldset>
	</fieldset>
  
      <?php echo $this->Form->end(array('label'=>__('Save'),'value'=>__('Save'),'name'=>'save_all'));?>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this->Html->link('Delete', array('controller'=>'hotels', 'action'=>'delete', $this->Form->value('Product.id')), null, 'Are you sure you want to delete this Hotel?'); ?>
		</li>			
		<li><?php echo $this->Html->link('Back to Hotels', array('action'=>'index')); ?></li>
	</ul>
</div>
<?php pr($roomsData) ?>