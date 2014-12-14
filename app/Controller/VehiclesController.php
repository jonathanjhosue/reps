<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * vehicles Controller
 *
 * @property Vehicle $Vehicle
 */
class VehiclesController extends AppController {

 public $helpers = array('Html', 'Form');

 
    public $paginate = array(
        'limit' => 30          
    );
    
     public function index() {

		$this->helpers[] = 'Js';
                $language=$this->getLanguageOnly();
                        
                $this->Vehicle->recursive = 1;
                /*$this->Vehicle->unbindModel(array(
				'belongsTo'=>array('Product','VehicleCategory','Rentacar')
				)
			);*/
                $conditions=array();
                                
                if (isset($this->passedArgs['category'])) {                  
                        $input = $this->passedArgs['category'];
                        $input = Sanitize::escape($input);
                        $conditions['VehicleCategory.id']=$input;
                       
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
                $conditions["concat(Product.product_name,VehicleCategory.name) LIKE "]= "%{$this->Session->read('Search.value')}%";
                
                //$parametros=array();
                //$parametros['conditions']=$parametros;
                
                 $this->paginate['order']=array('VehicleCategory.id'=>'asc');
                 
               // $this->Vehicle->setLocale($language);
		$this->set('vehicles', $this->paginate($conditions));
                
                //$imagesRentacar=>$this->Vehicle->Rentacar->Image->find('all',array('conditions'))
                
                $this->set('images', $this->Vehicle->Rentacar->Image->getRandomImages(5,  TiposGlobal::PRODUCT_TYPE_RENTACAR));
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
		
		
                 $this->Vehicle->id = $id;
                $this->Vehicle->recursive = 0;  
                /*el verificar si existe se hace antes de los unbind ya que si no se borrarían*/
                if (!$this->Vehicle->exists()) {
			throw new NotFoundException(__('Invalid Vehicle'));
		}          
                
                $this->Vehicle->Behaviors->attach('Containable');
                //$this->Vehicle->bindModel(array('hasMany'=>array('Rate'=>array('foreignKey'=>'product_id'))));
                $contain=array('Product'=>array('Location'),
                               'VehicleCategory','Image',                               
                               //'Itinerary'=>array('I18nKey'),
                               //'Rate'=>array('Season'), 
                               'Rentacar'=>array('Product','I18nKey','TipsAndSafety'=>('I18nKey'),'AditionalService'),
                               //'Activity'=>array('Product'=>array('I18nKey','Location'),'Image'),
                               //'Hotel'=>array('Product'=>array('I18nKey','Location'),'Image'),
                               //'Extension'=>array('Product'=>array('I18nKey','Location'),'Image')
                              );
                $this->Vehicle->contain($contain);
                

                $this->Vehicle->Product->setLocale($language, $this->getCountryOnly());
                //$this->Vehicle->setLocale($language);
                //$this->Vehicle->Itinerary->setLocale($language);
                $this->Vehicle->Rentacar->setLocale($language);
                $this->Vehicle->Rentacar->TipsAndSafety->setLocale($language);
              
		$this->request->data = $this->Vehicle->find('first',array('conditions'=>array('Vehicle.product_id'=>$id)));

		$this->set('vehicle', $this->request->data);  
                if(isset($this->request->data['Rentacar']['product_id'])){
                    $options['conditions']=array('rentacar_id'=>$this->request->data['Rentacar']['product_id']);
                    $locationsRentacar=$this->Vehicle->Rentacar->LocationRentacar->find('list',$options);
                    $this->set('locationsRentacar', $locationsRentacar);   
                    
                }
                
                
		
	}
 
 /**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($id=null) {
            $paginate = array('limit' => 20) ;
            $this->layout="admin";
            //$this->Vehicle->recursive = 2;
            
            $this->Vehicle->Behaviors->attach('Containable');
            //$this->Vehicle->bindModel(array('hasMany'=>array('Rate'=>array('foreignKey'=>'product_id'))));
            $contain=array('VehicleCategory',
                            //'Itinerary'=>array('I18nKey'),
                            //'Rate'=>array('Season'), 
                            'Rentacar'=>array('Product')
                            //'Activity'=>array('Product'=>array('I18nKey','Location'),'Image'),
                            //'Hotel'=>array('Product'=>array('I18nKey','Location'),'Image'),
                            //'Extension'=>array('Product'=>array('I18nKey','Location'),'Image')
                            );
            $this->Vehicle->contain($contain);
 //$this->Vehicle->setLocale($this->getLanguageOnly(), $this->getCountryOnly());
            $this->set('vehicles', $this->paginate(array('rentacar_id'=>$id)));
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
             $this->layout="admin";
		$this->Vehicle->id = $id;
		if (!$this->Vehicle->exists()) {
			throw new NotFoundException(__('Invalid Vehicle'));
		}
		$this->set('Vehicle', $this->Vehicle->read(null, $id));
	}
        
        

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            $this->layout="admin";
              	if ($this->request->is('post')) {
			$this->Vehicle->create();
                                                
			if ($this->Vehicle->saveAssociated($this->request->data)) {
                           
				$this->Session->setFlash(__('The Vehicle has been saved'));
				$this->redirect(array('action' => 'edit',$this->Vehicle->id));
			} else {
				$this->Session->setFlash(__('The Vehicle could not be saved. Please, try again.'));
			}
		}
                
                $categories = $this->Vehicle->VehicleCategory->find('list');
                $this->set(compact('categories'));
                
                //$this->Vehicle->Rentacar->recursive=0; 
                $options['fields']=array('Rentacar.product_id','Product.product_name');
                $options['recursive']=0;
                $rentacars = $this->Vehicle->Rentacar->find('list',$options);
		$this->set(compact('rentacars'));
                //$this->set('dd',$this->request->data);
                
		               
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
                
            
            
            
		$this->Vehicle->id = $id;
		if (!$this->Vehicle->exists()) {
			throw new NotFoundException(__('Invalid Vehicle'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			   $this->action_delete($id)|| $this->action_save()|| $this->action_add($id); 
		} else {
		
			                        
                        
                        $this->Vehicle->Product->unbindModel(array('belongsTo'=>array('Location')));
                        $this->Vehicle->Product->unbindModel(array('hasMany' => array('I18nKey','TravellerReview','StaffReview')));
                        $this->Vehicle->Product->Rate->unbindModel(array('belongsTo' => array('Product','Season')));
                        /*$this->Vehicle->Rentacar->unbindModel(array('hasMany' => array('Images','AditionalService','I18nKey','TipsAndSafety','Vehicle'),
                                                                    'belongsTo'=>array('Product','StaffReview'))); */
                        //$this->Vehicle->VehicleCategory->unbindModel(array('hasMany' => array('Vehicle'))); 
                       // $this->Vehicle->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                        $this->Vehicle->unbindModel(array('hasAndBelongsToMany'=>array('ProductRelation'),'belongsTo'=>array('VehicleCategory','Rentacar'))); 
                        $this->Vehicle->Season->unbindModel(array('belongsTo'=>array('Product','Parent'),'hasMany' => array('Rate'))); 
                       // $this->Vehicle->Season->unbindModel(array('hasMany' => array('Rate'),'belongsTo'=>array('Product','Parent'))); 
                       
                    
                        $this->Vehicle->recursive =2; 
                        $this->request->data = $this->Vehicle->read(null, $id);
                        
                        
		}
                 //$products = $this->Vehicle->Product->find('list');
                
