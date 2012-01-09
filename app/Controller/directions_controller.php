<?php
class DirectionsController extends AppController
{
	var $name = 'Directions';
	
	/*============BEGINS USER METHODS===================*/

	function index()
	{
		$this->set('directions', $this->Direction->findAll());
	}	

	function view($id)
	{
		$this->Direction->id = $id;
		$this->set('direction', $this->Direction->read());
	}

	/*============BEGINS ADMIN METHODS===================*/
	
	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('directions', $this->Direction->findAll());
		}
		else { $this->redirect('/'); }		
	}	

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Direction->id = $id;			
			$this->Direction->unbindModel( array('belongsTo'=>array('Product')) );
			$this->data = $this->Direction->read();
			
			$this->data['Product']['id'] = $this->Session->read('productAsoId');
			$this->data['Product']['product_name'] = $this->Session->read('productName');
			$this->data['Product']['controller'] = $this->Session->read('controller');
			
			$this->set('direction', $this->data);
		}
		else { $this->redirect('/'); }
	}
	
	/*
	 * Descripcion: Registrar un nuevo Direction. Las variables de sesión 'productId' y 'serviceId' podrían contener
	 * el identificador de Product y servicio específico al cual se le agregará el Direction. 
	*/
	function admin_add()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$productId = $this->Session->read('productId');
			$productAsoId = $this->Session->read('productAsoId');
			$productName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');
			
			if (!empty($this->data))
			{
				if ($this->Direction->save($this->data))
				{
					$this->Session->setFlash('Direction Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));
				}
			}
			else{
				$this->set('languages', $this->Direction->Language->find('list'));
				$this->set('productId', $productId);
				$this->set('productAsoId', $productAsoId);
				$this->set('productName', $productName);
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
			$controller = $this->Session->read('controller');
			$productAsoId = $this->Session->read('productAsoId');
			
			$this->Direction->delete($id);
			$this->Session->setFlash('The Direction with id: '.$id.' has been deleted.');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));
		}
		else { $this->redirect('/'); }	
	}

	function admin_edit($id = null)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Direction->id = $id;

			$productAsoId = $this->Session->read('productAsoId');
			$productName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');

			if (empty($this->data))
			{
				$this->set('languages', $this->Direction->Language->find('list'));
				
				$this->Direction->unbindModel(array('belongsTo'=>array('Product', 'Language')));
				$this->data = $this->Direction->read();
				$this->set('productName', $productName);
				$this->set('controller', $controller);
				$this->set('productAsoId', $productAsoId);
			}
			else{
				if ($this->Direction->save($this->data))
				{
					$this->Session->setFlash('Direction Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}
			}
		}
		else { $this->redirect('/'); }	
	}
}
?>
