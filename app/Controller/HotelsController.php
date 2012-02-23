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
		$this->layout = 'default';
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
                 
                $this->Hotel->unbindModel(array('hasMany' => array('Season','Review')));
                $this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'hasMany' => array('Activities','I18nKey'))); 
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
                /*
                $i18n_array= Set::combine($this->request->data['I18nKey'] , '{n}.key','{n}');
                 //$i18n_array= Set::remove($i18n_array , '{n}.language.en');
                $i18n_array = array_merge($i18n_array,Set::combine($this->request->data['Product']['I18nKey'] , '{n}.key','{n}'));
                //$i18n_array = array_merge($i18n_array,Set::combine($this->request->data['Product']['Review']['I18nKey'] , '{n}.key','{n}'));
                 * 
                 */
                foreach ($this->request->data['Room'] as $room){
                    $totalRooms+=$room['count'];   
                    //$i18n_array=array_merge($i18n_array,Set::combine($room['I18nKey']  , '{n}.key','{n}'));
                }
                /*
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
                $this->request->data['I18nKey']=$i18n_array;*/
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
			$jsGalleryDec = $jsGalleryDec.' var image'.$contImg.'=new Image(); image'.$contImg.'.src="'.$this->request->webroot.'img/image/'.$img['dir'].'/640x480_'.$img['image_name'].'";';
			$contImg++;
		endforeach; 		
		
		$jsGalleryFunc = 'var step=1; function slideit(){ if (!document.images) return; document.images.slide.src=eval("image"+step+".src"); if (step<'.($contImg-1).'){step++;} else{step=1;} setTimeout("slideit()",2500); } slideit();';

		//--Se env�an las variables hacia el View.
		$this->set('hotel', $this->request->data);
                $this->set('deb', $deb);
		//Se consultan los Regions Y Locations.
		//$this->set('regions', $this->Hotel->Product->Location->Region->find('all')); 
		/*$this->set('jsGalleryDec', $jsGalleryDec);	
		$this->set('jsGalleryFunc', $jsGalleryFunc);*/
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
                    //$this->action_delete($id)|| $this->action_save();
                    
		} else{                      
                        $this->Hotel->Product->unbindModel(array('hasOne' => array('Hotel'),'hasMany' => array('I18nKey','Activities','TravellerReview','StaffReview'))); 
                        //$this->Hotel->Product->unbindModel(array('hasMany' => array('Hotel'),'belongsTo'=>array('Location')));
                        $this->Hotel->Review->unbindModel(array('belongsTo'=>array('Product')));                        
                        $this->Hotel->Season->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Hotel','Parent'))); 
                        $this->Hotel->Room->unbindModel(array('belongsTo'=>array('Hotel'))); 
                        $this->Hotel->Room->RoomRate->unbindModel(array('belongsTo'=>array('Room','Season'))); 
                        $this->Hotel->Season->SeasonException->unbindModel(array('hasMany' => array('RoomRate'),'belongsTo'=>array('Parent','Hotel'))); 
                    
                        $this->Hotel->recursive = 3; 
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
                        $row=array('hotel_id'=>$id,'parent_id'=>key($this->request->data['Action']['Add']['SeasonException']));                        
                        
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
                            $rows[$i]=array('hotel_id'=>$id);                           
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
                              $this->redirect('edit/'.$id.'#tabs-7');  
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
                    if(isset($this->request->data['Room'])){
                        foreach($this->request->data['Room'] as $h=>$roomData){

                            $this->Hotel->Room->RoomRate->unbindModel(array('belongsTo'=>array('Season','Room')));                                
                            $this->Hotel->Room->RoomRate->saveMany($roomData['RoomRate']); 
                            if(!empty($this->Hotel->Room->RoomRate->validationErrors))
                                $errores[$h]==$this->Hotel->Room->RoomRate->validationErrors;
                        }
                    
                        if(!empty($errores)){                               
                            $this->Hotel->Room->RoomRate->validationErrors=$errores;
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