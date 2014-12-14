<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Languages Controller
 *
 * @property Languages $Languages
 */
class LanguagesController extends AppController
{
	/*var $name = 'Admin';
	var $uses = NULL;*/
    
   /* function beforeFilter() 
    {
        
        //$this->Auth->allow('*');
    }*/

	public function admin_change($language=null) {
		
		
		change($language);
	}
	
	
	public function change($language='en') {
			
            parent::changeLanguage($language);

	}
        
       
}
?>