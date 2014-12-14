<?php
class PackageCategoriesController extends AppController
{
	var $name = 'PackageCategories';
       // var $scaffold;

        public $layout = "admin";
        
	
                function index()
	{
            $packagecategories = $this->paginate();
            if (isset($this->params['requested'])) {
                return $packagecategories;
            } else {
                $this->set(compact('$packagecategories'));
            }
        }
        
         
    
    
	public function admin_index() {
		$this->PackageCategory->recursive = 0;
                $this->set('packagecategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->PackageCategory->id = $id;
		if (!$this->PackageCategory->exists()) {
			throw new NotFoundException(__('Invalid package category'));
		}
		$this->set('packagecategory', $this->PackageCategory->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
            
		if ($this->request->is('post')) {
			$this->PackageCategory->create();
			if ($this->PackageCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The package category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package category could not be saved. Please, try again.'));
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
		$this->PackageCategory->id = $id;
		if (!$this->PackageCategory->exists()) {
			throw new NotFoundException(__('Invalid package category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PackageCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The package category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The package category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PackageCategory->read(null, $id);
		}
	}


	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->PackageCategory->id = $id;
		if (!$this->PackageCategory->exists()) {
			throw new NotFoundException(__('Invalid package category'));
		}
                $c=$this->PackageCategory->Package->find('count',array("conditions"=>array("package_category_id"=>$id)));
               
                if (0==$c) {
                    if ($this->PackageCategory->delete()) {
                            $this->Session->setFlash(__('Package Category deleted'));
                            $this->redirect(array('action' => 'index'));
                    }
                    else{
                          $this->Session->setFlash(__('Package Category was not deleted'));
                    }
                }
                else{
                    $this->Session->setFlash(__('Package Category was not deleted, because has Packages'));
                }
		
		$this->redirect(array('action' => 'index'));
	}
        
} 
?>
