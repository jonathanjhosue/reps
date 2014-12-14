<?php	
 
    echo $this->Html->scriptBlock(
            '$(function() {
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
?>


<h1><?php echo __('Add Rentacar'); ?></h1>
<div class="packages form">
 <?php echo $this->Form->create('Rentacar', array('type' => 'file'));?>
 <?php $indexI18n=0 ?> 
<div id="tabs">
      
    <ul>
		<li><a href="#tabs-1"><?php echo __('Rentacar'); ?></a></li>
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>
                
    </ul>
    
    <div id="tabs-1">
      <?php

        echo $this->Form->input('Product.product_name',array('label'=>__('Rentacar Name'),'div'=>'name')); 
        echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name'));
        $inputs=array(array('type'=>TiposGlobal::I18N_TYPE_RENTACAR_SERVICENOTES,array('label'=>__('Service Notes'),'type'=>'textarea')));
            
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
            echo $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_RENTACAR));
    }
    ?>
</fieldset> 
</div>    
<?php echo $this->Form->end(__('Submit'));?>
</div>   
    </div>  

<?php //pr( $this->request->data); ?>
