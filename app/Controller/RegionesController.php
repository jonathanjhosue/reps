<?php
class RegionesController extends AppController
{
	var $name = 'Regions';
	var $layout='admin';
	var $scaffold;

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
	
        public function admin_index() {
        
		$this->Region->recursive = 0;
                $this->set('regions', $this->paginate());
	}

    
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid Region'));
		}
		$this->set('region', $this->Region->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->Region->create();
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The Region has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Region could not be saved. Please, try again.'));
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
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid Region'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The Region has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Region could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Region->read(null, $id);
		}
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
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid Region'));
		}
                $c=$this->Region->Location->find('count',array("conditions"=>array("region_id"=>$id)));
               
                if (0==$c) {
                    if ($this->Region->delete()) {
                            $this->Session->setFlash(__('Region deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Region was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Region was not deleted, because has Locations'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
    
}
?>

