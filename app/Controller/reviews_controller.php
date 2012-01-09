<?php
class ReviewsController extends AppController
{
	var $name = 'Reviews';

	/*============BEGINS USER METHODS===================*/
	
	function index()
	{
		$this->layout = 'guest';
		$this->set('reviews', $this->Review->findAll());
	}	

	function view($id)
	{
		$this->layout = 'guest';
		$this->Review->id = $id;
		$this->set('review', $this->Review->read());
	}
	
	/*============BEGINS ADMIN METHODS===================*/
		
	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('reviews', $this->Review->findAll());
		}
		else { $this->redirect('/'); }
		
	}	

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Review->id = $id;
			$this->Review->unbindModel( array('belongsTo'=> array('Product')) );
			$this->data = $this->Review->read();
			
			$this->data['Product']['id'] = $this->Session->read('productAsoId');
			$this->data['Product']['product_name'] = $this->Session->read('productName');
			$this->data['Product']['controller'] = $this->Session->read('controller');
			
			$this->set('review', $this->data);
		}
		else { $this->redirect('/'); }
	}
	
	/*
	 * Descripcion: Registrar un nuevo Review. Las variables de sesión 'productId' y 'serviceId' podrían contener
	 * el identificador de Product y servicio específico al cual se le agregará el Review. 
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
				if ($this->Review->save($this->data))
				{
					$this->Session->setFlash('Review Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}
			}
			else{
				$this->set('languages', $this->Review->Language->find('list'));
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
			
			$this->Review->delete($id);
			$this->Session->setFlash('The Review with id: '.$id.' has been deleted.');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));
		}
		else { $this->redirect('/'); }			
	}
	
	function admin_edit($id = null)
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Review->id = $id;

			$productAsoId = $this->Session->read('productAsoId');
			$productName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');

			if (empty($this->data))
			{
				$this->set('languages', $this->Review->Language->find('list'));
				
				$this->Review->unbindModel(array('belongsTo'=>array('Product', 'Language')));
				$this->data = $this->Review->read();
				$this->set('productName', $productName);
				$this->set('controller', $controller);
				$this->set('productAsoId', $productAsoId);
			}
			else{
				if ($this->Review->save($this->data))
				{
					$this->Session->setFlash('Review Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}
			}	
		}
		else { $this->redirect('/'); }
	}
}
?>
