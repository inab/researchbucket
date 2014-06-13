<?php
App::uses('AppController', 'Controller');
/**
 * DatasetsTags Controller
 *
 * @property DatasetsTag $DatasetsTag
 * @property PaginatorComponent $Paginator
 */
class DatasetsTagsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DatasetsTag->recursive = 0;
		$this->set('datasetsTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DatasetsTag->exists($id)) {
			throw new NotFoundException(__('Invalid datasets tag'));
		}
		$options = array('conditions' => array('DatasetsTag.' . $this->DatasetsTag->primaryKey => $id));
		$this->set('datasetsTag', $this->DatasetsTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DatasetsTag->create();
			if ($this->DatasetsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The datasets tag has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The datasets tag could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$datasets = $this->DatasetsTag->Dataset->find('list');
		$tags = $this->DatasetsTag->Tag->find('list');
		$this->set(compact('datasets', 'tags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DatasetsTag->exists($id)) {
			throw new NotFoundException(__('Invalid datasets tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DatasetsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The datasets tag has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The datasets tag could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('DatasetsTag.' . $this->DatasetsTag->primaryKey => $id));
			$this->request->data = $this->DatasetsTag->find('first', $options);
		}
		$datasets = $this->DatasetsTag->Dataset->find('list');
		$tags = $this->DatasetsTag->Tag->find('list');
		$this->set(compact('datasets', 'tags'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DatasetsTag->id = $id;
		if (!$this->DatasetsTag->exists()) {
			throw new NotFoundException(__('Invalid datasets tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DatasetsTag->delete()) {
			$this->Session->setFlash(__('The datasets tag has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The datasets tag could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
