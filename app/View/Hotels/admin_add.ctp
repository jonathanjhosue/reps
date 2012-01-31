<h1><?php echo __('Add Hotel'); ?></h1>
<div class="hotels form">
<?php echo $this->Form->create('Hotel', array('type' => 'file'));?>
    
    <fieldset id="formHotel1">  
        <legend><?php echo __('Hotel'); ?></legend>
	<fieldset>		
	<?php
		//echo $this->Form->input('id');
        
                echo $this->Form->input('Product.product_name',array('label'=>__('Hotel Name'),'div'=>'name'));                
              
                echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));
                
                 
                echo $this->Form->input('hotel_category_id');
                
                echo $this->Form->input('check_in');
		echo $this->Form->input('check_out');
                
                echo $this->Form->input('I18nKey.0.type',array('type'=>'hidden','value'=>  TiposGlobal::I18N_TYPE_PRODUCT_DESCRIPTION));
                echo $this->Form->input('I18nKey.0.language',array('type'=>'hidden','value'=> 'en'));
                echo $this->Form->input('I18nKey.0.value',array('type'=>'textarea','label'=>__('Description')));
                
                
                echo $this->Form->input('I18nKey.1.type',array('type'=>'hidden','value'=>TiposGlobal::I18N_TYPE_PRODUCT_DIRECTION));
                echo $this->Form->input('I18nKey.1.language',array('type'=>'hidden','value'=> 'en'));
                echo $this->Form->input('I18nKey.1.value',array('type'=>'textarea','label'=>__('Direction')));
                
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
		echo $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_HOTEL));
         }
	?>
	</fieldset>
    </fieldset>

    
    
    <fieldset class="formHotel2">
        <legend><?php echo __('Features'); ?></legend>
    
     </fieldset>
    <fieldset class="formHotel3">
        <legend><?php echo __('Rooms'); ?></legend>
  

    </fieldset>
    
    <fieldset class="formHotel4">
        <legend><?php echo __('Room Rate'); ?></legend> 
	
     </fieldset>
	<fieldset  class="formHotel5">
		<legend><?php echo __('Reviews'); ?></legend>
               
	</fieldset>
       
<?php echo $this->Form->end(__('Submit'));?>
</div>    

    
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hotels'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Categories'), array('controller' => 'hotel_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Category'), array('controller' => 'hotel_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List I18n Keys'), array('controller' => 'i18n_keys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New I18n Key'), array('controller' => 'i18n_keys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php pr( $this->request->data); ?>
