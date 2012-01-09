<?php
class LanguagesController extends AppController
{
	var $name = 'Languages';
	
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('changeLanguage');
	}
	
	function admin_index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->set('languages', $this->Language->findAll());
		}
		else { $this->redirect('/'); }
	}

	function admin_view($id)
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Language->id = $id;
			$this->set('language', $this->Language->read());
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
				if($this->Language->save($this->data))    
				{
					$this->Session->setFlash('Language Saved!!');
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
			$this->Language->delete($id);
			$this->Session->setFlash('The language with id: '.$id.' has been deleted.');
			$this->redirect(array('action'=>'index'));
		}
		else { $this->redirect('/'); }		
 	}

	
	function admin_edit($id = null)    
	{
		$this->layout = 'admin';
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Language->id = $id; 

			if (empty($this->data))
			{
				$this->data = $this->Language->read();
			}
			else{
				if($this->Language->save($this->data))
				{
					$this->Session->setFlash('Language Saved!!');
					$this->redirect(array('action'=>'index'));    
				}
			}
		}
		else { $this->redirect('/'); }		  
	}
	
	function changeLanguage($id)
	{
		$this->Session->write('language', $id);
		$this->redirect($this->referer());
	}
}
?>
