<?php
App::uses('AppController', 'Controller');
/**
 
 */
class IncludeNotesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
       public $layout = "admin";
    
	public function admin_index() {
            
             $this->IncludeNote->recursive = 1;
             $this->IncludeNote->setLocale($this->getLanguageOnly());
             $this->set('includeNotes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
               $this->helpers[] = 'I18nKeys';
                $this->helpers[] = 'RipsWeb';
		$this->IncludeNote->id = $id;
		if (!$this->IncludeNote->exists()) {
			throw new NotFoundException(__('Invalid Include Note'));
		}
		$this->set('include_note', $this->IncludeNote->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
            $this->helpers[] = 'I18nKeys';
            $this->helpers[] = 'RipsWeb';
            
		if ($this->request->is('post')) {
			$this->IncludeNote->create();
			if ($this->IncludeNote->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The include note has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The include note could not be saved. Please, try again.'));
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
               $this->helpers[] = 'I18nKeys';
            $this->helpers[] = 'RipsWeb';
		$this->IncludeNote->id = $id;
		if (!$this->IncludeNote->exists()) {
			throw new NotFoundException(__('Invalid Include Note'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IncludeNote->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The include note has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The include note could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->IncludeNote->read(null, $id);
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
		$this->IncludeNote->id = $id;
		if (!$this->IncludeNote->exists()) {
			throw new NotFoundException(__('Invalid include note'));
		}
		if ($this->IncludeNote->delete()) {
			$this->Session->setFlash(__('Include Note Deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Include note was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
