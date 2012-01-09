<?
class LocationsController extends AppController
{
	var $name = 'Locations';
	//var $scaffold;
	
	/*============BEGINS ADMIN METHODS===================*/
	
	/*
	 * Descripcion: Registrar un nuevo Location. Las variables de sesión 'regionId' y podrían contener
	 * el identificador de Region al cuel pertenece el Location.
	*/
	function admin_add()
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$regionId = $this->Session->read('regionId');
			$regionName = $this->Session->read('regionName');
			$controller = 'Regions';
						
			if (!empty($this->data))
			{
				if ($this->Location->save($this->data))
				{
					$this->Session->setFlash('Location Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$regionId));	
				}
			}
			else{				
				$this->set('regionId', $regionId);				
				$this->set('regionName', $regionName);
				$this->set('controller', $controller);
			}
		}
		else { $this->redirect('/'); }
	}
	
	function admin_delete($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$controller = 'Regions';
			$regionId = $this->Session->read('regionId');
			
			$this->Location->delete($id);
			$this->Session->setFlash('The Location with id: '.$id.' has been deleted.');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$regionId));		
		}
		else { $this->redirect('/'); }	
	}

	function admin_edit($id = null)
	{
		$this->layout = 'admin';
		$this->Location->id = $id;

		$regionId = $this->Session->read('regionId');
		$regionName = $this->Session->read('regionName');
		$controller = 'Regions';

		if (empty($this->data))
		{
			$this->Location->unbindModel(array('belongsTo'=>array('Region')));
			$this->data = $this->Location->read();
			$this->set('regionName', $regionName);
			$this->set('controller', $controller);
			$this->set('regionId', $regionId);
			
		}
		else{
			if ($this->Location->save($this->data))
			{
				$this->Session->setFlash('Location Saved!!');
				$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$regionId));	
			}
		}
	}
} 
?>
