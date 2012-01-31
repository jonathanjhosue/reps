<?php

App::import('Model', 'TiposGlobal'); 
App::uses('AppController', 'Controller');
class HotelsController extends AppController
{
    public $name = 'Hotels';
    public $helpers = array('Html', 'Form');


    public function index() {

		$this->layout = 'guest';
		$this->helpers[] = 'Js';
		
		//Consulta todos las instancias de Hotel. Se aisla de Room xq no se necesita mostrar ese modelo.
		/*$this->Hotel->unbindModel(array(
				'hasMany' => array('Room')
				)
			);
		$this->request->data = $this->Hotel->findAll();*/
		
		//Consulta la primer imaegn de cada hotel. Primero se aisla el modelo Image antes de consultar.
		/*for($i=0; $i < count($this->request->data); $i++){
			$this->Hotel->Product->Image->unbindModel(array('belongsTo'=>array('Product')));
			$this->request->data[$i]['Product']['image'] = $this->Hotel->Product->Image->find('first', array('conditions' => array( 'Image.product_id'=>$this->request->data[$i]['Product']['id'])));
		}*/
		
		//Se consultan los Regions Y Locations.
		//$this->set('regions', $this->Hotel->Product->Location->Region->find('all'));  
		
		/*$this->set('hotels', $this->request->data);*/
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
		$this->layout = 'guest';
		$this->helpers[] = 'Js';
		$this->helpers[] = 'I18nKeys';
                $this->helpers[] = 'RipsWeb';
		//$language = $this->Session->read('language');
                
                $language='en';
		
		//consulta del hotel (Hotel, Product, HotelCategory, Rooms)
                //$this->Hotel->unbindModel(array('hasMany' => array('Season','Image','Room'),'belongsTo'=>array('Product','HotelCategory'))); 
		//$this->Hotel->Room->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel'))); 
                 $this->Hotel->id = $id;
                $this->Hotel->recursive = 0;  
                /*el verificar si existe se hace antes de los unbind ya que si no se borrarían*/
                if (!$this->Hotel->exists()) {
			throw new NotFoundException(__('Invalid hotel'));
		}          
                
                $this->Hotel->Product->setLocale($language);
                $this->Hotel->setLocale($language);
                $this->Hotel->Room->setLocale($language);
                $this->Hotel->Product->StaffReview->setLocale($language);
                $this->Hotel->Product->TravellerReview->setLocale($language);
                 
                $this->Hotel->unbindModel(array('hasMany' => array('Season')));
                $this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'hasMany' => array('Activities'))); 
                //$this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'belongsTo'=>array('Location')));
                $this->Hotel->Product->StaffReview->unbindModel(array('belongsTo'=>array('Product')));
                $this->Hotel->Product->TravellerReview->unbindModel(array('belongsTo'=>array('Product')));
                $this->Hotel->Season->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel'))); 
                $this->Hotel->Room->unbindModel(array('belongsTo'=>array('Hotel'))); 
                $this->Hotel->Room->RoomRate->unbindModel(array('belongsTo'=>array('Room'))); 
      
                $this->Hotel->recursive = 3;               
		$this->request->data = $this->Hotel->find('first',array('conditions'=>array('Hotel.product_id'=>$id)));
                
                $deb=$this->Hotel->hasMany;
