<?php
class AditionalServicesController extends AppController
{
	var $name = 'AditionalServices';
        var $layout='admin';
	var $scaffold;
	
	/*============BEGINS ADMIN METHODS===================*/
	
            function index()
	{
            $aditionalServices = $this->paginate();
            if (isset($this->params['requested'])) {
            return $aditionalServices;
            } else {
            $this->set(compact('$aditionalServices'));
            }

			//$this->AditionalService->unbindModel(array('hasMany'=>array('AditionalService')));
			//$this->set('aditionalServices', $this->AditionalService->find('all'));

	}
	
        public function admin_index() {
		$this->AditionalService->recursive = 2;
                $this->set('aditional_service', $this->paginate());
	}

    
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->AditionalService->id = $id;
                if (!$this->AditionalService->exists()) {
			throw new NotFoundException(__('Invalid Aditional Service'));
		}
                $this->AditionalService->recursive = 1;
		$this->set('aditionalService', $this->AditionalService->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->AditionalService->create();
			if ($this->AditionalService->save($this->request->data)) {
				$this->Session->setFlash(__('The Aditional Service has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Aditional Service could not be saved. Please, try again.'));
			}
		}
                $rentacars = $this->AditionalService->Rentacar->find('list');
		$this->set(compact('rentacars'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->AditionalService->id = $id;
		if (!$this->AditionalService->exists()) {
			throw new NotFoundException(__('Invalid Aditional Service'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AditionalService->save($this->request->data)) {
				$this->Session->setFlash(__('The Aditional Service has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Aditional Service could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AditionalService->read(null, $id);
		}
                   //$rentacars = $this->AditionalService->Rentacar->find('list');
		//$this->set(compact('rentacars'));
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
		$this->AditionalService->id = $id;
		if (!$this->AditionalService->exists()) {
			throw new NotFoundException(__('Invalid Aditional Service'));
		}
                $c=$this->AditionalService->Rentacar->find('count',array("conditions"=>array("product_id"=>$id)));
               
                if (0==$c) {
                    if ($this->AditionalService->delete()) {
                            $this->Session->setFlash(__('Aditional Service deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Aditional Service was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Aditional Service was not deleted, because has Products'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
    
        
        
        function view($id=null)
	{
            //$aditionalService = $this->AditionalService->read();
            
            $this->AditionalService->id = $id;
	    $aditionalService = $this->AditionalService->read();
            if (isset($this->params['requested'])) {
                return $aditionalService;
            } else {
                $this->set(compact('$aditionalService'));
            }
	}
} 
?>
