<?php
class VehicleCategoriesController extends AppController
{
	var $name = 'VehicleCategories';
       // var $scaffold;

        public $layout = "admin";
        
	
                function index()
	{
            $Vehiclecategories = $this->paginate();
            if (isset($this->params['requested'])) {
                return $Vehiclecategories;
            } else {
                $this->set(compact('$Vehiclecategories'));
            }
        }
        
         
    
    
	public function admin_index() {
		$this->VehicleCategory->recursive = 0;
                $this->set('Vehiclecategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->VehicleCategory->id = $id;
		if (!$this->VehicleCategory->exists()) {
			throw new NotFoundException(__('Invalid Vehicle Category'));
		}
		$this->set('Vehiclecategory', $this->VehicleCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->VehicleCategory->create();
			if ($this->VehicleCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The Vehicle category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Vehicle category could not be saved. Please, try again.'));
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
		$this->VehicleCategory->id = $id;
		if (!$this->VehicleCategory->exists()) {
			throw new NotFoundException(__('Invalid Vehicle category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->VehicleCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The Vehicle category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Vehicle category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->VehicleCategory->read(null, $id);
		}
	}


	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->VehicleCategory->id = $id;
		if (!$this->VehicleCategory->exists()) {
			throw new NotFoundException(__('Invalid Vehicle category'));
		}
                $c=$this->VehicleCategory->Vehicle->find('count',array("conditions"=>array("category_id"=>$id)));
               
                if (0==$c) {
                    if ($this->VehicleCategory->delete()) {
                            $this->Session->setFlash(__('Vehicle Category deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Vehicle Category was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Vehicle Category was not deleted, because has Vehicles'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
        
} 
?>
