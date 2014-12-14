<?php
App::uses('Controller', 'Controller');
App::import('Model','TiposGlobal');

class AppController extends Controller {

	//var $components = array('Auth', 'Session');
        
        public $components = array(
        'Session',
        'Auth' => array(
            //'loginRedirect' => array('controller' => '/', 'action' => 'index'),
            'logoutRedirect' => array('controller' => '/', 'action' => 'index')
        )
    );
    function beforeFilter() {
        //$country=  TiposGlobal::getCountry();
        //$country=  TiposGlobal::getCountry();
       
        $localstr=$this->Session->read('Config.language');
        if($localstr==""){
           $this->changeLanguage();
        }
        //Configure::write('Config.language', $localstr);
        
        
        if ($this->params['controller'] == 'pages') {
            $this->Auth->allow('display','change','*','home','homeProducts'); // or ('page1', 'page2', ..., 'pageN')
        }else{
              $this->Auth->allow('index', 'view','change','*');            
        }

    }
    
    public function changeLocal($language='en',$country=null) {						
    if($country==null){				
      $country=  TiposGlobal::getCountry();	
}			
      //throw new Exception(" Language"+$language+" Country"+$country);			}			          
            $this->Session->write('Config.language', $language.'_'.strtoupper($country));
            $this->Session->write('Config.language_only', $language);
            $this->Session->write('Config.country', $country);

            //$this->redirect($this->referer());

	}	
	
	
	
	public function changeCountry($country=null) {						
	
	  $language=  $this->Session->read('Config.language_only');			         
	  $this->changeLocal($language, $country);  	}		
	  
	public function changeLanguage($language=null) {					
	
	$country=  $this->Session->read('Config.country');					
	
	$this->changeLocal($language, $country);  			
	
	}	 
	
	
	
   
    protected function getLanguageOnly(){
        
        $language=$this->Session->read('Config.language_only');
        
        return $language!="" ?$language:'en';
    }
    
    public function getCountryOnly(){
        
        $country=$this->Session->read('Config.country');
        
        return $country!="" ?$country:'CR';
    }
	
	/*function beforeFilter()
	{
		if (!$this->Session->check('language'))
		{
			$this->Session->write('language', 2); //English por default si el usuario no ha definido lenguage a�n.
		}
		
		//$this->Auth->allow('display','index','view', 'index_by_location');
	}*/
}
?>
