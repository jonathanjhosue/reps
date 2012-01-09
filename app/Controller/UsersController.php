<?php
class UsersController extends AppController 
{
    var $name = 'Users';

    function login() {
    }
    
    function logout() 
    {
    	$this->redirect($this->Auth->logout());
    }
	
	function admin_login() {
    }
    
    function admin_logout() 
    {
    	$this->redirect($this->Auth->logout());
    }
}
?>
