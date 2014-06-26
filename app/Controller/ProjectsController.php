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
		$conditions = array();
		if(Configure::read('demomode')=='rdconnect'){
    		$conditions = array('Project.id'=>array(2,4,5));
		}
		
		$this->set('projects', $this->Paginator->paginate($conditions));
	}
 
 
 
	public function getlist() {
	    $this->layout = 'ajax';
		$this->Project->recursive = -1;
		$conditions = array();
		if(Configure::read('demomode')=='rdconnect'){
    		$conditions = array('Project.id'=>array(2,4,5));
		}
		
		$this->set('projects', $this->Paginator->paginate($conditions));
	}
	
	public function toolGenomicVariants($id=null){
    	
    	Controller::loadModel('Dlatmr');
    	if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$project = $this->Project->find('first',array('recursive'=>-1,'conditions'=>array('id'=>$id)));
		$this->set('project',$project);
		
		
        $all = $this->Dlatmr->find('all');
		
		debug($all);
	}
	
	
	public function getGenomicVariantExperiments($id) {
	    $this->layout = 'ajax';
		$datasets = $this->Project->Dataset->find('all',array('recursive'=>-1,'conditions'=>array('project_id'=>$id),'contain'=>array('Tag'=>array('conditions'=>array('Tag.id'=>14)))));
		$this->set('genomicVariantExperiments',count($datasets));
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
		
		$cell_types = $this->Project->query('select t.id, t.name from tag_types tp, tags t where tp.name= \'CELL_TYPE\' AND tp.id = t.tag_type_id AND t.id IN (select t.id from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id AND dt.dataset_id = d.id AND d.project_id ='.$id.') ORDER BY t.name');
        
        $this->set('cell_types',$cell_types);
		
	}
	
	public function reportContentCellType($id = null) {
	
	
	    if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));


        $cell_type = str_replace('#cell_type_','',$this->request->query['cell_type']);
  		
  		
  		$datasets = $this->Project->query('select d.id from datasets d, datasets_tags dt where d.id = dt.dataset_id and dt.tag_id = '.$cell_type.' and d.project_id='.$id);
  		
  		$datasets_keys = array();
  		foreach ($datasets as $d){
      		array_push($datasets_keys,$d['d']['id']);
  		}
  		
		$datasets = $this->Project->Dataset->find('all',array('recursive'=>-1,'conditions'=>array('Dataset.project_id'=>$id,'Dataset.id'=>$datasets_keys),'contain'=>array('Tag')));
		
		//debug($datasets);
		$experiments = array();
		
		foreach ($datasets as $d){
		    
		    $exp_key = null;
		    $sex_key = null;
		    
		    foreach ($d['Tag'] as $t){
    		    
    		    if ($t['tag_type_id'] == 21){
            	    if (!array_key_exists($t['name'], $experiments)){
                	    $experiments[$t['name']] = array();
                	    
            	    }
            	    $exp_key = $t['name'];
        	    }
        	    
        	     if ($t['tag_type_id'] == 30){
        	     
        	        if (!array_key_exists($t['name'], $experiments[$exp_key])){
                	    $experiments[$exp_key][$t['name']] = array();
                	    
            	    }
            	    $sex_key = $t['name'];
        	     }
        	    
		    }
		    if ($exp_key){
		        array_push($experiments[$exp_key][$sex_key],$d);
		    }
		    
		    
    	    	
    		
		}
		//debug($experiments);
        $this->set('experiments',$experiments);	
	
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
