<?php
class ActivityTypesController extends AppController
{
	var $name = 'ActivityTypes';
        var $scaffold;
        var $layout='admin';

	/*============BEGINS USER METHODS===================*/
	
	
        
        function index()
	{
            $activityTypes = $this->paginate();
            if (isset($this->params['requested'])) {
                return $activityTypes;
            } else {
                $this->set(compact('$activityTypes'));
            }
        }
        
          
	
	
        public function admin_index() {
		$this->ActivityType->recursive = 0;
                $this->set('activitytypes', $this->paginate());
	}

    
/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ActivityType->id = $id;
		if (!$this->ActivityType->exists()) {
			throw new NotFoundException(__('Invalid Activity Type'));
		}
		$this->set('activitytype', $this->ActivityType->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->ActivityType->create();
			if ($this->ActivityType->save($this->request->data)) {
				$this->Session->setFlash(__('The Activity Type has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Activity Type could not be saved. Please, try again.'));
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
		$this->ActivityType->id = $id;
		if (!$this->ActivityType->exists()) {
			throw new NotFoundException(__('Invalid Activity Type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ActivityType->save($this->request->data)) {
				$this->Session->setFlash(__('The Activity Type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Activity Type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ActivityType->read(null, $id);
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
		$this->ActivityType->id = $id;
		if (!$this->ActivityType->exists()) {
			throw new NotFoundException(__('Invalid Activity Type'));
		}
                $c=$this->ActivityType->Activity->find('count',array("conditions"=>array("activity_type_id"=>$id)));
               
                if (0==$c) {
                    if ($this->ActivityType->delete()) {
                            $this->Session->setFlash(__('Activity Type deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Activity Type was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Activity Type was not deleted, because has Activities'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
    
        
        
        function view($id=null)
	{
            //$activitytype = $this->ActivityType->read();
            
            $this->ActivityType->id = $id;
	    $activitytype = $this->ActivityType->read();
            if (isset($this->params['requested'])) {
                return $activitytype;
            } else {
                $this->set(compact('$activitytype'));
            }
	}
} 
?>

