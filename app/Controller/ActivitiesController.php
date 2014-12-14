<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Activities Controller
 *
 * @property Activity $Activity
 */
class ActivitiesController extends AppController {

 public $helpers = array('Html', 'Form');

 
    public $paginate = array(
        'limit' => 12          
    );
    
    public function details($ids=null) {
        $this->layout = 'default';
        $this->helpers[] = 'I18nKeys';
        $this->helpers[] = 'RipsWeb';
        //$language = $this->Session->read('language');

        $language='en';


        //$this->Activity->id = $ids;      
       
        $this->Activity->setLocale($language);
   
        $this->Activity->unbindModel(array('hasMany' => array('Season','Review')));
        $this->Activity->recursive = 1;               
        $this->request->data = $this->Activity->find('all',array('conditions'=>array('Activity.product_id'=>array(50,49))));

    
        $this->set('activities', $this->request->data); 
        
        
    }
 
    public function index($idlocation=null) {

		
		$this->helpers[] = 'Js';
                $language=$this->getLanguageOnly();
	 
                $this->Activity->recursive = 1;
                $this->Activity->unbindModel(array(
				'hasMany' => array('Season','Review')
				)
			);
                $conditions=array();
                if($idlocation>0){
                    $conditions['Product.location_id']=$idlocation;
                }    
                
                if (isset($this->passedArgs['category'])) {                  
                        
                        $input = $this->passedArgs['category'];
                       
                        $input = Sanitize::escape($input);

                        $conditions['ActivityType.id']=$input;
                       
                }                 
              
                $searchValue=$this->Session->read("Search.{$this->name}.value");
                if(!empty($this->data)) {
                    Sanitize::clean($this->data);                    

                    if(isset($this->data['Search']['value'])) {
                        $searchValue=$this->data['Search']['value'];
                          
                    }
                   
                    $this->Session->write("Search.{$this->name}.value", $searchValue);
                    
                }
                
                $conditions["concat(Product.product_name,ActivityType.activity_type_name) LIKE "]= "%{$searchValue}%";
                $this->Activity->setLocale($language, $this->getCountryOnly());
                //$this->Hotel->Product->setLocale($language);
                
		$this->set('activities', $this->paginate($conditions));
                $this->set('idlocation', $idlocation);
	}
 
 /*
	 * Description: Permite recuperar toda la informaci�n para la vista de usuario visitante.
	 * $id: identificador de actividad
	 * $language: identificador del lenguage en que se requiere la informaci�n.
	*/
	public function view($id)
	{	
		$this->layout = 'default';
		$this->helpers[] = 'Js';
		$this->helpers[] = 'I18nKeys';
                $this->helpers[] = 'RipsWeb';
		//$language = $this->Session->read('language');
                
                $language=$this->getLanguageOnly();
		
		
                 $this->Activity->id = $id;
                $this->Activity->recursive = 0;  
                /*el verificar si existe se hace antes de los unbind ya que si no se borrarían*/
                if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}          
                
                
                $this->Activity->Product->setLocale($language,$this->getCountryOnly());
                $this->Activity->setLocale($language);
                //$this->Activity->Room->setLocale($language);
                $this->Activity->Product->StaffReview->setLocale($language);
                $this->Activity->Product->TravellerReview->setLocale($language);
                
                $this->Activity->ActivityType->unbindModel(array('hasMany'=>array('Activity')));               
                $this->Activity->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                $this->Activity->Product->Rate->unbindModel(array('belongsTo'=>array('Product')));
                 
                $this->Activity->unbindModel(array('hasMany' => array('Season','Review')));
                $this->Activity->Product->unbindModel(array('hasMany' => array('Activities','I18nKey'))); 
                
                $this->Activity->Product->StaffReview->unbindModel(array('belongsTo'=>array('Product')));
                $this->Activity->Product->TravellerReview->unbindModel(array('belongsTo'=>array('Product')));

                
                
                
                $this->Activity->recursive = 3;               
		$this->request->data = $this->Activity->find('first',array('conditions'=>array('Activity.product_id'=>$id)));
                
           
                  
