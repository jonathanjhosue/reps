<?php
App::uses('AppController', 'Controller');
/**
 
 */
class MeetingPointsController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
       public $layout = "admin";
    
	public function admin_index() {
                         
             $this->set('meetingPoints', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {       
                
		$this->MeetingPoint->id = $id;
		if (!$this->MeetingPoint->exists()) {
			throw new NotFoundException(__('Invalid Meeting Point'));
		}
		$this->set('meeting_point', $this->MeetingPoint->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
       
		if ($this->request->is('post')) {
			$this->MeetingPoint->create();
			if ($this->MeetingPoint->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting point has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meeting point could not be saved. Please, try again.'));
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
               
		$this->MeetingPoint->id = $id;
		if (!$this->MeetingPoint->exists()) {
			throw new NotFoundException(__('Invalid Meeting Point'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MeetingPoint->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting point has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meeting point could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MeetingPoint->read(null, $id);
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
		$this->MeetingPoint->id = $id;
		if (!$this->MeetingPoint->exists()) {
			throw new NotFoundException(__('Invalid meeting point'));
		}
		if ($this->MeetingPoint->delete()) {
			$this->Session->setFlash(__('Meeting Point Deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meeting Point was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
