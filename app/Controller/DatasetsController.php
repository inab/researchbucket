<?php
App::uses('AppController', 'Controller');
/**
 * Datasets Controller
 *
 * @property Dataset $Dataset
 * @property PaginatorComponent $Paginator
 */
class DatasetsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter(){
        $this->layout = 'bootstrap';
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dataset->recursive = 0;
		$this->set('datasets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dataset->exists($id)) {
			throw new NotFoundException(__('Invalid dataset'));
		}
		$options = array('conditions' => array('Dataset.' . $this->Dataset->primaryKey => $id));
		$this->set('dataset', $this->Dataset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dataset->create();
			if ($this->Dataset->save($this->request->data)) {
				$this->Session->setFlash(__('The dataset has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dataset could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$projects = $this->Dataset->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dataset->exists($id)) {
			throw new NotFoundException(__('Invalid dataset'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dataset->save($this->request->data)) {
				$this->Session->setFlash(__('The dataset has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dataset could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Dataset.' . $this->Dataset->primaryKey => $id));
			$this->request->data = $this->Dataset->find('first', $options);
		}
		$projects = $this->Dataset->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dataset->id = $id;
		if (!$this->Dataset->exists()) {
			throw new NotFoundException(__('Invalid dataset'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Dataset->delete()) {
			$this->Session->setFlash(__('The dataset has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The dataset could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