//$this->request->data = $this->Hotel->read();
		//$deb=$this->request->data;
                //Consulta todos las instancias de Hotel seg�n el id de Location. Se aisla de Room xq no se necesita mostrar ese modelo.
		/*$this->Hotel->Product->Location->unbindModel(array('hasMany' => array('Product')));                
                $this->Hotel->Product->Location->id = $this->request->data['Product']['location_id'];	
                $locationArray=$this->Hotel->Product->Location->read();
                
                $this->Hotel->Product->unbindModel(array('belongsTo' => array('Location'),'hasOne'=>array('Hotel')));
                $this->Hotel->Product->id = $this->request->data['Hotel']['product_id'];	
                $reviewArray=$this->Hotel->Product->read(); 
                
                $this->Hotel->Season->RoomRate->unbindModel(array('belongsTo' => array('Hotel')));
               // $this->Hotel->Season->id = $this->request->data['Hotel']['product_id'];	
                $ratesArray=$this->Hotel->Season->RoomRate->find('all',array('conditions'=>array('Season.hotel_id'=>$id))); 
                
                $this->request->data['Location']=$locationArray['Location'];
                $this->request->data['Region']=$locationArray['Region'];
                $this->request->data['StaffReview']=$reviewArray['StaffReview'];
                $this->request->data['TravellerReview']=$reviewArray['TravellerReview'];
                //$this->request->data['RoomRate']=$ratesArray;
                */

                
                $totalRooms = 0;
                $i18n_array= Set::combine($this->request->data['I18nKey'] , '{n}.key','{n}');
                 //$i18n_array= Set::remove($i18n_array , '{n}.language.en');
                $i18n_array = array_merge($i18n_array,Set::combine($this->request->data['Product']['I18nKey'] , '{n}.key','{n}'));
                //$i18n_array = array_merge($i18n_array,Set::combine($this->request->data['Product']['Review']['I18nKey'] , '{n}.key','{n}'));
                foreach ($this->request->data['Room'] as $room){
                    $totalRooms+=$room['count'];   
                    $i18n_array=array_merge($i18n_array,Set::combine($room['I18nKey']  , '{n}.key','{n}'));
                }
                
                foreach ($this->request->data['Product']['TravellerReview'] as $review){
                    $i18n_array=array_merge($i18n_array,Set::combine($review['I18nKey']  , '{n}.key','{n}'));                 
                }
                foreach ($this->request->data['Product']['StaffReview'] as $review){
                    $i18n_array=array_merge($i18n_array,Set::combine($review['I18nKey']  , '{n}.key','{n}'));                 
                }
                //$result = Set::combine($this->request->data['I18nKey'] , '{n}.key','{n}');
                //$result = Set::combine($this->request->data['Product']['I18nKey'] , '{n}.key','{n}');
                //$result = Set::combine($this->request->data['Room'] , '{n}.I18nKey.{n}.key','{n}.I18nKey.{n}');
                //$result = Set::classicExtract($this->request->data['Room'] , '{n}.I18nKey.{n}');
                //$result = Set::combine($result  , '{n}.{n}.{n}.key','{n}.{n}');
                $this->request->data['I18nKey']=$i18n_array;
                $this->request->data['Hotel']['total_rooms']=$totalRooms;
                //$this->request->data['Product']=$this->Hotel->Product->read();
		
                //$totalRooms = count($this->request->data['Room']);
		//Consulta de RoomRate para cada Room obtenida, �nicamente si el usuario est� registrado, de lo contrario no consulta las tarifas.
		//se crea el nuevo arreglo 'RoomRates' en $this->request->data['Room'][x] donde x es el �ndice de la habitaci�n obtenida.
		/*if ($this->Session->check('Auth.User'))
		{
			
			for($i=0; $i < $totalRooms; $i++)
			{	*/
				/*$this->Hotel->Room->RoomRate->unbindModel(array(
					'belongsTo' => array('Room')
					)			
				);								
				$roomRates = $this->Hotel->Room->RoomRate->findAllByRoomId( $this->request->data['Room'][$i]['id'] );			
				$this->request->data['Room'][$i]['room_rate'] = $roomRates; 
                                 * */
                  /*               
			}	
		}*/

		//Consulta de RoomDescription para cada Room obtenida, en el lenguage correspondiente.
		//se crea el nuevo arreglo 'RoomDescriptions' en $this->request->data['Room'][x] donde x es el �ndice de la habitaci�n obtenida.
		/*for($i=0; $i < $totalRooms; $i++)
		{*/	
			/*$this->Hotel->Room->RoomDescription->unbindModel(array(
				'belongsTo' => array('Room', 'Language')
				)			
			);							
			$temp = $this->Hotel->Room->RoomDescription->find('first', array('conditions' => array('RoomDescription.room_id' =>  $this->request->data['Room'][$i]['id'], 'RoomDescription.language_id' => $language)));						
			$this->request->data['Room'][$i]['room_description'] = $temp['RoomDescription']; 
                         * 
                         */
		//}		
			
		//--Consulta de la informaci�n completa de Product(Description, Direction, Review, Location, Image)
		//se almacena en $this->request->data['Product']	
                /*
		$this->Hotel->Product->Description->unbindModel(array('belongsTo'=>array('Product', 'Language')));
		$temp = $this->Hotel->Product->Description->find('first', array('conditions' => array('Description.product_id'=>$this->request->data['Product']['id'], 'Description.language_id' => $language)));
		$this->request->data['Product']['description'] = $temp['Description'];
		
		$this->Hotel->Product->Direction->unbindModel(array('belongsTo'=>array('Product', 'Language')));
		$temp = $this->Hotel->Product->Direction->find('first', array('conditions' => array('Direction.product_id'=>$this->request->data['Product']['id'], 'Direction.language_id'=>$language)));
		$this->request->data['Product']['direction'] = $temp['Direction'];
		
		if ($this->Session->check('Auth.User')) //Los comentarios de Staff �nicamente para usuarios registrados.
		{
			$this->Hotel->Product->Review->unbindModel(array('belongsTo'=>array('Product', 'Language')));
			//$params['conditions'] =  array('Review.product_id'=>$this->request->data['Product']['id'], 'Review.language_id'=>$language, 'Review.from'=>'S');
			$this->request->data['Product']['staff_review'] = $this->Hotel->Product->Review->find('all', array('conditions' => array('Review.product_id'=>$this->request->data['Product']['id'], 'Review.language_id'=>$language, 'Review.from'=>'S')));
		}
		
		$this->Hotel->Product->Review->unbindModel(array('belongsTo'=>array('Product', 'Languages')));
		//$params['conditions'] =  array('Review.product_id'=>$this->request->data['Product']['id'], 'Review.language_id'=>$language, 'Review.from'=>'T');
		$this->request->data['Product']['traveller_review'] = $this->Hotel->Product->Review->find('all', array('conditions' => array('Review.product_id'=>$this->request->data['Product']['id'], 'Review.language_id'=>$language, 'Review.from'=>'T')));
		
		$this->Hotel->Product->Image->unbindModel(array('belongsTo'=>array('Product')));
		$this->request->data['Product']['image'] = $this->Hotel->Product->Image->find('all', array('conditions' => array( 'Image.product_id'=>$this->request->data['Product']['id'])));
		*/
		//$this->request->data['Product']['Location'] =$this->Hotel->Product->Location->find('first', array('conditions' => array('Location.id'=>$this->request->data['Product']['location_id'])));
		
			
	
		//--Consulta la lista de lenguages disponibles en el sistema.
		/*$this->Hotel->bindModel( array(
			'hasOne' => array('Language' => array( 'className' => 'Language'))
			)
		);
		
		$this->set('languages', $this->Hotel->Language->find('list'));*/
		
		//se crean dos javascripts necesarios para la muestra de im�genes.
		$jsGalleryDec = '';
		$contImg = 1;		
		foreach($this->request->data['Image'] as $img):
			$jsGalleryDec = $jsGalleryDec.' var image'.$contImg.'=new Image(); image'.$contImg.'.src="'.$this->request->webroot.'img/hotels/'.$img['image_name'].'";';
			$contImg++;
		endforeach; 		
		
		$jsGalleryFunc = 'var step=1; function slideit(){ if (!document.images) return; document.images.slide.src=eval("image"+step+".src"); if (step<'.($contImg-1).'){step++;} else{step=1;} setTimeout("slideit()",2500); } slideit();';

		//--Se env�an las variables hacia el View.
		$this->set('hotel', $this->request->data);
                $this->set('deb', $deb);
		//Se consultan los Regions Y Locations.
		//$this->set('regions', $this->Hotel->Product->Location->Region->find('all')); 
		$this->set('jsGalleryDec', $jsGalleryDec);	
		$this->set('jsGalleryFunc', $jsGalleryFunc);
	}
	
	
	/*============BEGINS ADMIN METHODS===================*/

	function admin_index()
	{
		$this->layout = 'admin';
		$this->helpers[] = 'Javascript';
		
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('regions', $this->Hotel->Product->Location->Region->findAll());  
		}
		else { $this->redirect('/Hotels'); }
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
                $locations = $this->Hotel->Product->Location->find('list');
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
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Hotel->Product->delete($id);
			$this->Session->setFlash('The Hotel with id: '.$id.' has been deleted.');
			$this->redirect(array('action'=>'index'));
		}else { $this->redirect('/Hotels'); }
 	}

	function admin_edit($id = null)    
	{
		$this->layout = 'admin';
               $this->helpers[] = 'I18nKeys';
                $this->helpers[] = 'RipsWeb';
                
                $this->Hotel->id = $id;
		if (!$this->Hotel->exists()) {
			throw new NotFoundException(__('Invalid hotel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    
                    if(isset($this->request->data['save_rooms'])){
                         //$this->Hotel->Room->unbindModel(array('hasMany'=>array('RoomRate'))); 
                         $roomsData=array();
                         /*$roomsData['Hotel']=$this->request->data['Hotel'];*/
                         
                         $roomsData['Room']=$this->request->data['Room'];
                         //$this->set('roomsData',$roomsData);
                         if ($this->Hotel->saveAssociated($this->request->data)){
                             
                             
                         }
                         foreach($this->request->data['Room'] as $roomData){
                             $this->Hotel->Room->saveAssociated($roomData);
                             
                         }
                         //$this->Hotel->id=$id;
                         foreach($this->request->data['Review'] as $reviewData){
                             $this->Hotel->Review->saveAssociated($reviewData);
                             
                         }
                         
                         $this->redirect(array('action' => 'edit',$id));
                        /*if ($this->Hotel->Room->saveMany($this->request->data['Room'])) {
				$this->Session->setFlash(__('The Rooms have been saved'));
				$this->redirect(array('action' => 'edit',$id));
			} else {
				$this->Session->setFlash(__('The rooms could not be saved. Please, try again.'));
			}*/
                    }if(isset($this->request->data['save_all'])){
                        //$rooms=  array_splice($this->request->data['Room'], 0);
                    //
                    
			if ($this->Hotel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The hotel has been saved'));
				$this->redirect(array('action' => 'edit',$id));
			} else {
				$this->Session->setFlash(__('The hotel could not be saved. Please, try again.'));
			}
                        
                    }
                    
                    
		} else {
                        $this->Hotel->unbindModel(array('hasMany' => array('Season')));
                        $this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'hasMany' => array('Activities'))); 
                        //$this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'belongsTo'=>array('Location')));
                        $this->Hotel->Product->StaffReview->unbindModel(array('belongsTo'=>array('Product')));
                        $this->Hotel->Product->TravellerReview->unbindModel(array('belongsTo'=>array('Product')));
                        $this->Hotel->Season->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel'))); 
                        $this->Hotel->Room->unbindModel(array('belongsTo'=>array('Hotel'))); 
                        $this->Hotel->Room->RoomRate->unbindModel(array('belongsTo'=>array('Room'))); 
                    
                        $this->Hotel->recursive = 2; 
                        $this->request->data = $this->Hotel->read(null, $id);
		}
		$products = $this->Hotel->Product->find('list');
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
                $locations = $this->Hotel->Product->Location->find('list');
		$this->set(compact('products', 'hotelCategories','locations'));
                
                /*
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
                    	$this->Hotel->id = $id;
                        if (!$this->Hotel->exists()) {
                                throw new NotFoundException(__('Invalid hotel'));
                        }
                        if ($this->request->is('post') || $this->request->is('put')) {
                                if ($this->Hotel->save($this->request->data)) {
                                        $this->Session->setFlash(__('The hotel has been saved'));
                                        $this->redirect(array('action' => 'index'));
                                } else {
                                        $this->Session->setFlash(__('The hotel could not be saved. Please, try again.'));
                                }
                        } else {
                                $this->request->data = $this->Hotel->read(null, $id);
                        }
                        $products = $this->Hotel->Product->find('list');
                        $hotelCategories = $this->Hotel->HotelCategory->find('list');
                        $this->set(compact('products', 'hotelCategories'));

                    
                    
                    
			$this->Hotel->id = $id; 
	
			if (empty($this->request->data))
			{
				$this->set('locations', $this->Hotel->Product->Location->find('list')); 
				$this->set('hotelCategories', $this->Hotel->HotelCategory->find('list'));
	
				$this->Hotel->unbindModel(array(
					'hasMany' => array('Room')
					)
				);
				$this->request->data = $this->Hotel->read();			
			}
			else{
				if($this->Hotel->saveAll($this->request->data))
				{
					$this->Session->setFlash('Hotel Saved!!');
					$this->redirect(array('action'=>'view', 'id'=>$this->Hotel->id));    
				}
			}
		}else { $this->redirect('/Hotels'); }
                 * */
	}


}