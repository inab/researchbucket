<?php
App::uses('AppController', 'Controller');
/**
 * Storages Controller
 *
 * @property Storage $Storage
 * @property PaginatorComponent $Paginator
 */
class StoragesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter(){
        $this->layout = 'bootstrap';
        
        $urls = array();      
        $this->Storage->scanFtpStorage('ftp.1000genomes.ebi.ac.uk','/blueprint/data/homo_sapiens',$username='bp-raw-data',$password='s6adi3Zd');

    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Storage->recursive = 0;
		$this->set('storages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Storage->exists($id)) {
			throw new NotFoundException(__('Invalid storage'));
		}
		$options = array('conditions' => array('Storage.' . $this->Storage->primaryKey => $id));
		$this->set('storage', $this->Storage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Storage->create();
			if ($this->Storage->save($this->request->data)) {
				$this->Session->setFlash(__('The storage has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The storage could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$projects = $this->Storage->Project->find('list');
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
		if (!$this->Storage->exists($id)) {
			throw new NotFoundException(__('Invalid storage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Storage->save($this->request->data)) {
				$this->Session->setFlash(__('The storage has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The storage could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Storage.' . $this->Storage->primaryKey => $id));
			$this->request->data = $this->Storage->find('first', $options);
		}
		$projects = $this->Storage->Project->find('list');
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
		$this->Storage->id = $id;
		if (!$this->Storage->exists()) {
			throw new NotFoundException(__('Invalid storage'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Storage->delete()) {
			$this->Session->setFlash(__('The storage has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The storage could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	

}
