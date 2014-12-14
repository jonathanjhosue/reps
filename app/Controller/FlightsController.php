<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * flights Controller
 *
 * @property Flight $Flight
 */
class FlightsController extends AppController {

 public $helpers = array('Html', 'Form');

 
    public $paginate = array(
        'limit' => 12          
    );
    
     public function index() {

		$this->helpers[] = 'Js';
                $language=$this->getLanguageOnly();
                        
                $this->Flight->recursive = 1;
                /*$this->Flight->unbindModel(array(
				'belongsTo'=>array('Product','VehicleCategory','Rentacar')
				)
			);*/
                $conditions=array();
                                
                if (isset($this->passedArgs['category'])) {                  
                        $input = $this->passedArgs['category'];
                        $input = Sanitize::escape($input);
                        $conditions['FlightDestination.id']=$input;
                       
                } 
                if(!empty($this->data)) {
                    Sanitize::clean($this->data);
                    $searchkey = $this->Session->read('Search.value');

                    if(empty($searchkey)) {
                            $this->Session->write('Search.value', $this->data['Search']['value']);
                    }
                    if($this->data['Search']['value'] != $this->Session->read('Search.value')) {
                            $this->Session->delete('Search.value');
                            $this->Session->write('Search.value', $this->data['Search']['value']);
                    }
                }
                $conditions["concat(Product.product_name,FlightFrom.name,FlightTo.name) LIKE "]= "%{$this->Session->read('Search.value')}%";
                $this->Flight->setLocale($language);
		$this->set('flights', $this->paginate($conditions));
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
		
		
                 $this->Flight->id = $id;
                $this->Flight->recursive = 0;  
                /*el verificar si existe se hace antes de los unbind ya que si no se borrarían*/
                if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid Flight'));
		}          
                
                $this->Flight->Behaviors->attach('Containable');
                //$this->Flight->bindModel(array('hasMany'=>array('Rate'=>array('foreignKey'=>'product_id'))));
                $contain=array('Product'=>array('Location'),
                               'FlightFrom','FlightTo','AditionalService',
                               //'Itinerary'=>array('I18nKey'),
                               //'Rate'=>array('Season'), 
                               //'Flight'=>array('Product','I18nKey','TipsAndSafety'=>('I18nKey'),'AditionalService'),
                               'TipsAndSafety'=>('I18nKey'),
                               //'Activity'=>array('Product'=>array('I18nKey','Location'),'Image'),
                               //'Hotel'=>array('Product'=>array('I18nKey','Location'),'Image'),
                               //'Extension'=>array('Product'=>array('I18nKey','Location'),'Image')
                              );
                $this->Flight->contain($contain);
                

                $this->Flight->Product->setLocale($language, $this->getCountryOnly());
             //   $this->Flight->setLocale($language);
             //   $this->Flight->Itinerary->setLocale($language);
                //$this->Flight->FlightDestination->setLocale($language);
             //   $this->Flight->Rentacar->TipsAndSafety->setLocale($language);
              
