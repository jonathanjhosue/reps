<?php
App::uses('Sanitize', 'Utility');
App::uses('AppController', 'Controller');
class HotelsController extends AppController
{
    public $name = 'Hotels';
    public $helpers = array('Html', 'Form');

   public $paginate = array(
        'limit' => 12          
    );
   
        

    public function index($idlocation=null) {

		
		$this->helpers[] = 'Js';
                $language=$this->getLanguageOnly();
		
		
		//Se consultan los Regions Y Locations.
		
		//$this->set('hotels', $this->request->data);
                
                $this->Hotel->recursive = 1;
                $this->Hotel->unbindModel(array(
				'hasMany' => array('Room','Season','Review')				
				)				
				);
				/*$this->Hotel->bindModel(array('belongsTo'=>array('Location'=>array(
																				  'className'=>'Location',
																				  'foreignKey'=>false,
																				  
				                                                                  'conditions'=>array('Product.location_id=Location.id','Product.location_id=Location.id')
																				  )
																)
											 )
									   ); */
                $conditions=array();
                if($idlocation>0){
                    $conditions['Product.location_id']=$idlocation;
                }    
                
                if (isset($this->passedArgs['category'])) {                  
                        
                        $input = $this->passedArgs['category'];
                       
                        $input = Sanitize::escape($input);

                        $conditions['HotelCategory.id']=$input;
                       
                }
                $searchValue=$this->Session->read("Search.{$this->name}.value");
                if(!empty($this->data)) {
                    Sanitize::clean($this->data);                    

                    if(isset($this->data['Search']['value'])) {
                        $searchValue=$this->data['Search']['value'];
                          
                    }
                   
                    $this->Session->write("Search.{$this->name}.value", $searchValue);
                    
                }
                $conditions["concat(Product.product_name,HotelCategory.category_name) LIKE "]= "%{$searchValue}%";
                $this->Hotel->setLocale($language, $this->getCountryOnly());
                //$this->Hotel->Product->setLocale($language);
                
		$this->set('hotels', $this->paginate($conditions));
                $this->set('idlocation', $idlocation);
	}
	
	/*
	 * Description: Consulta los hoteles que se encuentran en un Location particular.
	 * $id: PK del Location del cual se desean consultar los hoteles.
	*/
	public function index_by_location($id)
	{
		$this->helpers[] = 'Js';
		$this->layout = 'guest';
		
		//Consulta todos las instancias de Hotel seg�n el id de Location. Se aisla de Room xq no se necesita mostrar ese modelo.
		$this->Hotel->unbindModel(array(
				'hasMany' => array('Room','Season')
				)
			);
                
                //$this->Hotel->id
                
		$this->request->data = $this->Hotel->find('all', array(
			'fields'=> array('Hotel.id', 'Hotel.product_id', 'Hotel.hotel_category_id', 'Product.product_name', 'Product.id', 'Product.location_id', 'HotelCategory.id', 'HotelCategory.category_name'),
			'conditions' => array('Product.location_id' => $id)));
			
		//Consulta la primer imagen de cada hotel. Primero se aisla el modelo Image antes de consultar.
                /*$hola;
                
		for($i=0; $i < count($this->request->data); $i++){
			//$this->Hotel->Image->unbindModel(array('belongsTo'=>array('Product')));
			//$this->request->data[$i]['Hotel']['Image'] = $hola[$i]= $this->Hotel->Image->find('first', array('conditions' => array( 'Image.owner_id'=>$this->request->data[$i]['Product']['id'] )));
		                       
                }*/
		//$this->set('hola', $hola);	
		//Se consultan los Regions Y Locations.
		//$this->set('regions', $this->Hotel->Product->Location->Region->find('all'));  
		
		//Se asigna la variable con los datos de los hoteles.
		$this->set('hotels', $this->request->data);
	}
	
	/*
	 * Description: Permite recuperar toda la informaci�n para la vista de usuario visitante.
	 * $id: identificador del hotel
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
		
		//consulta del hotel (Hotel, Product, HotelCategory, Rooms)
                //$this->Hotel->unbindModel(array('hasMany' => array('Season','Image','Room'),'belongsTo'=>array('Product','HotelCategory'))); 
		//$this->Hotel->Room->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel'))); 
                 $this->Hotel->id = $id;
                $this->Hotel->recursive = 0;  
                /*el verificar si existe se hace antes de los unbind ya que si no se borrarían*/
                if (!$this->Hotel->exists()) {
			throw new NotFoundException(__('Invalid hotel'));
		}          
                