		//--Se env�an las variables hacia el View.
		$this->set('activity', $this->request->data);         
		
	}
 
 
 
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
            $paginate = array('limit' => 20) ;
              $this->layout="admin";
		$this->Activity->recursive = 1;
		$this->Activity->setLocale($this->getLanguageOnly(), $this->getCountryOnly());
		$this->set('activities', $this->paginate());
		
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
             $this->layout="admin";
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$this->set('activity', $this->Activity->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            $this->layout="admin";
            $this->helpers[] = 'I18nKeys';
            $this->helpers[] = 'RipsWeb';
            	if ($this->request->is('post')) {
			$this->Activity->create();
                        //$this->set('enviado',$this->request->data);
                    
                            //$this->set('');
                        //$imagenes=  array_splice($this->request->data['Image'], 0);
                        
			if ($this->Activity->saveAssociated($this->request->data)) {
                           
				$this->Session->setFlash(__('The Activity has been saved'));
				$this->redirect(array('action' => 'edit',$this->Activity->id));
			} else {
				$this->Session->setFlash(__('The Activity could not be saved. Please, try again.'));
			}
		}
		$products = $this->Activity->Product->find('list');
		$activityTypes = $this->Activity->ActivityType->find('list',array('fields' => array('ActivityType.id', 'ActivityType.activity_type_name', 'ActivityType.category')));
                
               
                
                $locations = $this->Activity->Product->Location->findByCountry($this->getCountryOnly());
                
		$this->set(compact('products', 'activityTypes','locations'));
                
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
            
            	$this->layout = 'admin';
               $this->helpers[] = 'I18nKeys';
                $this->helpers[] = 'RipsWeb';
                
            
            
            
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			   $this->action_delete($id)|| $this->action_save()|| $this->action_add($id); 
		} else {
			                        
                        
                        $this->Activity->ActivityType->unbindModel(array('hasMany'=>array('Activity')));               
                        $this->Activity->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                        $this->Activity->Product->unbindModel(array('hasMany' => array('I18nKey','Activities','TravellerReview','StaffReview'))); 
                        $this->Activity->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                         $this->Activity->Season->unbindModel(array('hasMany' => array('Rate'),'belongsTo'=>array('Product','Parent'))); 
                        /*
                        $this->Activity->Product->Rate->unbindModel(array('belongsTo'=>array('Product','Season')));
                                             
                       
                        $this->Activity->Season->SeasonException->unbindModel(array('hasMany' => array('Rate'),'belongsTo'=>array('Parent','Product'))); 
                        */
                    
                        $this->Activity->recursive = 2; 
                        $this->request->data = $this->Activity->read(null, $id);
                        
                        
		}
		$products = $this->Activity->Product->find('list');
		$activityTypes = $this->Activity->ActivityType->find('list',array('fields' => array('ActivityType.id', 'ActivityType.activity_type_name', 'ActivityType.category')));
                //$activityTypes = Set::combine($activityTypes, '{n}.category', '{n}');
                 
                $locations = $this->Activity->Product->Location->findByCountry($this->getCountryOnly());
		$this->set(compact('products', 'activityTypes','locations'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->Activity->delete()) {
			$this->Session->setFlash(__('Activity with id: '.$id.' has been deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Activity was not deleted'));
		$this->redirect(array('action' => 'index'));               
       
	}
        
        
        
        
          private function action_delete($id=null){
            if(isset($this->request->data['Action']['Delete'])){               
                 
                   if(isset($this->request->data['Action']['Delete']['Review'])){
                        
                        if($this->Activity->Review->delete(key($this->request->data['Action']['Delete']['Review']))){
                            $this->Session->setFlash(__('The Review data have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Review could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                          $this->redirect('edit/'.$id.'#tabs-6'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Season'])){                        
                        if($this->Activity->Season->delete(key($this->request->data['Action']['Delete']['Season']))){
                            $this->Session->setFlash(__('The Season have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Season could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-4'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Image'])){                        
                        if($this->Activity->Image->delete(key($this->request->data['Action']['Delete']['Image']))){
                             $this->Session->setFlash(__('The Image have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Image could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                        $this->redirect('edit/'.$id.'#tabs-2'); 
                    }  
                    return true;
            }  
            return false;
        }
        
        private function action_add($id=null){
            if(isset($this->request->data['Action']['Add'])){               
                 
                  if(isset($this->request->data['Action']['Add']['SeasonException']) ){                         
                        $row=array('product_id'=>$id,'parent_id'=>key($this->request->data['Action']['Add']['SeasonException']));                        
                        
                         if( $this->Activity->Season->save($row)){
                             $this->Session->setFlash(__('The season have been added'));
                             $this->redirect('edit/'.$id.'#tabs-4'); 
                        }else{
                             $this->Session->setFlash(__('The season could not be added'));
                        } 
                         $this->redirect('edit/'.$id.'#tabs-5'); 
                    }elseif(isset($this->request->data['Action']['Add']['Seasons']) ){
                        $c=isset($this->request->data['Action']['Add']['Seasons_count'])?$this->request->data['Action']['Add']['Seasons_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[$i]=array('product_id'=>$id);                           
                        }
                        if($this->Activity->Season->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The seasons has been added'));
                             $this->redirect('edit/'.$id.'#tabs-4'); 
                        }else{
                             $this->Session->setFlash(__('The seasons could not be added'),'default', array(), 'error');
                        }                            
                        
                    }elseif(isset($this->request->data['Action']['Add']['Reviews'])){
                        $c=isset($this->request->data['Action']['Add']['Reviews_count'])?$this->request->data['Action']['Add']['Reviews_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[$i]=array('product_id'=>$id,'review_date'=>date("Y-m-d"));

                        }
                         if($this->Activity->Review->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The reviews has been added'));
                              $this->redirect('edit/'.$id.'#tabs-6');  
                        }else{
                             $this->Session->setFlash(__('The reviews could not be added'),'default', array(), 'error');
                        } 
                         
                    }                    
            } 
            return false;
        }

        private function action_save($id=null){
            if(isset($this->request->data['Action']['Save'])){   
                $errores=array();
                if(isset($this->request->data['Action']['Save']['Activity'])){                         
                    $this->Activity->unbindModel(array('hasMany'=>array('Season','Review')));     

                    if ($this->Activity->saveAssociated($this->request->data)){   
                       
                        $this->Session->setFlash(__('The Activity data have been saved'));                       
                        //$this->redirect('edit/'.$id.'#tabs-1');
                        // $this->request->data['postSave']=$this->Activity;
                    }else{
                        $this->Session->setFlash(__('The activity could not be saved. Please, try again.'), 'default', array(), 'error');
                    }
                       
                }elseif(isset($this->request->data['Action']['Save']['Reviews'])){                                                 
                    if(isset($this->request->data['Review'])){      
                         
                        foreach($this->request->data['Review'] as $h=>$reviewData){  
                            $this->Activity->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                            $this->Activity->Review->saveAssociated($reviewData);  
                            if(!empty($this->Activity->Review->validationErrors))
                                $errores[$h]=$this->Activity->Review->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Activity->Review->validationErrors=$errores;
                            $this->Session->setFlash(__('Review could not be saved. Please, try again.'), 'default', array(), 'error');
                             // $this->redirect(array('edit/'.$id.'#tabs-7'));
                        }
                        else{
                            $this->Session->setFlash(__('The review data have been saved'));
                        }                           
                     }
                       
              }elseif(isset($this->request->data['Action']['Save']['Rates'])){
                 
                    if(isset($this->request->data['Product']['Rate'])){                                                
                        
                        if(!$this->Activity->Product->Rate->saveMany($this->request->data['Product']['Rate'])){
                            $this->Session->setFlash(__('Rates could not be saved. Please, try again.'));
                        }
                        else{
                            $this->Session->setFlash(__('Rates data have been saved'));
                        }  
                    }
                        
             }elseif(isset($this->request->data['Action']['Save']['Seasons'])){
                    $this->Activity->Review->unbindModel(array('belongsTo'=>array('Product')));

                    if(isset($this->request->data['Season'])){
                        $this->Activity->Season->setDataArray($this->request->data['Season']);
                         $this->Activity->Season->SeasonException->setDataArray($this->request->data['Season']);
                        foreach($this->request->data['Season'] as $h=>$reviewData){ 
                            $this->Activity->Season->saveAssociated($reviewData);
                            if(!empty($this->Activity->Season->validationErrors))
                                $errores[$h]=$this->Activity->Season->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Activity->Season->validationErrors=$errores;
                            $this->Session->setFlash(__('Season could not be saved. Please, try again.'), 'default', array(), 'error');
                              //$this->redirect(array('edit/'.$id.'#tabs-5'));
                        }
                        else{
                            $this->Session->setFlash(__('The season data have been saved'));
                        }  
                     }
                        
              } 
              return true;
            }  
            return false;
        }
        
        
}
