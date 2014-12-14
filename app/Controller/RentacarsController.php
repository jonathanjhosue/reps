<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * rentacars Controller
 *
 * @property Rentacar $Rentacar
 */
class RentacarsController extends AppController {

 public $helpers = array('Html', 'Form');

 
    public $paginate = array(
        'limit' => 12          
    );
    
     public function index($idlocation=null) {

		
		$this->helpers[] = 'Js';
                $language=$this->getLanguageOnly();
                        
                $this->Rentacar->recursive = 1;
                $this->Rentacar->unbindModel(array(
				'hasMany' => array('Season','Review','Itinerary'),
                                'belongsTo'=>array('MeetingPoint'),
                                'hasAndBelongsToMany'=> array('Activity','Hotel','Extension',  'ProductRelation','IncludeNote')                                
				)
			);
                $conditions=array();
                if($idlocation>0){
                    $conditions['Product.location_id']=$idlocation;
                }    
                
                if (isset($this->passedArgs['category'])) {                  
                        
                        $input = $this->passedArgs['category'];
                       
                        $input = Sanitize::escape($input);

                        $conditions['RentacarCategory.id']=$input;
                       
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
                $conditions["concat(Product.product_name) LIKE "]= "%{$this->Session->read('Search.value')}%";
                $this->Rentacar->setLocale($language, $this->getCountryOnly());
                //$this->Hotel->Product->setLocale($language);
                
		$this->set('rentacars', $this->paginate($conditions));
                $this->set('idlocation', $idlocation);
	}
 
 
 
 
 
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
            $paginate = array('limit' => 20) ;
              $this->layout="admin";
		$this->Rentacar->recursive = 1;
		$this->Rentacar->setLocale($this->getLanguageOnly(), $this->getCountryOnly());
		$this->set('list', $this->paginate());
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
			$this->Rentacar->create();
                                             
			if ($this->Rentacar->saveAssociated($this->request->data)) {
                           
				$this->Session->setFlash(__('The Rentacar has been saved'));
				$this->redirect(array('action' => 'edit',$this->Rentacar->id));
			} else {
				$this->Session->setFlash(__('The Rentacar could not be saved. Please, try again.'));
			}
		}
		 $locations = $this->Rentacar->Product->Location->findByCountry($this->getCountryOnly());
	$this->set(compact('locations'));
                
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
                
            
            
            
		$this->Rentacar->id = $id;
		if (!$this->Rentacar->exists()) {
			throw new NotFoundException(__('Invalid Rentacar'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			   $this->action_delete($id)|| $this->action_save()|| $this->action_add($id); 
		} else {
			                        
                        $this->Rentacar->unbindModel(array('hasMany' => array('Vehicle')));
                        $this->Rentacar->Product->unbindModel(array('belongsTo'=>array('Location')));
                        $this->Rentacar->Product->unbindModel(array('hasMany' => array('I18nKey','Vehicle','TravellerReview','StaffReview'))); 
                       /* $this->Rentacar->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                        $this->Rentacar->unbindModel(array('hasAndBelongsToMany'=>array('ProductRelation'))); */
                        $this->Rentacar->LocationRentacar->unbindModel(array('belongsTo' => array('Rentacar')));
                        // $this->Rentacar->AditionalService->unbindModel(array('belongsTo' => array('Rentacar')));
                         $this->Rentacar->TipsAndSafety->unbindModel(array('belongsTo' => array('Rentacar')));
                        $this->Rentacar->Season->unbindModel(array('hasMany' => array('Rate'),'belongsTo'=>array('Product','Parent'))); 
                       
                    
                        $this->Rentacar->recursive = 2; 
                        $this->request->data = $this->Rentacar->read(null, $id);
                        
                        
		}
                  
		$products = $this->Rentacar->Product->find('list');
                $locations = $this->Rentacar->Product->Location->findByCountry($this->getCountryOnly());
                
                /*$options['joins'] = array(
                    array('table' => 'locations',
                        'alias' => 'Location',
                        'type' => 'inner',
                        'conditions' => array("1=1")                        
                    ),
                    array('table' => 'regions',
                        'alias' => 'Region',
                        'type' => 'inner',
                        'conditions' => array("Location.region_id=Region.id")                        
                    )
                );
                //$options['fields']=array('Region.country,Region.region_name','Location.location_name,Product.product_name');
                $options['conditions'] =array('Location.id=Product.location_id');
                $options['order'] =array('country,region_name, location_name');
                */
               
                 
               
                 $this->set(compact('locations'));
                 
                
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
		$this->Rentacar->id = $id;
		if (!$this->Rentacar->exists()) {
			throw new NotFoundException(__('Invalid Rentacar'));
		}
		if ($this->Rentacar->delete()) {
                        $this->Rentacar->Product->delete($id);
			$this->Session->setFlash(__('Rentacar with id: '.$id.' has been deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rentacar was not deleted'));
		$this->redirect(array('action' => 'index'));               
       
	}
        
        
          private function action_delete($id=null){
            if(isset($this->request->data['Action']['Delete'])){               
                 
                   if(isset($this->request->data['Action']['Delete']['LocationRentacar'])){
                        
                        if($this->Rentacar->LocationRentacar->delete(key($this->request->data['Action']['Delete']['LocationRentacar']))){
                            $this->Session->setFlash(__('The LocationRentacar data have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The LocationRentacar could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                          $this->redirect('edit/'.$id.'#tabs-2'); 
                                            
                    }elseif(isset($this->request->data['Action']['Delete']['Season'])){                        
                        if($this->Rentacar->Season->delete(key($this->request->data['Action']['Delete']['Season']))){
                            $this->Session->setFlash(__('The Season have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Season could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-5'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Image'])){                        
                        if($this->Rentacar->Image->delete(key($this->request->data['Action']['Delete']['Image']))){
                             $this->Session->setFlash(__('The Image have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Image could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                        $this->redirect('edit/'.$id.'#tabs-2'); 
                       
                    }elseif(isset($this->request->data['Action']['Delete']['TipsAndSafety'])){                        
                        if($this->Rentacar->TipsAndSafety->delete(key($this->request->data['Action']['Delete']['TipsAndSafety']))){
                            
                             $this->Session->setFlash(__('The TipsAndSafety have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The TipsAndSafety could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                        $this->redirect('edit/'.$id.'#tabs-4'); 
                    }
                    
            }  
            return false;
        }
        
        private function action_add($id=null){
            if(isset($this->request->data['Action']['Add'])){               
                 
                  if(isset($this->request->data['Action']['Add']['SeasonException']) ){                         
                        $row=array('product_id'=>$id,'parent_id'=>key($this->request->data['Action']['Add']['SeasonException']));                        
                        
                         if( $this->Rentacar->Season->save($row)){
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
                        if($this->Rentacar->Season->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The seasons has been added'));
                             $this->redirect('edit/'.$id.'#tabs-7'); 
                        }else{
                             $this->Session->setFlash(__('The seasons could not be added'),'default', array(), 'error');
                        }                            
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Add']['LocationRentacar'])){
                        $locationRentacar['LocationRentacar']=$this->request->data['LocationRentacar'];
                        //$locationRentacar['RentacarPrice']=$this->request->data['RentacarPrice'];
                        if($this->Rentacar->LocationRentacar->saveAssociated($locationRentacar)){
                             $this->Session->setFlash(__('The Location Rentacar has been added'));
                              $this->redirect('edit/'.$id.'#tabs-1');  
                        }else{
                             $this->Session->setFlash(__('The Location could not be added'),'default', array(), 'error');
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
                        if($this->Rentacar->TipsAndSafety->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The Tips And Safety has been added'));
                             $this->redirect('edit/'.$id.'#tabs-4'); 
                        }else{
                             $this->Session->setFlash(__('The Tips And Safety could not be added'),'default', array(), 'error');
                        }                            
                         
                    }elseif(isset($this->request->data['Action']['Add']['AditionalService'])){
                        $aditionalService['AditionalService']=$this->request->data['AditionalService'];
                        //$locationRentacar['RentacarPrice']=$this->request->data['RentacarPrice'];
                        if($this->Rentacar->AditionalService->saveAssociated($aditionalService)){
                             $this->Session->setFlash(__('The AditionalService has been added'));
                              $this->redirect('edit/'.$id.'#tabs-5');  
                        }else{
                             $this->Session->setFlash(__('The AditionalService could not be added'),'default', array(), 'error');
                        } 
                         
                    }                     
            } 
            return false;
        }

        private function action_save($id=null){
            if(isset($this->request->data['Action']['Save'])){   
                $errores=array();
                unset($this->request->data['LocationRentacar']['name']);
                unset($this->request->data['LocationRentacar']['rentacar_id']);
                unset($this->request->data['Rentacar']['LocationRentacar']);

                unset($this->request->data['AditionalService']['name']);
                unset($this->request->data['AditionalService']['price_daily_net']);
                unset($this->request->data['AditionalService']['price_daily_rack']);
                unset($this->request->data['AditionalService']['price_weekly_net']);
                unset($this->request->data['AditionalService']['price_weekly_rack']);
                unset($this->request->data['AditionalService']['type']);
                unset($this->request->data['AditionalService']['product_id']);
                
                
                
                if(isset($this->request->data['Action']['Save']['Rentacar'])){
                    
                    //unset($this->request->data['Rentacar']['LocationRentacar']);
                    //return false;
                    if ($this->Rentacar->saveAssociated($this->request->data,array('deep'=>true))){   
                       
                        $this->Session->setFlash(__('The Rentacar data have been saved'));                       
                        //$this->redirect('edit/'.$id.'#tabs-1');
                        // $this->request->data['postSave']=$this->Rentacar;
                    }else{
                        $this->Session->setFlash(__('The Rentacar could not be saved. Please, try again.'), 'default', array(), 'error');
                    }
                       
                                       
             }elseif(isset($this->request->data['Action']['Save']['Seasons'])){
                    //$this->Rentacar->Review->unbindModel(array('belongsTo'=>array('Product')));

                    if(isset($this->request->data['Season'])){
                        $this->Rentacar->Season->setDataArray($this->request->data['Season']);
                         $this->Rentacar->Season->SeasonException->setDataArray($this->request->data['Season']);
                        foreach($this->request->data['Season'] as $h=>$reviewData){ 
                            $this->Rentacar->Season->saveAssociated($reviewData);
                            if(!empty($this->Rentacar->Season->validationErrors))
                                $errores[$h]=$this->Rentacar->Season->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Rentacar->Season->validationErrors=$errores;
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