                //$this->request->data['Season']=array_merge($this->request->data['Season'],$this->request->data['Vehicle']['Season']);
                 
                $categories = $this->Vehicle->VehicleCategory->find('list');
                
                $seasonsRentacar = $this->Vehicle->Rentacar->Season->getSeasons($this->request->data['Vehicle']['rentacar_id']);
              
         
                 $options['fields']=array('Rentacar.product_id','Product.product_name');
                $options['recursive']=0;
                $rentacars = $this->Vehicle->Rentacar->find('list',$options);
                
                //Si no tiene temporadas usa las del rentacar y no las del vehiculo
                if(isset($this->request->data['Season']) && count($this->request->data['Season'])==0){
                    
                   $option=array();
                   $option['conditions']=array('Rate.product_id'=>$this->request->data['Vehicle']['rentacar_id'],
                                               'Rate.type_id'=>$this->request->data['Vehicle']['product_id']);
                   $option['recursive']=-1;
                   $rates= $this->Vehicle->Rentacar->Product->Rate->find('all',$option);
                   //$this->request->data['Product']['Rate']=$rates;
                   
                   foreach($rates as $i=>$item){
                       $this->request->data['Product']['Rate'][$i]=$item['Rate'];
                   }
                   //$this->request->data['Product']['Rate']=$rates;
                    
                }
                

