<?php
App::uses('AppController', 'Controller');
/**
 * RoomRates Controller
 *
 * @property RoomRate $RoomRate
 */
class RoomRatesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RoomRate->recursive = 0;
		$this->set('roomRates', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->RoomRate->id = $id;
		if (!$this->RoomRate->exists()) {
			throw new NotFoundException(__('Invalid room rate'));
		}
		$this->set('roomRate', $this->RoomRate->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RoomRate->create();
			if ($this->RoomRate->save($this->request->data)) {
				$this->Session->setFlash(__('The room rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room rate could not be saved. Please, try again.'));
			}
		}
		$rooms = $this->RoomRate->Room->find('list');
		$seasons = $this->RoomRate->Season->find('list');
		$this->set(compact('rooms', 'seasons'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->RoomRate->id = $id;
		if (!$this->RoomRate->exists()) {
			throw new NotFoundException(__('Invalid room rate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RoomRate->save($this->request->data)) {
				$this->Session->setFlash(__('The room rate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room rate could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RoomRate->read(null, $id);
		}
		$rooms = $this->RoomRate->Room->find('list');
		$seasons = $this->RoomRate->Season->find('list');
		$this->set(compact('rooms', 'seasons'));
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
		$this->RoomRate->id = $id;
		if (!$this->RoomRate->exists()) {
			throw new NotFoundException(__('Invalid room rate'));
		}
		if ($this->RoomRate->delete()) {
			$this->Session->setFlash(__('Room rate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Room rate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
