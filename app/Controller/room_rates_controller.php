<?
class RoomRatesController extends AppController
{
	var $name = 'RoomRates';

	/*============BEGINS USER METHODS===================*/
	
	function index()
	{
		$this->layout = 'guest';
		$this->set('roomRates', $this->RoomRate->findAll());
	}

	function view($id)
	{
		$this->layout = 'guest';
		$this->RoomRate->id = $id;
		$this->set('roomRate', $this->RoomRate->read());
	}
	
	/*============BEGINS ADMIN METHODS===================*/
	
	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('roomRates', $this->RoomRate->findAll());
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->RoomRate->id = $id;
			$this->RoomRate->unbindModel( array('belongsTo' => array('Room')) );			
			$this->data = $this->RoomRate->read();
			
			$this->data['Room']['id'] = $this->Session->read('roomId');
			$this->data['Room']['category'] = $this->Session->read('category');
			$this->set('roomRate', $this->data);
		}
		else { $this->redirect('/Hotels'); }
	}
	
	function admin_add()    
 	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$roomId = $this->Session->read('roomId');
			$category = $this->Session->read('category');
			$controller = 'rooms';
					 
			if (!empty($this->data))    
			{    
				if($this->RoomRate->save($this->data))    
				{
					$this->Session->setFlash('Room Rate Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$roomId));	
				}    
			}
			else{
				$this->set('roomId', $roomId);
				$this->set('category', $category); 
			}
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_delete($id) 
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$roomId = $this->Session->read('roomId');
			$controller = 'rooms';
			
			$this->RoomRate->delete($id);
			$this->Session->setFlash('The Room Rate with id: '.$id.' has been deleted.');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$roomId));
		}
		else { $this->redirect('/Hotels'); }	
 	}

	function admin_edit($id = null)    
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->RoomRate->id = $id; 

			$roomId = $this->Session->read('roomId');
			$category = $this->Session->read('category');
			$controller = 'rooms';

			if (empty($this->data))
			{
				//$this->set('rooms', $this->RoomRate->Room->find('list')); 
				$this->data = $this->RoomRate->read();
				$this->set('category', $category);
				
			}
			else{
				if($this->RoomRate->save($this->data))
				{
					$this->Session->setFlash('Room Rate Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$roomId));    
				}
			}  
		}
		else { $this->redirect('/Hotels'); }	
	}
} 
?>
