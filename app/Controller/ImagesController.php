<?php
App::uses('AppController', 'Controller');
App::import('Model', 'TiposGlobal'); 
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
    
    public $layout = "admin";
    
    
	public function admin_index($type=null) {
		$this->Image->recursive = 0;
                $options=array();
                if ($type != null)
                    {
                    $options=array('owner_type'=>$type);
                    //$table=$type==TiposGlobal::PRODUCT_TYPE_HOTEL?'Hotel':$type==TiposGlobal::PRODUCT_TYPE_ACTIVITY?'Activity':'Product';
                    $this->Image->bindModel(array('belongsTo' => array('Product'=>array('foreignKey'=>'owner_id')))); 
                    }
                       
		$this->set('images', $this->paginate($options));
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
                $this->Image->bindModel(array('belongsTo' => array('Product'=>array('foreignKey'=>'owner_id')))); 
		$this->set('image', $this->Image->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
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
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
			}
		} else {
                    $this->Image->bindModel(array('belongsTo' => array('Product'=>array('foreignKey'=>'owner_id'))));
			$this->request->data = $this->Image->read(null, $id);
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
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('Image deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