		$this->request->data = $this->Flight->find('first',array('conditions'=>array('Flight.product_id'=>$id)));
                $this->request->data['Flight']['AditionalService']=$this->request->data['AditionalService'];
                unset($this->request->data['AditionalService']);
		$this->set('flight', $this->request->data);  
                if(isset($this->request->data['FlightDestination']['product_id'])){
                    $options['conditions']=array('rentacar_id'=>$this->request->data['Rentacar']['product_id']);
                    //$locationsRentacar=$this->Flight->Rentacar->LocationRentacar->find('list',$options);
                    //$this->set('locationsRentacar', $locationsRentacar);   
                    
                }
     }
                
                
 
 /**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
            $paginate = array('limit' => 20) ;
              $this->layout="admin";
		$this->Flight->recursive = 1;

		$this->set('flights', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
             $this->layout="admin";
		$this->Flight->id = $id;
		if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid Flight'));
		}
		$this->set('Flight', $this->Flight->read(null, $id));
	}
        

	public function admin_add() {
            $this->layout="admin";
              	if ($this->request->is('post')) {
			$this->Flight->create();
                                                
			if ($this->Flight->saveAssociated($this->request->data)) {
                           
				$this->Session->setFlash(__('The Flight has been saved'));
				$this->redirect(array('action' => 'edit',$this->Flight->id));
			} else {
				$this->Session->setFlash(__('The Flight could not be saved. Please, try again.'));
			}
		}
                $flightdestinations = $this->Flight->FlightFrom->find('list');
                $this->set(compact('flightdestinations'));
                $this->set('dd',$this->request->data);
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
                
            
            
            
		$this->Flight->id = $id;
		if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid Flight'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			   $this->action_delete($id)|| $this->action_save()|| $this->action_add($id); 
		} else {
			                        
                        
                        $this->Flight->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                        $this->Flight->Product->unbindModel(array('hasMany' => array('I18nKey','Flights','TravellerReview','StaffReview'))); 
                       // $this->Flight->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                        $this->Flight->unbindModel(array('hasAndBelongsToMany'=>array('ProductRelation'))); 
                       // $this->Flight->Season->unbindModel(array('hasMany' => array('Rate'),'belongsTo'=>array('Product','Parent'))); 
                       
                    
                        $this->Flight->recursive = 2; 
                        $this->request->data = $this->Flight->read(null, $id);
                        
                        
		}
                 $products = $this->Flight->Product->find('list');
                 
                $flightdestinations = $this->Flight->FlightFrom->find('list');
                $this->set(compact('flightdestinations'));
                $this->set('dd',$this->request->data);
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
		$this->Flight->id = $id;
		if (!$this->Flight->exists()) {
			throw new NotFoundException(__('Invalid Flight'));
		}
		if ($this->Flight->delete()) {
                        $this->Flight->Product->delete($id);
			$this->Session->setFlash(__('Flight with id: '.$id.' has been deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Flight was not deleted'));
		$this->redirect(array('action' => 'index'));               
	}
        
          private function action_delete($id=null){
            if(isset($this->request->data['Action']['Delete'])){               
                 
                   if(isset($this->request->data['Action']['Delete']['Review'])){
                        
                        if($this->Flight->Review->delete(key($this->request->data['Action']['Delete']['Review']))){
                            $this->Session->setFlash(__('The Review data have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Review could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                          $this->redirect('edit/'.$id.'#tabs-6'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Itinerary'])){ 
                        //$this->request->data['Flight']['days']= $this->request->data['Flight']['days']-1;
                        if($this->Flight->Itinerary->delete(key($this->request->data['Action']['Delete']['Itinerary']))
                           //&&  $this->Flight->save($this->request->data)    
                           ){
                            $this->Session->setFlash(__('The Day itinerary have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Day itinerary could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-7');                           
                    }elseif(isset($this->request->data['Action']['Delete']['Season'])){                        
                        if($this->Flight->Season->delete(key($this->request->data['Action']['Delete']['Season']))){
                            $this->Session->setFlash(__('The Season have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Season could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Image'])){                        
                        if($this->Flight->Image->delete(key($this->request->data['Action']['Delete']['Image']))){
                             $this->Session->setFlash(__('The Image have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Image could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                        $this->redirect('edit/'.$id.'#tabs-2'); 
                       
                    }elseif(isset($this->request->data['Action']['Delete']['TipsAndSafety'])){                        
                        if($this->Flight->TipsAndSafety->delete(key($this->request->data['Action']['Delete']['TipsAndSafety']))){
                            
                             $this->Session->setFlash(__('The TipsAndSafety have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The TipsAndSafety could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                        $this->redirect('edit/'.$id.'#tabs-3'); 
                    }  
                    
            }  
            return false;
        }
        
        private function action_add($id=null){
            if(isset($this->request->data['Action']['Add'])){               
                 
                  if(isset($this->request->data['Action']['Add']['SeasonException']) ){                         
                        $row=array('product_id'=>$id,'parent_id'=>key($this->request->data['Action']['Add']['SeasonException']));                        
                        
                         if( $this->Flight->Season->save($row)){
                             $this->Session->setFlash(__('The season have been added'));
                             $this->redirect('edit/'.$id.'#tabs-5'); 
                        }else{
                             $this->Session->setFlash(__('The season could not be added'));
                        } 
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Add']['Seasons']) ){
                        $c=isset($this->request->data['Action']['Add']['Seasons_count'])?$this->request->data['Action']['Add']['Seasons_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[$i]=array('product_id'=>$id);                           
                        }
                        if($this->Flight->Season->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The seasons has been added'));
                             $this->redirect('edit/'.$id.'#tabs-7'); 
                        }else{
                             $this->Session->setFlash(__('The seasons could not be added'),'default', array(), 'error');
                        }                            
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                         
                      }elseif(isset($this->request->data['Action']['Add']['AditionalService'])){
                        $aditionalService['AditionalService']=$this->request->data['AditionalService'];
                        //$locationRentacar['RentacarPrice']=$this->request->data['RentacarPrice'];
                        if($this->Flight->AditionalService->saveAssociated($aditionalService)){
                             $this->Session->setFlash(__('The AditionalService has been added'));
                              $this->redirect('edit/'.$id.'#tabs-2');  
                        }else{
                             $this->Session->setFlash(__('The AditionalService could not be added'),'default', array(), 'error');
                        } 
                         
                    }elseif(isset($this->request->data['Action']['Add']['TipsAndSafety']) ){
                        $c=isset($this->request->data['Action']['Add']['TipsAndSafety_count'])?$this->request->data['Action']['Add']['TipsAndSafety_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[]=array('product_id'=>$id);
                            /*for($languageI=0;$languageI< Configure::read('Hotels.TotalImages');$languageI++){
                                $rows[]=array('owner_id'=>$id,'language'=>$languageI,'type'=>TiposGlobal::I18N_TYPE_RENTACAR_TIPSANDSAFETY);
                            }*/                       
                        }
                        if($this->Flight->TipsAndSafety->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The Tips And Safety has been added'));
                             $this->redirect('edit/'.$id.'#tabs-3'); 
                        }else{
                             $this->Session->setFlash(__('The Tips And Safety could not be added'),'default', array(), 'error');
                        }                            
                         
                    }
            } 
            return false;
        }
        
        
         private function action_save($id=null){
            if(isset($this->request->data['Action']['Save'])){   
                 $errores=array();

                unset($this->request->data['AditionalService']['name']);
                unset($this->request->data['AditionalService']['price_net']);
                unset($this->request->data['AditionalService']['price_rack']);
                unset($this->request->data['AditionalService']['type']);
                unset($this->request->data['AditionalService']['product_id']);
                
                if(isset($this->request->data['Action']['Save']['Flight'])){
                    
                    if ($this->Flight->saveAssociated($this->request->data,array('deep'=>true))){   
                       
                        $this->Session->setFlash(__('The Flight data have been saved'));                       
                        //$this->redirect('edit/'.$id.'#tabs-1');
                        // $this->request->data['postSave']=$this->Flight;
                    }else{
                        $this->Session->setFlash(__('The Flight could not be saved. Please, try again.'), 'default', array(), 'error');
                    }
                       
                }elseif(isset($this->request->data['Action']['Save']['Reviews'])){                                                 
                    if(isset($this->request->data['Review'])){      
                         
                        foreach($this->request->data['Review'] as $h=>$reviewData){  
                            $this->Flight->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                            $this->Flight->Review->saveAssociated($reviewData);  
                            if(!empty($this->Flight->Review->validationErrors))
                                $errores[$h]=$this->Flight->Review->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Flight->Review->validationErrors=$errores;
                            $this->Session->setFlash(__('Review could not be saved. Please, try again.'), 'default', array(), 'error');
                             // $this->redirect(array('edit/'.$id.'#tabs-7'));
                        }
                        else{
                            $this->Session->setFlash(__('The review data have been saved'));
                        }                           
                     }
                       
              }elseif(isset($this->request->data['Action']['Save']['Rates'])){
                 
                    if(isset($this->request->data['Product']['Rate'])){                                                
                        
                        if(!$this->Flight->Product->Rate->saveMany($this->request->data['Product']['Rate'])){
                            $this->Session->setFlash(__('Rates could not be saved. Please, try again.'));
                        }
                        else{
                            $this->Session->setFlash(__('Rates data have been saved'));
                        }  
                    }
                        
             }elseif(isset($this->request->data['Action']['Save']['Seasons'])){
                    $this->Flight->Review->unbindModel(array('belongsTo'=>array('Product')));

                    if(isset($this->request->data['Season'])){
                        $this->Flight->Season->setDataArray($this->request->data['Season']);
                         $this->Flight->Season->SeasonException->setDataArray($this->request->data['Season']);
                        foreach($this->request->data['Season'] as $h=>$reviewData){ 
                            $this->Flight->Season->saveAssociated($reviewData);
                            if(!empty($this->Flight->Season->validationErrors))
                                $errores[$h]=$this->Flight->Season->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Flight->Season->validationErrors=$errores;
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
