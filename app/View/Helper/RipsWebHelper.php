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
    public $helpers = array('Html');
    function getLIFeature($arrayWithFeature,$feature){
        
        return $arrayWithFeature[$feature]? 
                    '<li>'.$this->Html->image('features/icon/'.$feature.'.png').$feature.'</li>'
               :
               '';
    }
   
    function getLIFeatureDetails($arrayWithFeature,$feature,$details){
        
        return $arrayWithFeature[$feature]? 
                 '<li>'.$this->Html->image('features/icon/'.$feature.'.png').$feature.
                 ($arrayWithFeature[$details]?'<input max="50" type="text" value="'.$arrayWithFeature[$details]['conferencefacilities_details'].'"/>':''). 
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
    
}

?>
