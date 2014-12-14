<?php
class HotelCategoriesController extends AppController
{
	var $name = 'HotelCategories';
       // var $scaffold;

        public $layout = "admin";
        
	
                function index()
	{
            $hotelcategories = $this->paginate();
            if (isset($this->params['requested'])) {
                return $hotelcategories;
            } else {
                $this->set(compact('$hotelcategories'));
            }
        }
        
         
    
    
	public function admin_index() {
		$this->HotelCategory->recursive = 0;
                $this->set('hotelcategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->HotelCategory->id = $id;
		if (!$this->HotelCategory->exists()) {
			throw new NotFoundException(__('Invalid hotel category'));
		}
		$this->set('hotelcategory', $this->HotelCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->HotelCategory->create();
			if ($this->HotelCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The hotel category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotel category could not be saved. Please, try again.'));
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
		$this->HotelCategory->id = $id;
		if (!$this->HotelCategory->exists()) {
			throw new NotFoundException(__('Invalid hotel category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The hotel category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hotel category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->HotelCategory->read(null, $id);
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
		$this->HotelCategory->id = $id;
		if (!$this->HotelCategory->exists()) {
			throw new NotFoundException(__('Invalid hotel category'));
		}
                $c=$this->HotelCategory->Hotel->find('count',array("conditions"=>array("hotel_category_id"=>$id)));
               
                if (0==$c) {
                    if ($this->HotelCategory->delete()) {
                            $this->Session->setFlash(__('Hotel Category deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Hotel Category was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Hotel Category was not deleted, because has Hotels'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
        
} 
?>
