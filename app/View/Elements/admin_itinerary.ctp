
<?php	
   $indexI18n=0;
 $days=$this->data['Package']['days'];
if (count($this->data['Itinerary'])!=$days): ?>
<div class="ui-widget">
    <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all"> 
        <p>
            <span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
          
<?php     echo __('Days of the itinerary are different from the package. Please verify'); ?> 
        </p>
    </div>
</div>
<?php endif;
$i=0;
foreach($this->data['Itinerary'] as $i=>$itinerary){ 

    $titulo=__('Day ').($i+1);    
    ?>
<div class="ui-accordion-header">
    <h3><a href="#"><?php echo $titulo ?></a></h3>
    <div>
    <?php    
    
    echo $this->Form->input('Itinerary.'.$i.'.id',array('type'=>'hidden','value'=>$itinerary['id']));
    echo $this->Form->input('Itinerary.'.$i.'.package_id',array('type'=>'hidden','value'=>$itinerary['package_id']));
    echo $this->Form->input('Itinerary.'.$i.'.day_number',array('type'=>'hidden','value'=>($i+1)));
    
    $options_breakfast=array(''=>'N/A','B'=>__('Breakfast'),'CB'=>__('Continental Breakfast'));
    echo $this->Form->input('Itinerary.'.$i.'.breakfast',array('options'=>$options_breakfast));
    
    $options_lunch=array(''=>'N/A','L'=>__('Lunch'),'S'=>__('Snack'),'L'=>__('Private Lunch'));
    echo $this->Form->input('Itinerary.'.$i.'.lunch',array('options'=>$options_lunch));
    
    $options_dinner=array(''=>'N/A','D'=>__('Dinner'),'AI'=>__('All Inclusive'));
    echo $this->Form->input('Itinerary.'.$i.'.dinner',array('options'=>$options_dinner));
    //echo $this->Form->input('Itinerary.'.$i.'.continental_breakfast',array('type'=>'radio'));

    $inputs=array(array('type'=>TiposGlobal::I18N_TYPE_ITENERARY_HEADLINE, array('label'=>__('Headline'),'type'=>'fulltext')),
                  array('type'=>TiposGlobal::I18N_TYPE_ITENERARY_DESCRIPTION, array('label'=>__('Description'),'type'=>'textarea'))
             );
    echo $this->RipsWeb->getInputsI18nAll($indexI18n,
                    $itinerary['I18nKey'],
                    'Itinerary.'.$i.'.I18nKey',
                    $inputs);
    /*echo $this->RipsWeb->getInputI18nAll($indexI18n,
                    $itinerary['I18nKey'],
                    'Itinerary.'.$i.'.I18nKey',
                    TiposGlobal::I18N_TYPE_ITENERARY_HEADLINE,
                    array('label'=>__('Headline'),'type'=>'text','div'=>'fulltext'));                   


    echo $this->RipsWeb->getInputI18nAll($indexI18n,
                    $itinerary['I18nKey'],
                    'Itinerary.'.$i.'.I18nKey',
                    TiposGlobal::I18N_TYPE_ITENERARY_DESCRIPTION,
                    array('label'=>__('Description'),'type'=>'textarea'));        */      
    
    //se puede borrar el 'ultimo
    if(($i+1)==$days){
      echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][Itinerary]['.$itinerary['id'].']'));
    }
    ?>
         
    </div>
    </div>
    <?php   
    
}            
?>  
   
