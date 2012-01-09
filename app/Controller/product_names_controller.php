<?php
class ProductNamesController extends AppController
{
	var $name = 'ProductNames';
		
	function admin_index()
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('productNames', $this->ProductName->findAll());
		}
		else { $this->redirect('/'); }			
	}

	function admin_view($id)
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->ProductName->id = $id;
			$this->ProductName->unbindModel( array('belongsTo'=>array('Product')) );
			$this->data = $this->ProductName->read();
			
			$this->data['Product']['id'] = $this->Session->read('productAsoId');
			$this->data['Product']['product_name'] = $this->Session->read('productName');
			$this->data['Product']['controller'] = $this->Session->read('controller');
			
			$this->set('productName', $this->data);
		}
		else { $this->redirect('/'); }	
	}

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
				if($this->ProductName->save($this->data))    
				{
					$this->Session->setFlash('Product Name Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}    
			}
			else{
				$this->set('languages', $this->ProductName->Language->find('list')); 
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
			$this->ProductName->delete($id);
			$this->Session->setFlash('The Product Name with id: '.$id.' has been deleted.');
			$this->redirect(array('action'=>'index'));
		}
		else { $this->redirect('/'); }	
 	}

	function admin_edit($id = null)    
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->ProductName->id = $id; 
			
			$productAsoId = $this->Session->read('productAsoId');
			$productName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');

			if (empty($this->data))
			{
				$this->set('languages', $this->ProductName->Language->find('list')); 
				
				$this->ProductName->unbindModel( array('belongsTo'=>array('Product', 'Language')) );
				$this->data = $this->ProductName->read();
				$this->set('productName', $productName);
				$this->set('controller', $controller);
				$this->set('productAsoId', $productAsoId);
			}
			else{
				if($this->ProductName->save($this->data))
				{
					$this->Session->setFlash('Product Name Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	    
				}
			}
		}
		else { $this->redirect('/'); }			  
	}
}
?>
