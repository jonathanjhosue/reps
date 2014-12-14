
    <?php  
    $indexI18n=0;

    /*echo $this->RipsWeb->getInputsI18nAll($indexI18n,
                    $this->data['TipsAndSafety'],
                    'TipsAndSafety.'.''.'.I18nKey',
                    $inputs);*/
    
    
if(isset($this->data['TipsAndSafety']) && count($this->data['TipsAndSafety'])>0){    
    $divname=TiposGlobal::I18N_TYPE_RENTACAR_TIPSANDSAFETY.$indexI18n;
    
    $this->Html->scriptBlock(
            '$(function() {
                $( "#tabs'.$divname.'" ).tabs();                    
            });'                
            , array('safe'=>true,'inline'=>false));
    $html='';
    $lenguages=Configure::read('Rips.Languages');
    $html.='<div id="tabs'.$divname.'">';
    $html.='<ul>';
    foreach($lenguages as $id=> $language){
        $html.='<li><a href="#tabs'.$divname.'-'.($id+1).'">'.$this->Html->image($language.'_flag.png').'</a></li>';

    }
    $html.='</ul>';
   
    foreach($lenguages as $id=>$language){
        $html.='<div id="tabs'.$divname.'-'.($id+1).'">';
        
        foreach($this->data['TipsAndSafety'] as $i=>$tipsandsafety){ 
        //foreach ($list as $k=>$input){
            $html.= $this->Form->input('TipsAndSafety.'.$i.'.id',array('type'=>'hidden','value'=>$tipsandsafety['id']));
            $html.= $this->Form->input('TipsAndSafety.'.$i.'.product_id',array('type'=>'hidden','value'=>$tipsandsafety['product_id']));
            $input=array('type'=>TiposGlobal::I18N_TYPE_RENTACAR_TIPSANDSAFETY, 
                        array('label'=>'','type'=>'textarea')
                    );
            
            $html.= $this->RipsWeb->getInputI18n($indexI18n,$tipsandsafety['I18nKey'],'TipsAndSafety.'.$i.'.I18nKey', $input['type'], $language,$input[0]);
            
            $html.=$this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][TipsAndSafety]['.$tipsandsafety['id'].']','div'=>false));

        }

        $html.='</div>';

    }
    $html.='</div>';
    echo $html;
} 
    
    
   
      //echo $this->Form->submit(__('Delete'),array('name'=>'data[Action][Delete][TipsAndSafety]['.$tipsandsafety['id'].']'));

    ?> 

