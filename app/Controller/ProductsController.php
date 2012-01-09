<?php
class ProductsController extends AppController
{
	var $name = 'Products';
	var $scaffold;

	function beforeFilter()
	{
		parent:beforeFilter();
		$this->Auth->deny('add','delete','edit', 'view', 'delete');
	}
	
	
	function index()
	{
		$this->Product->unbindModel(array(
				'hasMany' => array('ProductName', 'Review', 'Direction', 'Description'),
				'hasOne' => array('Hotel')
				)
			);
		$this->set('products', $this->Product->find('all'));
	}

	function view($id)
	{
		$this->Product->id = $id;
		$this->Product->unbindModel(array(
				'hasOne' => array('Hotel')
				)
			);
		$this->set('product', $this->Product->read());
	}

	function add()
	{
		if (!empty($this->data))
		{
			if ($this->Product->save($this->data))
			{
				$this->Session->setFlash('Product Saved!!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}

	function delete($id)
	{
		$this->Product->delete($id);
		$this->Session->setFlash('The product with id: '.$id.' has been deleted');
		$this->redirect(array('action'=>'index'));
	}

	function edit($id = null)
	{
		$this->Product->id = $id;

		$this->Product->unbindModel(array(
				'hasOne' => array('Hotel')
				)
			);

		if (empty($this->data))
		{
			$this->data = $this->Product->read();
		}
		else{
			if ($this->Product->save($this->data))
			{
				$this->Session->setFlash('Product Saved!!');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
}
?>
