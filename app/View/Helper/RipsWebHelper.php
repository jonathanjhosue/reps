<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RipsWebHelper
 *
 * @author jonathan
 */
App::uses('AppHelper', 'View/Helper');

class RipsWebHelper  extends AppHelper  {
    //put your code here
    public $helpers = array('Html','Form','I18nKeys');
    function getLIFeature($arrayWithFeature,$feature){
        
        return $arrayWithFeature[$feature]? 
                    '<li>'.$this->Html->image('features/icon/'.$feature.'.png').$feature.'</li>'
               :
               '';
    }
   
    function getLIFeatureDetails($arrayWithFeature,$feature,$details){
        
        return $arrayWithFeature[$feature]? 
                 '<li>'.$this->Html->image('features/icon/'.$feature.'.png').$feature.
                 ($arrayWithFeature[$details]?'<input max="50" type="text" value="'.$arrayWithFeature[$details].'"/>':''). 
                 '</li>'
               :
               '';
    }
    
    function getFeaturesList($arrayWithList=array()){
        $html='';
        if(count($arrayWithList)>0){
             $html.='<ul>';
            foreach (TiposGlobal::$HOTEL_FEATURES as $value) {
                $html.=$this->getLIFeature($arrayWithList, $value);
            }         
            foreach (TiposGlobal::$HOTEL_FEATURESDETAILS as $key => $value) {
                $html.=$this->getLIFeatureDetails($arrayWithList, $key,$value);
            }  
            $html.='<ul>';
        }
        return $html;        
    }
    
    function getAmenitiesList($arrayWithList=array()){
        $html='';
        if(count($arrayWithList)>0){
             $html.='<ul>';
            foreach (TiposGlobal::$ROOM_AMENITIES as  $value) {
                $html.=$this->getLIFeature($arrayWithList, $value);
            }
            $html.='<ul>';
        }
        return $html;       
        
    }
    
    function getDiningAndDrinkingList($arrayWithList=array()){
        $html='';
        if(count($arrayWithList)>0){
             $html.='<ul>';
            foreach (TiposGlobal::$HOTEL_DININGANDDRINKING as  $value) {
                $html.=$this->getLIFeature($arrayWithList, $value);
            }
            $html.='<ul>';
        }
        return $html;       
        
    }
    
    
    function getInputI18n( &$index18n=0,$i18n_array=array(),$prefix='I18nKey',$type='', $language='en', $options=array()){
        $html='';       
        if(count($i18n_array)>0){
             $i18n_array= Set::combine($i18n_array, array('{0}:{1}', '{n}.type', '{n}.language'),'{n}');
            
        }
       
        //$i18n_array=
        $value="";
        if(isset($i18n_array[$type.':'.$language])){              
             $html.= $this->Form->input("$prefix.$index18n.id",array('type'=>'hidden','value'=> $i18n_array[$type.':'.$language]['id']  ));  
             $value=$i18n_array[$type.':'.$language]['value'];
            
        }
         $options['value']=$value;
         $options['label'].=" ($language) ";
        
      
        $html.= $this->Form->input("$prefix.$index18n.type",array('type'=>'hidden','value'=>  $type));
        $html.= $this->Form->input("$prefix.$index18n.language",array('type'=>'hidden','value'=> $language));
        $html.= $this->Form->input("$prefix.$index18n.value",$options);
        $index18n++;
        return $html;       
        
    }
    
     function getInputI18nAll( &$index18n=0,$i18n_array=array(),$prefix='I18nKey',$type='', $options=array()){
        $html='';
        
        $lenguages=Configure::read('Rips.Languages');
        
        foreach($lenguages as $language){
            $html.=$this->getInputI18n($index18n,$i18n_array,$prefix, $type, $language,$options);
            
        }
         //$this->data['I18nKey'][2]=array('id'=>'38','language'=>'pt','type'=>'asdgf','owner_id'=>'4','key'=>'sdf','value'=>'gf');
        return $html;       
         //return pr($this->data['I18nKey']);
        
    }
    
 
}

?>
