<?php	
    echo $this->Html->scriptBlock(
            '$(function() {
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();
                
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
?>


<h1><?php echo __('Add Hotel'); ?></h1>
<div class="hotels form">
 <?php echo $this->Form->create('Hotel', array('type' => 'file'));?>
 <?php $indexI18n=0 ?> 
<div id="tabs">
      
    <ul>
		<li><a href="#tabs-1"><?php echo __('Hotel'); ?></a></li>
		<li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
		<li><a href="#tabs-3"><?php echo __('Features'); ?></a></li>
               
    </ul>
    
    <div id="tabs-1">
      <?php
		//echo $this->Form->input('id');
        
                echo $this->Form->input('Product.product_name',array('label'=>__('Hotel Name'),'div'=>'name'));                
              
                echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));                
                 
                echo $this->Form->input('hotel_category_id');
                
                echo $this->Form->input('check_in');
		echo $this->Form->input('check_out');
                
                       
                
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    array(),
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION,
                                    array('label'=>__('Description'),'type'=>'textarea'));
                
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                    array(),
                                    'I18nKey',
                                    TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION,
                                      array('label'=>__('Direction'),'type'=>'textarea'));
                
		echo $this->Form->label('Product.gpslatitude',__('GPS Coordenates'),'text');
                echo $this->Form->input('Product.gpslatitude',array('label'=>__('Latitude'),'div'=>'tinyname'));
		echo $this->Form->input('Product.gpslongitude',array('label'=>__('Longitude'),'div'=>'tinyname'));           
                echo "<hr/>";
                
                echo $this->RipsWeb->getInputI18nAll($indexI18n,
                                        array(),
                                'I18nKey',
                                TiposGlobal::I18N_TYPE_HOTEL_ROOMNOTES,array('label'=>__('Note about the rooms'),'div'=>'fulltext'));
                
            echo $this->Form->input('child_age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber')).                 
                 $this->Form->input('child_age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));                                
            echo $this->Form->input('infant_age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber')).                 
                $this->Form->input('infant_age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
        ?>
       
    </div>
    <div id="tabs-2">
       <fieldset  id="fieldsetImages">	  
            <?php
            
            for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
                    echo $this->Form->input("Image.$i.image_name",array('label'=>_('Image ').($i+1),'type'=>'file'));
                    echo $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_HOTEL));
            }
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
                        array(),
                        'I18nKey',
                        TiposGlobal::I18N_TYPE_HOTEL_DININGANDDRINKING,
                        array('label'=>__('Dining & Drinking'),'type'=>'textarea'));

            ?>
            </div>
    </div>
    
    


</div>   
           
<?php echo $this->Form->end(__('Submit'));?>
</div>   
    

<?php //pr( $this->request->data); ?>
