<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * packages Controller
 *
 * @property Package $Package
 */
class PackagesController extends AppController {

 public $helpers = array('Html', 'Form');

 
    public $paginate = array(
        'limit' => 12          
    );
    
     public function index($idlocation=null) {

		
		$this->helpers[] = 'Js';
                $language=$this->getLanguageOnly();
                        
                $this->Package->recursive = 1;
                $this->Package->unbindModel(array(
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

                        $conditions['PackageCategory.id']=$input;
                       
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
                $conditions["concat(Product.product_name,Package.code,PackageCategory.category_name) LIKE "]= "%{$this->Session->read('Search.value')}%";
                $this->Package->setLocale($language, $this->getCountryOnly());
                //$this->Hotel->Product->setLocale($language);
                
		$this->set('packages', $this->paginate($conditions));
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
		
		
                 $this->Package->id = $id;
                $this->Package->recursive = 0;  
                /*el verificar si existe se hace antes de los unbind ya que si no se borrarían*/
                if (!$this->Package->exists()) {
			throw new NotFoundException(__('Invalid Package'));
		}          
                
                $this->Package->Behaviors->attach('Containable');
                $this->Package->bindModel(array('hasMany'=>array('Rate'=>array('foreignKey'=>'product_id'))));
                $contain=array('Product'=>array('I18nKey','Location'),
                               'I18nKey','PackageCategory',  'MeetingPoint','Image',
                               'Itinerary'=>array('I18nKey'),
                               'Rate'=>array('Season'), 
                               'IncludeNote'=>array('I18nKey'),
                               'Activity'=>array('Product'=>array('I18nKey','Location'),'Image'),
                               'Hotel'=>array('Product'=>array('I18nKey','Location'),'Image'),
                               'Extension'=>array('Product'=>array('I18nKey','Location'),'Image')
                              );
                $this->Package->contain($contain);
                

                $this->Package->Product->setLocale($language,$this->getCountryOnly());
                $this->Package->setLocale($language);
                $this->Package->Itinerary->setLocale($language);
                $this->Package->IncludeNote->setLocale($language);
                /*
                //$this->Package->Room->setLocale($language);
                $this->Package->Product->StaffReview->setLocale($language);
                $this->Package->Product->TravellerReview->setLocale($language);
                
                $this->Package->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                $this->Package->Product->Rate->unbindModel(array('belongsTo'=>array('Product')));
                
                $this->Package->Itinerary->unbindModel(array('belongsTo'=>array('Package')));
                 
                $this->Package->unbindModel(array('hasMany' => array('Season','Review')));
                $this->Package->Product->unbindModel(array('hasMany' => array('Review','I18nKey'))); 
                $this->Package->PackageCategory->unbindModel(array('hasMany' => array('Package')));
                $this->Package->Product->StaffReview->unbindModel(array('belongsTo'=>array('Product')));
                $this->Package->Product->TravellerReview->unbindModel(array('belongsTo'=>array('Product')));                
                
                
                $this->Package->recursive = 3;               */
		$this->request->data = $this->Package->find('first',array('conditions'=>array('Package.product_id'=>$id)));
                $exclude=$this->Package->getExcludeNotes();
                $this->request->data['ExcludeNote']=$exclude;
		//--Se env�an las variables hacia el View.
		$this->set('package', $this->request->data);         
		
	}
 
 
 
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
            $paginate = array('limit' => 20) ;
              $this->layout="admin";
		$this->Package->recursive = 1;
		$this->Package->setLocale($this->getLanguageOnly(), $this->getCountryOnly());
		$this->set('packages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
             $this->layout="admin";
		$this->Package->id = $id;
		if (!$this->Package->exists()) {
			throw new NotFoundException(__('Invalid Package'));
		}
		$this->set('Package', $this->Package->read(null, $id));
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
			$this->Package->create();
                        $days=$this->request->data['Package']['days'];
                        for($i=0;$i<$days;$i++){
                            $this->request->data['Itinerary'][]=array('day_number'=>$i+1);
                        }                        
			if ($this->Package->saveAssociated($this->request->data)) {
                           
				$this->Session->setFlash(__('The Package has been saved'));
				$this->redirect(array('action' => 'edit',$this->Package->id));
			} else {
				$this->Session->setFlash(__('The Package could not be saved. Please, try again.'));
			}
		}
		//$products = $this->Package->Product->find('list');
                //$locations = $this->Package->Product->Location->find('list');
                $packageCategories = $this->Package->PackageCategory->find('list');
                 $meetingPoints = $this->Package->MeetingPoint->find('list');
                
                 $this->Package->IncludeNote->recursive=1; 
                 $includeNotes=$this->Package->IncludeNote->find('all');
                 $includeNotes=Set::combine($includeNotes,"{n}.IncludeNote.id","{n}.I18nKey.0.value");
                 $locations = $this->Package->Product->Location->findByCountry($this->getCountryOnly());
		$this->set(compact('packageCategories','includeNotes','meetingPoints','locations'));
                
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
                
            
            
            
		$this->Package->id = $id;
		if (!$this->Package->exists()) {
			throw new NotFoundException(__('Invalid Package'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			   $this->action_delete($id)|| $this->action_save($id)|| $this->action_add($id); 
		} else {
			                        
                        
                        $this->Package->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                        $this->Package->Product->unbindModel(array('hasMany' => array('I18nKey','Packages','TravellerReview','StaffReview'))); 
                        $this->Package->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                        $this->Package->unbindModel(array('hasAndBelongsToMany'=>array('ProductRelation'))); 
                        $this->Package->Season->unbindModel(array('hasMany' => array('Rate'),'belongsTo'=>array('Product','Parent'))); 
                       
                    
                        $this->Package->recursive = 2; 
                        $this->request->data = $this->Package->read(null, $id);
                        
                        
		}
                  
		$products = $this->Package->Product->find('list');
                $locations = $this->Package->Product->Location->findByCountry($this->getCountryOnly());
                
                $options['joins'] = array(
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
                
               
                //$this->Package->Activity->contain(array('Product'=>array('Location'=>array('Region'))));  
                $this->Package->Activity->recursive=0; 
                 $options['fields']=array('Product.id,Region.country,Region.region_name','Location.location_name,Product.product_name','ActivityType.category');
                 $activities = $this->Package->Activity->find('all',$options);
                 //$activities=Set::combine($activities,"{n}.Product.id","{n}.Product.product_name","{n}.ActivityType.category");
                 
                 $this->Package->Hotel->recursive=0;   
                 $options['fields']=array('Product.id,Region.country,Region.region_name','Location.location_name,Product.product_name','HotelCategory.category_name');
                 $hotels = $this->Package->Hotel->find('all',$options);
                 //$hotels = Set::combine($hotels,"{n}.Product.id","{n}.Product.product_name","{n}.HotelCategory.category_name");                 
                 //$this->set(compact('products', 'PackageTypes','locations','hotels','activities'));
                 
                 $this->Package->Extension->recursive=0;   
                 $options=array();
                 $options['fields']=array('Product.id,tour_location,Product.product_name','PackageCategory.category_name');
                 $options['order'] =array('tour_location,category_name');
                 $extensions = $this->Package->Extension->find('all',$options);
                 //$extensions = Set::combine($extensions,"{n}.Product.id","{n}.Product.product_name","{n}.Package.tour_type");
                 
                 $this->Package->IncludeNote->recursive=1; 
                 $includeNotes=$this->Package->IncludeNote->find('all');
                 $includeNotes=Set::combine($includeNotes,"{n}.IncludeNote.id","{n}.I18nKey.0.value");
                  $packageCategories = $this->Package->PackageCategory->find('list');
                    $meetingPoints = $this->Package->MeetingPoint->find('list');
                 $this->set(compact('locations','hotels','activities','extensions',"includeNotes","packageCategories","meetingPoints"));
                 
                
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
		$this->Package->id = $id;
		if (!$this->Package->exists()) {
			throw new NotFoundException(__('Invalid Package'));
		}
		if ($this->Package->delete()) {
                        $this->Package->Product->delete($id);
			$this->Session->setFlash(__('Package with id: '.$id.' has been deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Package was not deleted'));
		$this->redirect(array('action' => 'index'));               
       
	}
        
        
          private function action_delete($id=null){
            if(isset($this->request->data['Action']['Delete'])){               
                 
                   if(isset($this->request->data['Action']['Delete']['Review'])){
                        
                        if($this->Package->Review->delete(key($this->request->data['Action']['Delete']['Review']))){
                            $this->Session->setFlash(__('The Review data have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Review could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                          $this->redirect('edit/'.$id.'#tabs-6'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Itinerary'])){ 
                        //$this->request->data['Package']['days']= $this->request->data['Package']['days']-1;
                        if($this->Package->Itinerary->delete(key($this->request->data['Action']['Delete']['Itinerary']))
                           //&&  $this->Package->save($this->request->data)    
                           ){
                            $this->Session->setFlash(__('The Day itinerary have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Day itinerary could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-7');                           
                    }elseif(isset($this->request->data['Action']['Delete']['Season'])){                        
                        if($this->Package->Season->delete(key($this->request->data['Action']['Delete']['Season']))){
                            $this->Session->setFlash(__('The Season have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Season could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Image'])){                        
                        if($this->Package->Image->delete(key($this->request->data['Action']['Delete']['Image']))){
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
                        
                         if( $this->Package->Season->save($row)){
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
                        if($this->Package->Season->saveMany($rows) && $c>0){
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
                         if($this->Package->Review->saveMany($rows) && $c>0){
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
                if(isset($this->request->data['Action']['Save']['Package'])){
                    $totalDays=$this->request->data['Package']['days'];
                    $itineraryDays=count($this->request->data['Itinerary']);
                    $faltan=$totalDays-$itineraryDays;
                    if($itineraryDays<$totalDays){//faltan dias                       
                         for($i=$itineraryDays+1;$i<=$totalDays;$i++){                            
                            $this->request->data['Itinerary'][]=array('day_number'=>$i);
                         }   
                    }
                   
                        $arrayActivities=isset($this->request->data['Activity']['Activity'])?$this->request->data['Activity']['Activity']:array();
                        $arrayHotels=isset($this->request->data['Hotel']['Hotel'])?$this->request->data['Hotel']['Hotel']:array();
                        $arrayExtensions=isset($this->request->data['Extension']['Extension'])?$this->request->data['Extension']['Extension']:array();
                        $arrayRelationsProducts=  array_merge(array_merge($arrayActivities,$arrayHotels),$arrayExtensions);
                        $this->request->data['ProductRelation']['ProductRelation']=$arrayRelationsProducts;
                       
                    
                     $this->Package->unbindModel(array('hasAndBelongsToMany'=>array('Activity','Hotel','Extension')));
                    $this->Package->unbindModel(array('hasMany'=>array('Season','Review')));     

                    if ($this->Package->saveAssociated($this->request->data,array('deep'=>true))){   
                       
                        $this->Session->setFlash(__('The Package data have been saved'));  
                        
                        if($faltan<0){
                         $this->Package->query("CALL update_daysPackages($id);");
                         $itinerary=$this->request->data['Itinerary'];
                         //remove from sending data
                         for($xi=0;$xi<$itineraryDays;$xi++ )
                             if($itinerary[$xi]['day_number']>$totalDays){
                                 unset($this->request->data['Itinerary'][$xi]);
                             }
                        }                         
                       
                        //$this->redirect('edit/'.$id.'#tabs-1');
                        // $this->request->data['postSave']=$this->Package;
                    }else{
                        $this->Session->setFlash(__('The Package could not be saved. Please, try again.'), 'default', array(), 'error');
                    }
                       
                }elseif(isset($this->request->data['Action']['Save']['Reviews'])){                                                 
                    if(isset($this->request->data['Review'])){      
                         
                        foreach($this->request->data['Review'] as $h=>$reviewData){  
                            $this->Package->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                            $this->Package->Review->saveAssociated($reviewData);  
                            if(!empty($this->Package->Review->validationErrors))
                                $errores[$h]=$this->Package->Review->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Package->Review->validationErrors=$errores;
                            $this->Session->setFlash(__('Review could not be saved. Please, try again.'), 'default', array(), 'error');
                             // $this->redirect(array('edit/'.$id.'#tabs-7'));
                        }
                        else{
                            $this->Session->setFlash(__('The review data have been saved'));
                        }                           
                     }
                       
              }elseif(isset($this->request->data['Action']['Save']['Rates'])){
                 
                    if(isset($this->request->data['Product']['Rate'])){                                                
                        
                        if(!$this->Package->Product->Rate->saveMany($this->request->data['Product']['Rate'])){
                            $this->Session->setFlash(__('Rates could not be saved. Please, try again.'));
                        }
                        else{
                            $this->Session->setFlash(__('Rates data have been saved'));
                        }  
                    }
                        
             }elseif(isset($this->request->data['Action']['Save']['Seasons'])){
                    $this->Package->Review->unbindModel(array('belongsTo'=>array('Product')));

                    if(isset($this->request->data['Season'])){
                        $this->Package->Season->setDataArray($this->request->data['Season']);
                         $this->Package->Season->SeasonException->setDataArray($this->request->data['Season']);
                        foreach($this->request->data['Season'] as $h=>$reviewData){ 
                            $this->Package->Season->saveAssociated($reviewData);
                            if(!empty($this->Package->Season->validationErrors))
                                $errores[$h]=$this->Package->Season->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Package->Season->validationErrors=$errores;
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