		$this->set(compact('rentacars','categories','seasonsRentacar'));
                //$this->set('dd',$this->request->data);
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
		$this->Vehicle->id = $id;
		if (!$this->Vehicle->exists()) {
			throw new NotFoundException(__('Invalid Vehicle'));
		}
		if ($this->Vehicle->delete()) {
                        $this->Vehicle->Product->delete($id);
			$this->Session->setFlash(__('Vehicle with id: '.$id.' has been deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vehicle was not deleted'));
		$this->redirect(array('action' => 'index'));               
       
	}
        
        
          private function action_delete($id=null){
            if(isset($this->request->data['Action']['Delete'])){               
                 
                   if(isset($this->request->data['Action']['Delete']['Review'])){
                        
                        if($this->Vehicle->Review->delete(key($this->request->data['Action']['Delete']['Review']))){
                            $this->Session->setFlash(__('The Review data have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Review could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                          $this->redirect('edit/'.$id.'#tabs-6'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Itinerary'])){ 
                        //$this->request->data['Vehicle']['days']= $this->request->data['Vehicle']['days']-1;
                        if($this->Vehicle->Itinerary->delete(key($this->request->data['Action']['Delete']['Itinerary']))
                           //&&  $this->Vehicle->save($this->request->data)    
                           ){
                            $this->Session->setFlash(__('The Day itinerary have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Day itinerary could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-7');                           
                    }elseif(isset($this->request->data['Action']['Delete']['Season'])){                        
                        if($this->Vehicle->Season->delete(key($this->request->data['Action']['Delete']['Season']))){
                            $this->Session->setFlash(__('The Season have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Season could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Image'])){                        
                        if($this->Vehicle->Image->delete(key($this->request->data['Action']['Delete']['Image']))){
                             $this->Session->setFlash(__('The Image have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Image could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                        $this->redirect('edit/'.$id.'#tabs-2'); 
                       
                    }  
                    
            }  
            return false;
        }
        
        private function action_add($id=null){
            if(isset($this->request->data['Action']['Add'])){               
                 
                  if(isset($this->request->data['Action']['Add']['SeasonException']) ){                         
                        $row=array('product_id'=>$id,'parent_id'=>key($this->request->data['Action']['Add']['SeasonException']));                        
                        
                         if( $this->Vehicle->Season->save($row)){
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
                        if($this->Vehicle->Season->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The seasons has been added'));
                             $this->redirect('edit/'.$id.'#tabs-7'); 
                        }else{
                             $this->Session->setFlash(__('The seasons could not be added'),'default', array(), 'error');
                        }                            
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Add']['Reviews'])){
                        $c=isset($this->request->data['Action']['Add']['Reviews_count'])?$this->request->data['Action']['Add']['Reviews_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[$i]=array('product_id'=>$id,'review_date'=>date("Y-m-d"));

                        }
                         if($this->Vehicle->Review->saveMany($rows) && $c>0){
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
                if(isset($this->request->data['Action']['Save']['Vehicle'])){
                    /*$totalDays=$this->request->data['Vehicle']['days'];
                    $itineraryDays=count($this->request->data['Itinerary']);
                    $faltan=$totalDays-$itineraryDays;
                    if($itineraryDays<$totalDays){//faltan dias                       
                         for($i=$itineraryDays+1;$i<=$totalDays;$i++){                            
                            $this->request->data['Itinerary'][]=array('day_number'=>$i);
                         }   
                    }
                     *    $arrayActivities=isset($this->request->data['Activity']['Activity'])?$this->request->data['Activity']['Activity']:array();
                        $arrayHotels=isset($this->request->data['Hotel']['Hotel'])?$this->request->data['Hotel']['Hotel']:array();
                        $arrayExtensions=isset($this->request->data['Extension']['Extension'])?$this->request->data['Extension']['Extension']:array();
                        $arrayRelationsProducts=  array_merge(array_merge($arrayActivities,$arrayHotels),$arrayExtensions);
                        $this->request->data['ProductRelation']['ProductRelation']=$arrayRelationsProducts;
                      */ 
                    
                    /* $this->Vehicle->unbindModel(array('hasAndBelongsToMany'=>array('Activity','Hotel','Extension')));
                    $this->Vehicle->unbindModel(array('hasMany'=>array('Season','Review')));     
                     */
                    if ($this->Vehicle->saveAssociated($this->request->data,array('deep'=>true))){   
                       
                        $this->Session->setFlash(__('The Vehicle data have been saved'));                       
                        //$this->redirect('edit/'.$id.'#tabs-1');
                        // $this->request->data['postSave']=$this->Vehicle;
                    }else{
                        $this->Session->setFlash(__('The Vehicle could not be saved. Please, try again.'), 'default', array(), 'error');
                    }
                       
                }elseif(isset($this->request->data['Action']['Save']['Reviews'])){                                                 
                    if(isset($this->request->data['Review'])){      
                         
                        foreach($this->request->data['Review'] as $h=>$reviewData){  
                            $this->Vehicle->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                            $this->Vehicle->Review->saveAssociated($reviewData);  
                            if(!empty($this->Vehicle->Review->validationErrors))
                                $errores[$h]=$this->Vehicle->Review->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Vehicle->Review->validationErrors=$errores;
                            $this->Session->setFlash(__('Review could not be saved. Please, try again.'), 'default', array(), 'error');
                             // $this->redirect(array('edit/'.$id.'#tabs-7'));
                        }
                        else{
                            $this->Session->setFlash(__('The review data have been saved'));
                        }                           
                     }
                       
              }elseif(isset($this->request->data['Action']['Save']['Rates'])){
                 
                    if(isset($this->request->data['Product']['Rate'])){                                                
                        
                        if(!$this->Vehicle->Product->Rate->saveMany($this->request->data['Product']['Rate'])){
                            $this->Session->setFlash(__('Rates could not be saved. Please, try again.'));
                        }
                        else{
                            $this->Session->setFlash(__('Rates data have been saved'));
                        }  
                    }
                        
             }elseif(isset($this->request->data['Action']['Save']['Seasons'])){
                    //$this->Vehicle->Review->unbindModel(array('belongsTo'=>array('Product')));

                    if(isset($this->request->data['Season'])){
                        $this->Vehicle->Season->setDataArray($this->request->data['Season']);
                         $this->Vehicle->Season->SeasonException->setDataArray($this->request->data['Season']);
                        foreach($this->request->data['Season'] as $h=>$reviewData){ 
                            $this->Vehicle->Season->saveAssociated($reviewData);
                            if(!empty($this->Vehicle->Season->validationErrors))
                                $errores[$h]=$this->Vehicle->Season->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Vehicle->Season->validationErrors=$errores;
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
