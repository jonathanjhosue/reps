<?php
class DescriptionsController extends AppController
{
	var $name = 'Descriptions';

	/*============BEGINS USER METHODS===================*/
	
	function index()
	{
		$this->set('descriptions', $this->Description->findAll());
	}	

	function view($id)
	{
		$this->Description->id = $id;
		$this->set('description', $this->Description->read());
	}

	/*============BEGINS ADMIN METHODS===================*/
	
	function admin_index()
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('descriptions', $this->Description->findAll());
		}
		else { $this->redirect('/'); }	
	}	

	function admin_view($id)
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Description->id = $id;
			$this->Description->unbindModel( array('belongsTo'=> array('Product')) );
			$this->data = $this->Description->read();
			
			$this->data['Product']['id'] = $this->Session->read('productAsoId');
			$this->data['Product']['product_name'] = $this->Session->read('productName');
			$this->data['Product']['controller'] = $this->Session->read('controller');
			
			$this->set('description', $this->data);
		}
		else { $this->redirect('/'); }
	}

	/*
	 * Descripcion: Registrar un nuevo Description. Las variables de sesión 'productId' y 'serviceId' podrían contener
	 * el identificador de Product y servicio específico al cual se le agregará el Description. 
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
				if ($this->Description->save($this->data))
				{
					$this->Session->setFlash('Description Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}
			}
			else{
				$this->set('languages', $this->Description->Language->find('list'));				
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
			
			$this->Description->delete($id);
			$this->Session->setFlash('The Description with id: '.$id.' has been deleted.');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));		
		}
		else { $this->redirect('/'); }	
	}

	function admin_edit($id = null)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Description->id = $id;

			$productAsoId = $this->Session->read('productAsoId');
			$productName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');

			if (empty($this->data))
			{
				$this->set('languages', $this->Description->Language->find('list'));

				$this->Description->unbindModel(array('belongsTo'=>array('Product', 'Language')));
				$this->data = $this->Description->read();
				$this->set('productName', $productName);
				$this->set('controller', $controller);
				$this->set('productAsoId', $productAsoId);
				
			}
			else{
				if ($this->Description->save($this->data))
				{
					$this->Session->setFlash('Description Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}
			}
		}
		else { $this->redirect('/'); }	
	}
}
?>