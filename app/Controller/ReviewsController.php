<?php
App::uses('AppController', 'Controller');
/**
 * Reviews Controller
 *
 * @property Review $Review
 */
class ReviewsController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
    public $layout = "admin";
    
	public function admin_index($type=null) {
            
             $this->Review->recursive = 0;
             $conditions=array();
                if ($type != null)
                    {
                    $conditions=array('owner_type'=>$type);
                    }
		$this->set('reviews', $this->paginate($conditions));
   
		
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
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		$this->set('review', $this->Review->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add($productId = null) {
            
             $this->helpers[] = 'I18nKeys';
            $this->helpers[] = 'RipsWeb';
            
		if ($this->request->is('post')) {
			$this->Review->create();
			if ($this->Review->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The review has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
			}
		}
                else {
                    $this->request->data['Review']['product_id']=$productId;
                            }
		$products = $this->Review->Product->find('list');
		$this->set(compact('products'));
             
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
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Review->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The review has been saved'));
                                $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Review->read(null, $id);
		}
		$products = $this->Review->Product->find('list');
		$this->set(compact('products'));
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
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		if ($this->Review->delete()) {
			$this->Session->setFlash(__('Review deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Review was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