                $this->Hotel->Product->setLocale($language,$this->getCountryOnly());
                $this->Hotel->setLocale($language);
                $this->Hotel->Room->setLocale($language);                
                $this->Hotel->Product->StaffReview->setLocale($language);
                $this->Hotel->Product->TravellerReview->setLocale($language);
                 $this->Hotel->Activity->setLocale($language);
                
                $this->Hotel->HotelCategory->unbindModel(array('hasMany'=>array('Hotel')));
                $this->Hotel->Product->Rate->unbindModel(array('belongsTo'=>array('Product')));
                $this->Hotel->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                $this->Hotel->unbindModel(array('hasMany' => array('Season','Review')));
                $this->Hotel->unbindModel(array('hasAndBelongsToMany' => array('Activity')));
                $this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'hasMany' => array('Activities','I18nKey','Rate'))); 
                //$this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'belongsTo'=>array('Location')));
                $this->Hotel->Product->StaffReview->unbindModel(array('belongsTo'=>array('Product')));
                $this->Hotel->Product->TravellerReview->unbindModel(array('belongsTo'=>array('Product')));
                $this->Hotel->Season->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel'))); 
                $this->Hotel->Room->unbindModel(array('belongsTo'=>array('Hotel'))); 
                $this->Hotel->Room->bindModel(array('hasMany'=>array('RoomRate'=>array('className'=>'Rate','foreignKey'=>'type_id','conditions'=>array('product_id'=>$id))))); 
                $this->Hotel->Room->RoomRate->unbindModel(array('belongsTo'=>array('Room','Product'))); 
                //$this->Hotel->Activity->unbindModel(array('hasMany' => array('Review','Season'),'belongsTo'=>array('Product'))); 
                //$this->Hotel->Activity->Product->unbindModel(array('hasMany' => array('TravellerReview'))); 
                          
                $this->Hotel->recursive = 3;               
		$this->request->data = $this->Hotel->find('first',array('conditions'=>array('Hotel.product_id'=>$id)));
               
                
                $this->Hotel->unbindModel(array('hasMany' => array('I18nKey','Room','Image','Season','Review'),
                                                'belongsTo' => array('Product','HotelCategory')
                                                ));
                $this->Hotel->Activity->unbindModel(array('hasMany' => array('Review','Season','I18nKey'))); 
                $this->Hotel->Activity->Product->unbindModel(array('hasMany' => array('Rate','TravellerReview','StaffReview'))); 
                   
                 $this->Hotel->recursive = 3;  
                $activities = $this->Hotel->find('first',array('conditions'=>array('Hotel.product_id'=>$id)));
                $this->request->data['Activity']=$activities['Activity'];
               //$this->set('activities', $activities);

                $totalRooms = 0;

                foreach ($this->request->data['Room'] as $room){
                    $totalRooms+=$room['count'];   
                    //$i18n_array=array_merge($i18n_array,Set::combine($room['I18nKey']  , '{n}.key','{n}'));
                }                
                $this->request->data['Hotel']['total_rooms']=$totalRooms;
                
		//--Se env�an las variables hacia el View.
		$this->set('hotel', $this->request->data);
                
		//Se consultan los Regions Y Locations.
		//$this->set('regions', $this->Hotel->Product->Location->Region->find('all')); 
		/*$this->set('jsGalleryDec', $jsGalleryDec);	
		$this->set('jsGalleryFunc', $jsGalleryFunc);*/
	}
	
	
	/*============BEGINS ADMIN METHODS===================*/

	function admin_index()
	{
             $paginate = array('limit' => 20) ;
            $this->layout = 'admin';
		$this->Hotel->recursive = 1;
                $this->paginate=array('limit'=>25);
		 $this->Hotel->setLocale($this->getLanguageOnly(), $this->getCountryOnly());
		$this->set('hotels', $this->paginate());
	}
	
	/*
	 * Description: Consulta los hoteles que se encuentran en un Location particular con los datos necesarios para la administraci�n.
	 * $id: PK del Location del cual se desean consultar los hoteles.
	*/
	function admin_index_by_location($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->helpers[] = 'Javascript';
			$this->layout = 'guest';
			
			//Consulta todos las instancias de Hotel seg�n el id de Location. Se aisla de Room xq no se necesita mostrar ese modelo.
			$this->Hotel->unbindModel(array('hasMany' => array('Room')));
			$this->request->data = $this->Hotel->find('all', array(
				'fields'=> array('Hotel.id', 'Hotel.product_id', 'Hotel.hotel_category_id', 'Product.product_name', 'Product.id', 'Product.location_id', 'HotelCategory.id', 'HotelCategory.category_name'),
				'conditions' => array('Product.location_id' => $id)));
			
			//Se consultan los Regions Y Locations para el men�.
			$this->set('regions', $this->Hotel->Product->Location->Region->findAll()); 
			
			//El ID de regi�n lo utiliza el View para extraer el nombre de la regi�n a la que pertenecen los Hotels consultados.
			$this->set('actual_location', $id);
			
			//Se asigna la variable con los datos de los hoteles.
			$this->set('hotels', $this->request->data);
		}
		else { $this->redirect('/Hotels'); }
	}
	
	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Hotel->id = $id;		
			$this->request->data = $this->Hotel->read();		
			$this->set('hotel', $this->request->data);
			
			$this->Session->write('hotelId', $id);
			$this->Session->write('productId', $this->request->data['Hotel']['product_id']);
			$this->Session->write('productAsoId', $id);
			$this->Session->write('productName', $this->request->data['Hotel']['hotel_name']);
			$this->Session->write('controller', $this->params['controller']);
			
			$this->Hotel->Product->id = $this->request->data['Hotel']['product_id'];
			$this->Hotel->Product->unbindModel(array(
					'hasOne' => array('Hotel')
					)
				);	
			$this->set('product', $this->Hotel->Product->read());
	
			$this->Hotel->bindModel( array(
					'hasOne' => array(
							'Language' => array( 'className' => 'Language')
							)
					)
				);
			$this->set('languages', $this->Hotel->Language->find('list'));
		}
		else { $this->redirect('/Hotels'); }
	}
	
	function admin_add()    
 	{ 	
            $this->layout = 'admin';
            $this->helpers[] = 'I18nKeys';
            $this->helpers[] = 'RipsWeb';
            	if ($this->request->is('post')) {
			$this->Hotel->create();
                        //$this->set('enviado',$this->request->data);
                    
                            //$this->set('');
                        //$imagenes=  array_splice($this->request->data['Image'], 0);
                        
			if ($this->Hotel->saveAssociated($this->request->data)) {
                           /* $hotelid=$this->Hotel->id;
                              //  foreach($imagenes as $id=>$imagen){                   
                                    
                                    //$this->request->data['Image'][$id]['image_name']=$imagen['image_name']['name'];
                                    //$this->Hotel->Image->owner_id=$hotelid;
                                    $imagen['owner_id']=$hotelid;
                                    $this->Hotel->Image->save($imagen);
                                                                   
                                }*/
				$this->Session->setFlash(__('The hotel has been saved'));
				$this->redirect(array('action' => 'edit',$this->Hotel->id));
			} else {
				$this->Session->setFlash(__('The hotel could not be saved. Please, try again.'));
			}
		}
		$products = $this->Hotel->Product->find('list');
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
                $locations = $this->Hotel->Product->Location->findByCountry($this->getCountryOnly());
            
		$this->set(compact('products', 'hotelCategories','locations'));
                
                  
		/*$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{ 
			if (!empty($this->request->data))    
			{   
				if($this->Hotel->saveAll($this->request->data))    
				{
					$this->Session->setFlash('Hotel Saved!!');
					$this->redirect(array('action'=>'view', 'id'=>$this->Hotel->id));
				}    
			}
			else{
				$this->set('locations', $this->Hotel->Product->Location->find('list')); 
				$this->set('hotelCategories', $this->Hotel->HotelCategory->find('list'));
			}
		}else { $this->redirect('/Hotels'); }*/
	}

	/* 
	 * Description: Delete del producto al cual pertenece el hotel. Por regla de integridad en BD se elimina el hotel asociado.
	 * $id: product_id del hotel.
	*/
	function admin_delete($id) 
	{
		//$this->layout = 'admin';                
                
                if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
                
		$this->Hotel->id = $id;
		if (!$this->Hotel->exists()) {
			throw new NotFoundException(__('Invalid hotel'));
		}
		/*if ($this->Hotel->Relation->deleteAll(array('product_id1'=>$id),false)){
                    $this->Hotel->unbindModel(array('hasAndBelongsToMany'=>'Activity'));*/
                    if ($this->Hotel->delete()){
                        $this->Hotel->Product->delete($id);
			$this->Session->setFlash(__('The Hotel with id: '.$id.' has been deleted.'));
			$this->redirect(array('action' => 'index'));
                 /*   }else{
                        $this->Session->setFlash(__('Hotel was not deleted completely')); 
                    }
                       
		*/}
		$this->Session->setFlash(__('Hotel was not deleted'));
		$this->redirect(array('action' => 'index'));
 	}

	function admin_edit($id = null, $idAction=null)    
	{
		$this->layout = 'admin';
               $this->helpers[] = 'I18nKeys';
                $this->helpers[] = 'RipsWeb';
                
                $this->Hotel->id = $id;
                $displayTab='';
		if (!$this->Hotel->exists()) {
			throw new NotFoundException(__('Invalid hotel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {                    
                    
                    $this->action_delete($id)|| $this->action_save()|| $this->action_add($id); 
                    
                    
		} else{      
                     $this->Hotel->HotelCategory->unbindModel(array('hasMany'=>array('Hotel')));               
                    $this->Hotel->Product->Location->unbindModel(array('hasMany'=>array('Product')));
                        $this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'hasMany' => array('I18nKey','Activities','TravellerReview','StaffReview'))); 
                        //$this->Hotel->Product->unbindModel(array('hasMany' => array('Hotel'),'belongsTo'=>array('Location')));
                          $this->Hotel->Product->Rate->unbindModel(array('belongsTo'=>array('Product','Season')));
                        $this->Hotel->Review->unbindModel(array('belongsTo'=>array('Product')));                        
                        $this->Hotel->Season->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel','Parent'))); 
                        $this->Hotel->Room->unbindModel(array('belongsTo'=>array('Hotel'))); 
                        //$this->Hotel->Room->RoomRate->unbindModel(array('belongsTo'=>array('Room','Season'))); 
                        $this->Hotel->Season->SeasonException->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Parent','Hotel'))); 
                        $this->Hotel->Activity->unbindModel(array('hasMany' => array('I18nKey','Review','Season','Image','Relation'),'belongsTo'=>array('Product'))); 
                        
                        $this->Hotel->recursive = 3; 
                        $this->request->data = $this->Hotel->read(null, $id);
                }
		$products = $this->Hotel->Product->find('list');
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
                $locations = $this->Hotel->Product->Location->findByCountry($this->getCountryOnly());
                //$this->Hotel->Activity->recursive=3;
                //$activities = $this->Hotel->Activity->find('all',array('conditions'=>array('Location.region_id'=>$this->request->data['Product']['Location']['region_id'])));                
		
               /* $activities = $this->Hotel->Activity->query("SELECT  
                                                                    product_name as name,
                                                                    Product.id as id,
                                                                    category
                                                             FROM activities as Activity 
                                                                  inner join products as Product on(Product.id=Activity.product_id) 
                                                                  inner join locations as Location on (Product.location_id=Location.id) 
                                                                  inner join activity_types as ActivityType on (Activity.activity_type_id=ActivityType.id) 
                                                             where Location.region_id={$this->request->data['Product']['Location']['region_id']}
                                                             ;");                
		$activities=Set::combine($activities,"{n}.Product.category","{n}.Product");
                */
                $this->Hotel->Activity->recursive=0;
                $options['joins'] = array(
                    array('table' => 'locations',
                        'alias' => 'Location',
                        'type' => 'inner',
                        'conditions' => array("1=1"
                            /*"Location.id={$this->request->data['Product']['Location']['id']}",
                            "Location.region_id = {$this->request->data['Product']['Location']['region_id']}",*/                          
                         )                
                        
                    )
                );
                $options['conditions'] =array('Location.id=Product.location_id',"Location.region_id={$this->request->data['Product']['Location']['region_id']}");
                //$options['conditions'] =array('Location.id=Product.location_id',"Location.id={$this->request->data['Product']['Location']['id']}");
               
                $activities = $this->Hotel->Activity->find('all',$options);
                 $activities=Set::combine($activities,"{n}.Product.id","{n}.Product.product_name","{n}.ActivityType.category");
                
                 $options['conditions'] =array('Location.id=Product.location_id',"Location.region_id!={$this->request->data['Product']['Location']['region_id']}");
                
                   $activitiesOthers = $this->Hotel->Activity->find('all',$options);
                 $activitiesOthers=Set::combine($activitiesOthers,"{n}.Product.id","{n}.Product.product_name","{n}.ActivityType.category");
                 
                $this->set(compact('products', 'hotelCategories','locations','activities','activitiesOthers'));
                
               
	}
        
        private function action_delete($id=null){
            if(isset($this->request->data['Action']['Delete'])){               
                 
                   if(isset($this->request->data['Action']['Delete']['Room'])){
                        //$deleteid=
                        if($this->Hotel->Room->delete(key($this->request->data['Action']['Delete']['Room']))){
                            $this->Session->setFlash(__('The Room have been deleted'));                          
                        }else{
                            $this->Session->setFlash(__('The Room could not be deleted. Please, try again.'), 'default', array(), 'error');                             
                        }
                         $this->redirect('edit/'.$id.'#tabs-4'); 
                        
                    }elseif(isset($this->request->data['Action']['Delete']['Review'])){
                        
                        if($this->Hotel->Review->delete(key($this->request->data['Action']['Delete']['Review']))){
                            $this->Session->setFlash(__('The Review data have been deleted'));
                        }else{
                            $this->Session->setFlash(__('The Review could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                          $this->redirect('edit/'.$id.'#tabs-7'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Season'])){                        
                        if($this->Hotel->Season->delete(key($this->request->data['Action']['Delete']['Season']))){
                            $this->Session->setFlash(__('The Season have been deleted'));                         
                        }else{
                            $this->Session->setFlash(__('The Season could not be deleted. Please, try again.'), 'default', array(), 'error');
                        }
                         $this->redirect('edit/'.$id.'#tabs-5'); 
                    }elseif(isset($this->request->data['Action']['Delete']['Image'])){                        
                        if($this->Hotel->Image->delete(key($this->request->data['Action']['Delete']['Image']))){
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
                        
                         if( $this->Hotel->Season->save($row)){
                             $this->Session->setFlash(__('The season have been added'));
                             $this->redirect('edit/'.$id.'#tabs-5'); 
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
                        if($this->Hotel->Season->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The seasons has been added'));
                             $this->redirect('edit/'.$id.'#tabs-5'); 
                        }else{
                             $this->Session->setFlash(__('The seasons could not be added'),'default', array(), 'error');
                        }                            
                        
                    }elseif(isset($this->request->data['Action']['Add']['Rooms'])){                        
                        $c=isset($this->request->data['Action']['Add']['Rooms_count'])?$this->request->data['Action']['Add']['Rooms_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[$i]=array('hotel_id'=>$id);
                           
                        }
                         if($this->Hotel->Room->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The rooms has been added'));
                             $this->redirect('edit/'.$id.'#tabs-4'); 
                        }else{
                             $this->Session->setFlash(__('The rooms could not be added'),'default', array(), 'error');
                        } 
                        
                         
                    }elseif(isset($this->request->data['Action']['Add']['Reviews'])){
                        $c=isset($this->request->data['Action']['Add']['Reviews_count'])?$this->request->data['Action']['Add']['Reviews_count']:1;
                        $rows=array();
                        for($i=0;$i<$c;$i++){
                            $rows[$i]=array('product_id'=>$id,'review_date'=>date("Y-m-d"));

                        }
                         if($this->Hotel->Review->saveMany($rows) && $c>0){
                             $this->Session->setFlash(__('The reviews has been added'));
                              $this->redirect('edit/'.$id.'#tabs-8');  
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
                if(isset($this->request->data['Action']['Save']['Hotel'])){                         
                    $this->Hotel->unbindModel(array('hasMany'=>array('Room','Season','Review')));     
                    if(isset($this->request->data['Activity']['ActivityOthers'])){
                        $arrayActivities=$this->request->data['Activity']['Activity'];
                        $arrayActivitiesOthers=$this->request->data['Activity']['ActivityOthers'];
                        $this->request->data['Activity']['Activity']=array_merge($arrayActivities,$arrayActivitiesOthers);
                        //$this->set('ccc', $this->request->data['Activity']['Activity']);
                    }
                    if ($this->Hotel->saveAssociated($this->request->data)){                             
                        $this->Session->setFlash(__('The hotel data have been saved'));                       
                        //$this->redirect('edit/'.$id.'#tabs-1'); 
                    }else{
                        $this->Session->setFlash(__('The hotel could not be saved. Please, try again.'), 'default', array(), 'error');
                    }
                       
                }elseif(isset($this->request->data['Action']['Save']['Rooms'])){                          
                    if(isset($this->request->data['Room'])){                

                        foreach($this->request->data['Room'] as $h=> $roomData){     
                             $this->Hotel->Room->unbindModel(array('belongsTo'=>array('Hotel'),'hasMany'=>array('RoomRate')));
                            $this->Hotel->Room->saveAssociated($roomData);
                            if(!empty($this->Hotel->Room->validationErrors))
                                $errores[$h]=$this->Hotel->Room->validationErrors;                               
                        }  
                        if(!empty($errores)){                               
                            $this->Hotel->Room->validationErrors=$errores;
                            $this->Session->setFlash(__('Rooms could not be saved. Please, try again.'), 'default', array(), 'error');
                            //$this->redirect('edit/'.$id.'#tabs-4'); 
                        }
                        else{
                            $this->Session->setFlash(__('The rooms data have been saved'));
                        }      
                    }                          
               }elseif(isset($this->request->data['Action']['Save']['Reviews'])){                                                 
                    if(isset($this->request->data['Review'])){      
                         
                        foreach($this->request->data['Review'] as $h=>$reviewData){  
                            $this->Hotel->Review->unbindModel(array('belongsTo'=>array('Product'))); 
                            $this->Hotel->Review->saveAssociated($reviewData);  
                            if(!empty($this->Hotel->Review->validationErrors))
                                $errores[$h]=$this->Hotel->Review->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Hotel->Review->validationErrors=$errores;
                            $this->Session->setFlash(__('Review could not be saved. Please, try again.'), 'default', array(), 'error');
                             // $this->redirect(array('edit/'.$id.'#tabs-7'));
                        }
                        else{
                            $this->Session->setFlash(__('The review data have been saved'));
                        }                           
                     }
                       
              }elseif(isset($this->request->data['Action']['Save']['Roomrates'])){
                 
                    if(isset($this->request->data['Product']['Rate'])){                                                
                        
                        if(!$this->Hotel->Product->Rate->saveMany($this->request->data['Product']['Rate'])){
                            $this->Session->setFlash(__('Roomrates could not be saved. Please, try again.'));
                        }
                        else{
                            $this->Session->setFlash(__('Roomrates data have been saved'));
                        }  
                    }
                        
             }elseif(isset($this->request->data['Action']['Save']['Seasons'])){
                    $this->Hotel->Review->unbindModel(array('belongsTo'=>array('Product')));

                    if(isset($this->request->data['Season'])){
                        $this->Hotel->Season->setDataArray($this->request->data['Season']);
                         $this->Hotel->Season->SeasonException->setDataArray($this->request->data['Season']);
                        foreach($this->request->data['Season'] as $h=>$reviewData){ 
                            $this->Hotel->Season->saveAssociated($reviewData);
                            if(!empty($this->Hotel->Season->validationErrors))
                                $errores[$h]=$this->Hotel->Season->validationErrors;  
                        }
                        if(!empty($errores)){                               
                            $this->Hotel->Season->validationErrors=$errores;
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