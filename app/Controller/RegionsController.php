<?php
class RegionsController extends AppController
{
	var $name = 'Regions';
	//var $layout='admin';
	//var $scaffold;

	/*============BEGINS ADMIN METHODS===================*/
        
        function index()
	{
            $regions = $this->paginate();
            if (isset($this->params['requested'])) {
            return $regions;
            } else {
            $this->set(compact('$regions'));
            }

			//$this->Region->unbindModel(array('hasMany'=>array('Location')));
			//$this->set('regions', $this->Region->find('all'));

	}
	
	function admin_index()
	{
            

			//$this->Region->unbindModel(array('hasMany'=>array('Location')));
			$this->set('regions', $this->Region->find('all'));

	}
/*
	function admin_view($id)
	{
            
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Region->id = $id;
			$this->data = $this->Region->read();
			$this->set('region', $this->data);
			
			$this->Session->write('regionId', $id);
			$this->Session->write('regionName', $this->data['Region']['name_region']);
		}
		else { $this->redirect('/'); }	
	}

	function admin_add()    
 	{  
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			if (!empty($this->data))    
			{    
				if($this->Region->save($this->data))    
				{
					$this->Session->setFlash('Region Saved!!');
					$this->redirect(array('action'=>'view', 'id'=>$this->Region->id));
				}    
			}
		}
		else { $this->redirect('/'); }
	}

	function admin_delete($id) 
	{
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Region->delete($id);
			$this->Session->setFlash('The region with id: '.$id.' has been deleted.');
			$this->redirect(array('action'=>'index'));
		}
		else { $this->redirect('/'); }	
 	}
	
	function admin_edit($id = null)    
	{
		if ($this->Session->read('Auth.User.rol') == 'admin')
		{
			$this->Region->id = $id; 

			if (empty($this->data))
			{
				$this->Region->unbindModel(array('hasMany'=>array('Location')));
				$this->data = $this->Region->read();
			}
			else{
				if($this->Region->save($this->data))
				{
					$this->Session->setFlash('Region Saved!!');
					$this->redirect(array('action'=>'view', 'id'=>$this->Region->id));    
				}
			}
		}
		else { 
                    $this->redirect('/'); 
                    
                }		  
	}*/
}
?>

