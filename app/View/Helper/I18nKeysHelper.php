<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of I18nKeysHelper
 *
 * @author jonathan
 */
App::uses('AppHelper', 'View/Helper');
class I18nKeysHelper  extends AppHelper  {
    //put your code here
    
    function getKey($key){
        
         
        return isset($this->request->data['I18nKey'][$key])?$this->request->data['I18nKey'][$key]['value']:'';
    }
    
    
     function getKeyByType($list,$type){
        
         if(is_array($list)){
             /*if(isset($list[$type])){
                 return $list[$type]['value']:''
             }
             else{*/
                 $i18n_array= Set::combine($list , '{n}.type','{n}');
                 return isset($i18n_array[$type])?$i18n_array[$type]['value']:'';
             //}             
        }
        return '';        
    }
    
    
    function getIdByType($list,$type){
        
         if(is_array($list)){
             /*if(isset($list[$type])){
                 return $list[$type]['value']:''
             }
             else{*/
                 $i18n_array= Set::combine($list , '{n}.type','{n}');
                 return isset($i18n_array[$type])?$i18n_array[$type]['id']:'';
             //}             
        }
        return '';        
    }
    
 
                
    
}




?>
