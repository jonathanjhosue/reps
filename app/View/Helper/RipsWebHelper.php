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
                 '<li class="detail">'.$this->Html->image('features/icon/'.$feature.'.png').$feature.
                 ($arrayWithFeature[$details]?': <span class>'.$arrayWithFeature[$details].'</span>':''). 
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
            $html.='<br/>';
            foreach (TiposGlobal::$HOTEL_FEATURESDETAILS as $key => $value) {
                $html.=$this->getLIFeatureDetails($arrayWithList, $key,$value);
            }  
            $html.='<ul>';
        }
         /*
         
         $html.='<ul>';
          $html.=$this->getLIFeature($arrayWithList, 'business_center',__('business Center'));
          $html.=$this->getLIFeature($arrayWithList, 'swimmingpool',__('swimmingpool'));
          $html.=$this->getLIFeature($arrayWithList, 'wet_bar',__('wt bar'));
          $html.=$this->getLIFeature($arrayWithList, 'wheelchair_accessible',__('wheelchair accesible'));
          $html.=$this->getLIFeature($arrayWithList, 'internet',__('internet'));
          $html.=$this->getLIFeature($arrayWithList, 'fitness_center',__('fitness center'));
          $html.=$this->getLIFeature($arrayWithList, 'private_car_park',__('private car park'));
          $html.=$this->getLIFeature($arrayWithList, 'gift_shop',__('gift shop'));
          $html.=$this->getLIFeature($arrayWithList, 'tour_desk',__('tour desk'));
          $html.=$this->getLIFeature($arrayWithList, 'laundry_service',__('laundry service'));
          $html.=$this->getLIFeature($arrayWithList, 'gardens',__('gardens'));
          $html.=$this->getLIFeature($arrayWithList, 'nature_trails',__('nature trails'));
          $html.=$this->getLIFeature($arrayWithList, 'socialfunctions_services',__('socialfunctions service'));
          $html.=$this->getLIFeature($arrayWithList, 'golf_court',__('golf court'));
          $html.=$this->getLIFeature($arrayWithList, 'tennis_court',__('tennis court'));
          $html.=$this->getLIFeature($arrayWithList, 'childcare',__('childcare'));
          $html.=$this->getLIFeature($arrayWithList, 'spa',__('spa'));
          $html.=$this->getLIFeature($arrayWithList, 'beauty_salon',__('beauty salon'));
          $html.=$this->getLIFeature($arrayWithList, 'room_service',__('room service'));
          $html.=$this->getLIFeature($arrayWithList, 'concierge',__('concierge'));
  $html.='<br/>';
          
          //con detalles
          $html.=$this->getLIFeatureDetails($arrayWithList, 'conference_facilities',__('conference facilities'),'conference_facilities_details');
          $html.=$this->getLIFeatureDetails($arrayWithList, 'certifications',__('certifications'),'certifications_details');
          $html.=$this->getLIFeatureDetails($arrayWithList, 'free_shuttle_service',__('free_shuttle service'),'freeshuttleservice_details');
          $html.='</ul>';
         *
         */
        return $html;        
    }
    
    function getAmenitiesList($arrayWithList=array()){
        $html='';
             $html.='<ul>';
            // $html.=$this->getLIFeature($arrayWithList, 'business_center',__('business Center'));       
            foreach (TiposGlobal::$ROOM_AMENITIES as  $value) {
                $html.=$this->getLIFeature($arrayWithList, $value);
            }
            $html.='<ul>';

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
    
    
    function getSuitableForList($arrayWithList=array()){
        $html='';
        if(count($arrayWithList)>0){
             $html.='<ul>';
            foreach (TiposGlobal::$PACKAGE_SUITABLEFOR as  $value) {
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
             $html.= $this->Form->input("$prefix.$index18n.id",array('type'=>'hidden','value'=> (isset($i18n_array[$type.':'.$language]['id']))?$i18n_array[$type.':'.$language]['id']:''  ));  
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
        
        $divname=$type.$index18n;
        
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
            $html.=$this->getInputI18n($index18n,$i18n_array,$prefix, $type, $language,$options);
            $html.='</div>';
            
        }
        $html.='</div>';
         //$this->data['I18nKey'][2]=array('id'=>'38','language'=>'pt','type'=>'asdgf','owner_id'=>'4','key'=>'sdf','value'=>'gf');
        return $html;       
         //return pr($this->data['I18nKey']);
        
    }
    
    
    
    
    function getInputsI18nAll( &$index18n=0,$i18n_array=array(),$prefix='I18nKey',$list=array()){
        if(count($list)>0){
            $type=$list[0]['type'];
            $divname=$type.$index18n;

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
                foreach ($list as $input){

                    $html.=$this->getInputI18n($index18n,$i18n_array,$prefix, $input['type'], $language,$input[0]);
                    if(isset($input['ext'])){
                         $html.=$input['ext'];
                    }
                     
                }

                $html.='</div>';

            }
            $html.='</div>';
            //$this->data['I18nKey'][2]=array('id'=>'38','language'=>'pt','type'=>'asdgf','owner_id'=>'4','key'=>'sdf','value'=>'gf');
            return $html;
        }
        else{
            return "";        
        }
         //return pr($this->data['I18nKey']);
        
    }
    
    
    function getStringFromDate($d=array()){
        
        return is_array($d)?$d['year'].'-'.$d['month'].'-'.$d['day']:$d;       
        
    }
    
 
}

?>
