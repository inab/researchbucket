<?php
App::uses('AppController', 'Controller');
/**
 * Vocabularies Controller
 *
 * @property Vocabulary $Vocabulary
 * @property PaginatorComponent $Paginator
 */
class VocabulariesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter(){
	    parent::beforeFilter();
        $this->layout = 'bootstrap';
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vocabulary->recursive = 0;
		$this->set('vocabularies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vocabulary->exists($id)) {
			throw new NotFoundException(__('Invalid vocabulary'));
		}
		$options = array('conditions' => array('Vocabulary.' . $this->Vocabulary->primaryKey => $id));
		$this->set('vocabulary', $this->Vocabulary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vocabulary->create();
			if ($this->Vocabulary->save($this->request->data)) {
				$this->Session->setFlash(__('The vocabulary has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocabulary could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vocabulary->exists($id)) {
			throw new NotFoundException(__('Invalid vocabulary'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vocabulary->save($this->request->data)) {
				$this->Session->setFlash(__('The vocabulary has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocabulary could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Vocabulary.' . $this->Vocabulary->primaryKey => $id));
			$this->request->data = $this->Vocabulary->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vocabulary->id = $id;
		if (!$this->Vocabulary->exists()) {
			throw new NotFoundException(__('Invalid vocabulary'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vocabulary->delete()) {
			$this->Session->setFlash(__('The vocabulary has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The vocabulary could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
