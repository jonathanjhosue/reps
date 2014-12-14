<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Activities Controller
 *
 * @property Countries $Countries
 */
class CountriesController extends AppController
{
	/*var $name = 'Admin';
	var $uses = NULL;*/
    
    /*function beforeFilter() 
    {
        
       // $this->Auth->allow('*');
    }*/
    
   /*public function index() {
	//$this->change($country);
   }*/
	
	
	public function admin_change($country=null) {
		$this->change($country);
		
	}
	
	
	public function change($country=null) {
	//print($country);
			//throw new Exception($country);
            parent::changeCountry($country);

	}
        
       
}