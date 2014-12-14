<?php	
 
    echo $this->Html->scriptBlock(
            '$(function() {
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
?>


<h1><?php echo __('Add Package'); ?></h1>
<div class="packages form">
 <?php echo $this->Form->create('Package', array('type' => 'file'));?>
 <?php $indexI18n=0 ?> 
<div id="tabs">
      
    <ul>
		<li><a href="#tabs-1"><?php echo __('Package'); ?></a></li>
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
                 <li><a href="#tabs-3"><?php echo __('Include/Exclude'); ?></a></li>
    </ul>
    
    <div id="tabs-1">
      <?php
		//echo $this->Form->input('id');
        
                echo $this->Form->input('Product.product_name',array('label'=>__('Package Name'),'div'=>'name')); 
                   echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));
                 echo $this->Form->input('code',array('label'=>__('Code')));                
                 echo $this->Form->input('package_category_id');  
                 echo $this->Form->input('activity_level', array('options' => array('Moderate'=>__(' Moderate '))));
                 echo $this->Form->input('tour_type', array('options' => array('Guided'=>__('Guided'),'Locally hosted'=>__('Locally hosted'),'Independent (Selfguided/Selfdrive)'=>__('Independent (Selfguided/Selfdrive)'))));
                echo $this->Form->input('tour_location',array('label'=>__('Location')));
                 echo $this->Form->input('meeting_point');
                 echo $this->Form->input('price_tag',array('label'=>__('Price Tag')));
                
                echo '<label>'.__('Duration').'</label>';
                echo $this->Form->input('days',array('label'=>__('Days')));
                echo $this->Form->input('nights',array('label'=>__('Nights')));
                echo '<label>'.__('Group Size').'</label>';
                echo $this->Form->input('pax_min',array('label'=>__('Min')));
		echo $this->Form->input('pax_max',array('label'=>__('Max')));
    
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
                                    array(),
                                    'I18nKey',
                                    $inputs
                                    );                    
               
                
                 ?>
       
    </div>

 
<div id="tabs-2">
<fieldset  id="fieldsetImages">	  
    <?php

    for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
            echo $this->Form->input("Image.$i.image_name",array('label'=>__('Image ').($i+1),'type'=>'file'));
            echo $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_PACKAGE));
    }
    ?>
</fieldset> 
</div>    
<div id="tabs-3">
  <?php
      echo $this->Form->input("IncludeNote",array('label'=>__('Includes & Excludes'),'options'=>$includeNotes,'size'=>'25', 'class'=>'selectmultiple', 'title'=>'Ctrl + click'));
?>
</div>
<?php echo $this->Form->end(__('Submit'));?>
</div>   
    </div>  

<?php //pr( $this->request->data); ?>
