<?
class RoomsController extends AppController
{
	var $name = 'Rooms';

/*============BEGINS USER METHODS===================*/

	function index()
	{
		$this->layout = 'guest';
		$this->Room->unbindModel(array(
				'hasMany' => array('RoomDescription', 'RoomRate')
				)
			);
		$this->set('rooms', $this->Room->find('all'));
	}

	function view($id)
	{
		$this->layout = 'guest';
		$this->Room->id = $id;
		$this->data = $this->Room->read();		
		$this->set('room', $this->data);

		$this->Session->write('roomId', $id);
		$this->Session->write('category', $this->data['Room']['category']);
	}

/*============BEGINS ADMIN METHODS===================*/

	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$this->Room->unbindModel(array(
					'hasMany' => array('RoomDescription', 'RoomRate')
					)
				);
			$this->set('rooms', $this->Room->find('all'));
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$this->Room->id = $id;
			$this->Room->unbindModel( array('belongsTo' => array('Hotel')) );
			$this->data = $this->Room->read();
			
			$this->data['Hotel']['id'] = $this->Session->read('productAsoId');
			$this->data['Hotel']['hotel_name'] = $this->Session->read('productName');			
			$this->set('room', $this->data);

			$this->Session->write('roomId', $id);
			$this->Session->write('category', $this->data['Room']['category']);
		}
		else { $this->redirect('/Hotels'); }
	}

	/*
	 * Descripcion: Registrar un nuevo Room. La variable de sesión 'serviceId' podría contener
	 * el identificador de Hotel específico al cual se le agregará el Room. 
	*/
	function admin_add()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$hotelId = $this->Session->read('productAsoId');
			$hotelName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');
	
			if (!empty($this->data))
			{
				if ($this->Room->save($this->data))
				{
					$this->Session->setFlash('Room Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$hotelId));		
				}
			}
			else{
				//$this->set('hotels', $this->Room->Hotel->find('list'));
				$this->set('hotelId', $hotelId);
				$this->set('hotelName', $hotelName);
			}
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_delete($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$hotelId = $this->Session->read('productAsoId');
			$controller = $this->Session->read('controller');	
		
			$this->Room->delete($id);
			$this->Session->setFlash('The Room with id: '.$id.' has been deleted');

			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$hotelId));
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_edit($id = null)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$this->Room->id = $id;

			$hotelId = $this->Session->read('productAsoId');
			$hotelName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');

			if (empty($this->data))
			{
				$this->Room->unbindModel(array(
					'hasMany' => array('RoomDescription', 'RoomRate'),
					'belongsTo' => array('Hotel')
					)
				);
				$this->data = $this->Room->read();
				
				$this->set('hotelName', $hotelName);
			}
			else{
				if ($this->Room->save($this->data))
				{
					$this->Session->setFlash('Room Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$hotelId));
				}
			}
		}
		else { $this->redirect('/Hotels'); }		
	}
} 
?>
