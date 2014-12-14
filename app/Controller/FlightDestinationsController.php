<?php
class FlightDestinationsController extends AppController
{
	var $name = 'FlightDestinations';
       // var $scaffold;

        public $layout = "admin";
        
	
                function index()
	{
            $FlightDestinations = $this->paginate();
            if (isset($this->params['requested'])) {
                return $FlightDestinations;
            } else {
                $this->set(compact('$FlightDestinations'));
            }
        }
        
         
    
    
	public function admin_index() {
		$this->FlightDestination->recursive = 1;
                $this->set('Flightdestinations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->FlightDestination->id = $id;
		if (!$this->FlightDestination->exists()) {
			throw new NotFoundException(__('Invalid Flight Destination'));
		}
		$this->set('Flightdestination', $this->FlightDestination->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->FlightDestination->create();
			if ($this->FlightDestination->save($this->request->data)) {
				$this->Session->setFlash(__('The Flight destination has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Flight destination could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->FlightDestination->id = $id;
		if (!$this->FlightDestination->exists()) {
			throw new NotFoundException(__('Invalid Flight Destination'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FlightDestination->save($this->request->data)) {
				$this->Session->setFlash(__('The Flight destination has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Flight Destination could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FlightDestination->read(null, $id);
		}
	}


	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FlightDestination->id = $id;
		if (!$this->FlightDestination->exists()) {
			throw new NotFoundException(__('Invalid Flight Destination'));
		}
                $c=$this->FlightDestination->Flight->find('count',array("conditions"=>array("product_id"=>$id)));
               
                if (0==$c) {
                    if ($this->FlightDestination->delete()) {
                            $this->Session->setFlash(__('Flight Destination deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Flight Destination was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Flight Destination was not deleted, because has Vehicles'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
        
} 
?>
