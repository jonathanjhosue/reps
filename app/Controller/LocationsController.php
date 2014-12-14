<?php
class LocationsController extends AppController
{
	var $name = 'Locations';
        var $layout='admin';
	var $scaffold;
	
	/*============BEGINS ADMIN METHODS===================*/
	
            function index()
	{
            $locations = $this->paginate();
            if (isset($this->params['requested'])) {
            return $locations;
            } else {
            $this->set(compact('$locations'));
            }

			//$this->Location->unbindModel(array('hasMany'=>array('Location')));
			//$this->set('locations', $this->Location->find('all'));

	}
	
        public function admin_index() {
		$this->Location->recursive = 0;
                $this->set('locations', $this->paginate());
	}

    
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__('Invalid Location'));
		}
		$this->set('location', $this->Location->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->Location->create();
			$idRegion=$this->request->data['Location']['region_id'];			
			$this->Location->Region->recursive=0;
			$region=$this->Location->Region->read(null,$idRegion);	
			$this->request->data['Location']['country']=$region['Region']['country'];
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The Location has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Location could not be saved. Please, try again.'));
			}
		}
                $regions = $this->Location->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__('Invalid Location'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$idRegion=$this->request->data['Location']['region_id'];
			//$this->Location->Region->id=$idRegion;
			$this->Location->Region->recursive=0;
			$region=$this->Location->Region->read(null,$idRegion);
			//pr($region);
			//throw new NotFoundException(__('Invalid Location')+$idRegion['Region']['country']);
			$this->request->data['Location']['country']=$region['Region']['country'];
			if ($this->Location->save($this->request->data)) {
				$this->Session->setFlash(__('The Location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Location could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Location->read(null, $id);
		}
                   $regions = $this->Location->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__('Invalid Location'));
		}
                $c=$this->Location->Product->find('count',array("conditions"=>array("location_id"=>$id)));
               
                if (0==$c) {
                    if ($this->Location->delete()) {
                            $this->Session->setFlash(__('Location deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Location was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Location was not deleted, because has Products'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
    
        
        
        function view($id=null)
	{
            //$location = $this->Location->read();
            
            $this->Location->id = $id;
	    $location = $this->Location->read();
            if (isset($this->params['requested'])) {
                return $location;
            } else {
                $this->set(compact('$location'));
            }
	}
} 
?>
