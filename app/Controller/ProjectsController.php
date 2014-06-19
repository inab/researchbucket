<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 */
class ProjectsController extends AppController {

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
		$this->Project->recursive = -1;
		$this->set('projects', $this->Paginator->paginate());
	}
 
 
 
	public function getlist() {
	    $this->layout = 'ajax';
		$this->Project->recursive = -1;
		$this->set('projects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
		
		$statistics = $this->Project->query('select tp.name as skey, count(t.id) as scount from tag_types tp, tags t where tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') group by tp.id;');

        $kpis = array();
        foreach ($statistics as $s){
            $kpis[$s['tp']['skey']] = $s[0]['scount'];
        }

        //debug($kpis);
        $this->set('kpis',$kpis);		
		
	}
	
	public function reportExperiment($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
		
		$statistics = $this->Project->query('select tp.name as skey, count(t.id) as scount from tag_types tp, tags t where tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') group by tp.id;');

        $kpis = array();
        foreach ($statistics as $s){
            $kpis[$s['tp']['skey']] = $s[0]['scount'];
        }

        //debug($kpis);
        $this->set('kpis',$kpis);		
		
	}
	
	public function reportDonor($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
		
		$statistics = $this->Project->query('select tp.name as skey, count(t.id) as scount from tag_types tp, tags t where tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') group by tp.id;');

        $kpis = array();
        foreach ($statistics as $s){
            $kpis[$s['tp']['skey']] = $s[0]['scount'];
        }

        //debug($kpis);
        $this->set('kpis',$kpis);		
		
	}
	
	public function reportSample($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
		
		$statistics = $this->Project->query('select tp.name as skey, count(t.id) as scount from tag_types tp, tags t where tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') group by tp.id;');

        $kpis = array();
        foreach ($statistics as $s){
            $kpis[$s['tp']['skey']] = $s[0]['scount'];
        }

        //debug($kpis);
        $this->set('kpis',$kpis);		
		
	}
	
	public function reportTissue($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
		
		$statistics = $this->Project->query('select tp.name as skey, count(t.id) as scount from tag_types tp, tags t where tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') group by tp.id;');

        $kpis = array();
        foreach ($statistics as $s){
            $kpis[$s['tp']['skey']] = $s[0]['scount'];
        }

        //debug($kpis);
        $this->set('kpis',$kpis);		
		
	}
	
	public function reportCellType($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
		
		$statistics = $this->Project->query('select tp.name as skey, count(t.id) as scount from tag_types tp, tags t where tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') group by tp.id;');

        $kpis = array();
        foreach ($statistics as $s){
            $kpis[$s['tp']['skey']] = $s[0]['scount'];
        }

        //debug($kpis);
        $this->set('kpis',$kpis);		
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller'=>'projects','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Project->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller'=>'projects','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
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
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('The project has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The project could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
