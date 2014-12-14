<?php	
    echo $this->Html->scriptBlock(
            '$(function() {
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();
                
            });'
            , array('allowCache'=>false,'safe'=>true,'inline'=>false));
?>


<h1><?php echo __('Add Activity'); ?></h1>

<div class="activities form">
<?php echo $this->Form->create('Activity', array('type' => 'file'));?>
     <?php $indexI18n=0 ?> 
    <div id="tabs">
           <ul>
		<li><a href="#tabs-1"><?php echo __('Activity'); ?></a></li>		
                <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>  
                <li><a href="#tabs-3"><?php echo __('Fact Sheet'); ?></a></li>
            </ul>
        <div id="tabs-1">
	<?php
        
            echo $this->Form->input('Product.product_name',array('label'=>__('Activity Name'),'div'=>'name'));             
            
                echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name')); 
                
                echo $this->Form->input('activity_type_id');
             
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
                  echo $this->Form->input('Product.map',array('label'=>__('Map URL'))); 
                

	?>
	 </div>
    <div id="tabs-2">
      
            <fieldset  id="fieldsetImages">	  
            <?php
            
            for($i=0;$i<Configure::read('Hotels.TotalImages');$i++){
                    echo $this->Form->input("Image.$i.image_name",array('label'=>__('Image ').($i+1),'type'=>'file'));
                    echo $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_ACTIVITY));
            }
            ?>
	</fieldset> 
    </div>
    <div id="tabs-3">
        <?php
        
                      
		
		echo $this->Form->input('duration');
		echo $this->Form->input('age_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
		echo $this->Form->input('age_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
		echo $this->Form->input('pax_min',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
		echo $this->Form->input('pax_max',array('size'=>'3','maxlength'=>'2','class'=>'rateNumber'));
         echo $this->RipsWeb->getInputI18nAll($indexI18n,
                array(),
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_SHEDULE,
                array('label'=>__('Shedule:'),'type'=>'fulltext'));
          echo "<hr/>";  
          echo $this->RipsWeb->getInputI18nAll($indexI18n,
                array(),
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_WHATTOBRING,
                array('label'=>__('What to bring/wear:'),'type'=>'textarea'));
           echo $this->RipsWeb->getInputI18nAll($indexI18n,
                array(),
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_NOTES,
                array('label'=>__('Important Notes:'),'type'=>'textarea'));
            echo $this->RipsWeb->getInputI18nAll($indexI18n,
                array(),
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_INCLUDES,
                array('label'=>__('Includes'),'type'=>'textarea'));
             echo $this->RipsWeb->getInputI18nAll($indexI18n,
                array(),
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_POLICIES,
                array('label'=>__('Policies'),'type'=>'textarea'));
        
        ?>
    </div>
        
  </div>   
           
<?php echo $this->Form->end(__('Submit'));?>
</div> 

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index'));?></li>		
		<li><?php echo $this->Html->link(__('List Activity Types'), array('controller' => 'activity_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity Type'), array('controller' => 'activity_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
