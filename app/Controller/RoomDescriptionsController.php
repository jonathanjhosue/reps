<?
class RoomDescriptionsController extends AppController
{
	var $name = 'RoomDescriptions';

/*============BEGINS USER METHODS===================*/

	function index()
	{
		$this->layout = 'guest';
		$this->set('roomDescriptions', $this->RoomDescription->findAll());
	}

	function view($id)
	{
		$this->layout = 'guest';
		$this->RoomDescription->id = $id;
		$this->set('roomDescription', $this->RoomDescription->read());
	}

/*============BEGINS ADMIN METHODS===================*/

	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$this->set('roomDescriptions', $this->RoomDescription->findAll());
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$this->RoomDescription->id = $id;
			
			$this->RoomDescription->unbindModel( array('belongsTo' => array('Room')) );
			$this->data =  $this->RoomDescription->read();
			
			$this->data['Room']['id'] = $this->Session->read('idRoom');
			$this->data['Room']['category'] = $this->Session->read('category');
			$this->set('roomDescription', $this->data);
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_add()    
 	{ 	
		$this->layout = 'admin';
 		if ($this->Session->read('Auth.User.rol') == 'admin'){
	 		$roomId = $this->Session->read('roomId');
			$category = $this->Session->read('category');
			$controller = 'rooms';
				 
	 		if (!empty($this->data))    
	 		{    
	 			if($this->RoomDescription->save($this->data))    
	 			{
	 				$this->Session->setFlash('Room Description Saved!!');
	 				$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$roomId));		
				}    
			}
			else{
				$this->set('languages', $this->RoomDescription->Language->find('list')); 
				//$this->set('rooms', $this->RoomDescription->Room->find('list')); 
				$this->set('roomId', $roomId);
				$this->set('category', $category);
			}
		}
		else { $this->redirect('/Hotels'); }
	}

	function admin_delete($id) 
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$roomId = $this->Session->read('roomId');
			$controller = 'rooms';
		
			$this->RoomDescription->delete($id);
		 	$this->Session->setFlash('The Room Description with id: '.$id.' has been deleted.');
		 	$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$roomId));
		 }
		 else { $this->redirect('/Hotels'); }
 	}

	
	function admin_edit($id = null)    
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin'){
			$this->RoomDescription->id = $id; 

			$roomId = $this->Session->read('roomId');
			$category = $this->Session->read('category');
			$controller = 'rooms';

			if (empty($this->data))
			{
				$this->set('languages', $this->RoomDescription->Language->find('list')); 
				//$this->set('rooms', $this->RoomDescription->Room->find('list')); 
				$this->data = $this->RoomDescription->read();
				$this->set('category', $category);
			
			}
			else{
				if($this->RoomDescription->save($this->data))
				{
					$this->Session->setFlash('Room Description Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$roomId));   
				}
			}
		}
		 else { $this->redirect('/Hotels'); }		  
	}
} 
?>
