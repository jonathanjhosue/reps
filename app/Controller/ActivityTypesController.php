<?php
class ActivityTypesController extends AppController
{
	var $name = 'ActivityTypes';
        var $scaffold;

	/*============BEGINS USER METHODS===================*/
	
	/*function index()
	{
		$this->set('hotelCategories', $this->HotelCategory->findAll());
	}	

	function view($id)
	{/
		$this->HotelCategory->id = $id;
		$this->set('hotelCategory', $this->HotelCategory->read());
	}*/

	/*============BEGINS ADMIN METHODS===================*/
	/*
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
	*/
        
        function index()
	{
            $activityTypes = $this->paginate();
            if (isset($this->params['requested'])) {
                return $activityTypes;
            } else {
                $this->set(compact('$activityTypes'));
            }
        }
} 
?>
