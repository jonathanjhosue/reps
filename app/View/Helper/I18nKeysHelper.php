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
}




?>
