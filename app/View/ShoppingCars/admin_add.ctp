<?php	
 
    echo $this->Html->scriptBlock(
            '$(function() {
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
?>


<h1><?php echo __('Add Vehicle'); ?></h1>
<div class="vehicles form">
 <?php echo $this->Form->create('Vehicle', array('type' => 'file'));?>
 <div id="tabs">
      
    <ul>
		<li><a href="#tabs-1"><?php echo __('Vehicle'); ?></a></li>
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
   </ul>
    
    <div id="tabs-1">
      <?php
                 echo $this->Form->input('Product.product_name',array('type'=>'hidden','value'=>'-'));       
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
    </div>
 
<div id="tabs-2">
<fieldset  id="fieldsetImages">	  
    <?php

    for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
            echo $this->Form->input("Image.$i.image_name",array('label'=>__('Image ').($i+1),'type'=>'file'));
            echo $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_VEHICLE));
    }
    ?>
</fieldset> 
</div>    
<?php echo $this->Form->end(__('Submit'));?>
</div>   
    </div>  

<?php pr( $rentacars); ?>
