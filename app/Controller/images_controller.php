<?php
class ImagesController extends AppController
{
	var $name = 'Images';

	/*============BEGINS USER METHODS===================*/
	
	function index()
	{
		$this->layout = 'guest';
		$this->set('images', $this->Image->findAll());
	}	

	function view($id)
	{
		$this->layout = 'guest';
		$this->Image->id = $id;
		$this->set('image', $this->Image->read());
	}

	/*============BEGINS ADMIN METHODS===================*/
	
	function admin_index()
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('images', $this->Image->findAll());
		}
		else { $this->redirect('/'); }		
	}	

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Image->id = $id;
			$this->Image->unbindModel( array('belongsTo'=> array('Product')) );
			$this->data = $this->Image->read();
			
			$this->data['Product']['id'] = $this->Session->read('productAsoId');
			$this->data['Product']['product_name'] = $this->Session->read('productName');
			$this->data['Product']['controller'] = $this->Session->read('controller');
			
			$this->set('image', $this->data);
		}
		else { $this->redirect('/'); }
	}
	
	/*
	 * Descripcion: Registrar un nuevo Image. Las variables de sesión 'productId' y 'serviceId' podrían contener
	 * el identificador de Product y servicio específico al cual se le agregará el Image. 
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
				//valida que la imagen haya sido cargada.
				//if ( $this->Image->isUploadedFile($this->data['Image']['submittedfile']) )
				if (is_uploaded_file($this->data['Image']['submittedfile']['tmp_name']))
				{
					$file = array_shift($this->data['Image']['submittedfile']);
					
					$uploaddir = '/public_html/panamareps.com/images/';				
					$uploadfile = $uploaddir . basename($file['name']);

					if (move_uploaded_file($file['tmp_name'], $uploaddir)) //si es movido salva la vara.
					{
						$this->data['Image']['image_name'] = basename($file['name']);
									
						if ($this->Image->save($this->data))
						{
							$this->Session->setFlash('Image Saved!!');
							$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
						}
					}
					else //si no se puede mover tons devuelve un error y no salva nada
					{
						$this->Session->setFlash('Error Image Not Saved Not Moved Image!!');
						$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));
					}
				}
				else //si no se puede mover tons devuelve un error y no salva nada
				{
					$this->Session->setFlash('Error Image Not Saved, Not Uploaded Image!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));
				}
			}
			else{				
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
			
			$this->Image->delete($id);
			$this->Session->setFlash('The Image with id: '.$id.' has been deleted.');
			$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));
		}
		else { $this->redirect('/'); }	
	}

	function admin_edit($id = null)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Image->id = $id;

			$productAsoId = $this->Session->read('productAsoId');
			$productName = $this->Session->read('productName');
			$controller = $this->Session->read('controller');
			
			if (empty($this->data))
			{
				$this->Image->unbindModel(array('belongsTo'=>array('Product')));
				$this->data = $this->Image->read();
				$this->set('productName', $productName);
				$this->set('controller', $controller);
				$this->set('productAsoId', $productAsoId);
			}
			else{
				if ($this->Image->save($this->data))
				{
					$this->Session->setFlash('Image Saved!!');
					$this->redirect(array('controller'=>$controller, 'action'=>'view', 'id'=>$productAsoId));	
				}
			}
		}
		else { $this->redirect('/'); }
	}
}
?>
