<?
class HotelCategoriesController extends AppController
{
	var $name = 'HotelCategories';

	/*============BEGINS USER METHODS===================*/
	
	/*function index()
	{
		$this->set('hotelCategories', $this->HotelCategory->findAll());
	}	

	function view($id)
	{
		$this->HotelCategory->id = $id;
		$this->set('hotelCategory', $this->HotelCategory->read());
	}*/

	/*============BEGINS ADMIN METHODS===================*/
	
	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('hotelCategories', $this->HotelCategory->findAll());
		}
		else { $this->redirect('/'); }	
	}	

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->HotelCategory->id = $id;
			$this->set('hotelCategory', $this->HotelCategory->read());
		}
		else { $this->redirect('/'); }	
	}
	
	function admin_add()
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			if (!empty($this->data))
			{
				if ($this->HotelCategory->save($this->data))
				{
					$this->Session->setFlash('Hotel Category Saved!!');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
		else { $this->redirect('/'); }	
	}

	function admin_delete($id)
	{	
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->HotelCategory->delete($id);
			$this->Session->setFlash('The Hotel Category with id: '.$id.' has been deleted.');
			$this->redirect(array('action'=>'index'));
		}
		else { $this->redirect('/'); }		
	}
	
	function admin_edit($id = null)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->HotelCategory->id = $id;

			if (empty($this->data))
			{
				$this->data = $this->HotelCategory->read();
			}
			else{
				if ($this->HotelCategory->save($this->data))
				{
					$this->Session->setFlash('Hotel Category Saved!!');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
		else { $this->redirect('/'); }
	}
} 
?>
