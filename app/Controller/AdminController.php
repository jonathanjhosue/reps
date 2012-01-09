<?php
class AdminController extends AppController
{
	var $name = 'Admin';
	var $uses = NULL;
	
	function beforeFilter()
	{
		$this->Auth->deny('index');
	}
	
	function index() {
	
		$this->layout = 'admin';
		if (!($this->Session->read('Auth.User.rol') == 'admin'))
		{
			 $this->redirect('/'); 
		}
	}
}
?>