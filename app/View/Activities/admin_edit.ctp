<?php	
    echo $this->Html->scriptBlock(
            '$(function() {	
                $( "#divReviews" ).accordion({autoHeight: false,navigation: true,collapsible: true});               
                $( "#tabs" ).tabs();
                $( "input:submit" ).button();
                
            });'
            , array('allowCache'=>true,'safe'=>true,'inline'=>false));
?>

<h1><?php echo __('Edit Activity'); ?></h1>
<div class="activities form">   
    <?php $indexI18n=0 ;  ?>
	
<div id="tabs">
    <ul>
        <li><a href="#tabs-1"><?php echo __('Activity'); ?></a></li>		
        <li><a href="#tabs-2"><?php echo __('Images'); ?></a></li>  
        <li><a href="#tabs-3"><?php echo __('Fact Sheet'); ?></a></li>
        <li><a href="#tabs-4"><?php echo __('Seasons'); ?></a></li>
        <li><a href="#tabs-5"><?php echo __('Rates'); ?></a></li>
        <li><a href="#tabs-6"><?php echo __('Reviews'); ?></a></li>
	</ul>
<?php echo $this->Form->create('Activity', array('type' => 'file'));?>
    
     <div id="tabs-1">
	<?php
        echo $this->Form->input('Product.id',array('readonly'=>true));
            echo $this->Form->input('Product.product_name',array('label'=>__('Activity Name'),'div'=>'name'));             
            
                echo $this->Form->input('Product.location_id',array('label'=>__('Location'),'div'=>'name')); 
                
                echo $this->Form->input('activity_type_id');
             
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
                      
		echo $this->Form->label('Product.gpslatitude',__('GPS Coordenates'),'text');
                echo $this->Form->input('Product.gpslatitude',array('label'=>__('Latitude'),'div'=>'tinyname'));
		echo $this->Form->input('Product.gpslongitude',array('label'=>__('Longitude'),'div'=>'tinyname'));  
                  echo $this->Form->input('Product.map',array('label'=>__('Map URL'))); 
                

	?>
           <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Activity]'));
              
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
                 $img.= $this->Form->input("Image.$i.owner_type",array('type'=>'hidden','value'=>  TiposGlobal::PRODUCT_TYPE_ACTIVITY));
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
                    $del.=' '.$this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Image]['.$this->request->data['Image'][$i]['id'].']', 'div'=>false));
                }
                $img.='</div>';
                
                 
                echo $this->Form->input("Image.$i.image_name",array( 'before'=>$img,'label'=>_('Image ').($i+1),'type'=>'file', 
                    'after'=>$del));
            
         }
	?>
	</fieldset> 
         <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Activity]'));
              
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
                $this->data['I18nKey'],
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_SHEDULE,
                array('label'=>__('Shedule:'),'type'=>'fulltext'));
          echo "<hr/>";  
          echo $this->RipsWeb->getInputI18nAll($indexI18n,
                $this->data['I18nKey'],
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_WHATTOBRING,
                array('label'=>__('What to bring/wear:'),'type'=>'textarea'));
           echo $this->RipsWeb->getInputI18nAll($indexI18n,
                $this->data['I18nKey'],
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_NOTES,
                array('label'=>__('Important Notes:'),'type'=>'textarea'));
            echo $this->RipsWeb->getInputI18nAll($indexI18n,
                $this->data['I18nKey'],
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_INCLUDES,
                array('label'=>__('Includes'),'type'=>'textarea'));
             echo $this->RipsWeb->getInputI18nAll($indexI18n,
                $this->data['I18nKey'],
                'I18nKey',
                TiposGlobal::I18N_TYPE_ACTIVITY_POLICIES,
                array('label'=>__('Policies'),'type'=>'textarea'));
        
        ?>
           <fieldset class="hotelsActions"> 
            <?php 
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('product_id',array('type'=>'hidden'));
                echo $this->Form->submit(__('Save'),array('name'=>'data[Action][Save][Activity]'));
              
            ?>  
         </fieldset> 
    </div>
    
    <div id="tabs-4">  
          
       
        <?php echo $this->element('admin_season'); ?>
   
       
     </div>  
     <div id="tabs-5"> 
          
             
        <?php echo $this->element('admin_rate'); ?>
             
         
      
     </div>
    <div id="tabs-6">  	       
         <?php echo $this->element('admin_review',  compact('indexI18n')); ?>
        
     </div>
         <?php  echo $this->Form->end();  ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

                <li>
			<?php echo $this->Html->link(__('Delete'), array('controller'=>'activities', 'action'=>'delete', $this->Form->value('Product.id')), null, __('Are you sure you want to delete this activity?')); ?>
		</li>			
		<li><?php echo $this->Html->link(__('Back to Activities'), array('action'=>'index')); ?></li>
                <li>
			<?php echo $this->Html->link(__('View'), array('admin'=>false,'controller'=>'activities', 'action'=>'view', $this->Form->value('Product.id'))); ?>
		</li>
	</ul>
</div>

    
    <?php pr($activityTypes); ?>