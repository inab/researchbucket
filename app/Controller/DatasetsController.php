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
	    parent::beforeFilter();
        $this->layout = 'bootstrap';
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {

	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
	
	    $pid = $this->request->params['named']['pid'];
	    $project = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));
		$this->set('project',$project);
	}
	
	
	public function exploreDatasets() {

	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
	
	    $pid = $this->request->params['named']['pid'];
	    $project = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));
		$this->set('project',$project);
		
		$organisms = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>3)));
		$this->set('organisms',$organisms);
		
		$tissues = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>1)));
		$this->set('tissues',$tissues);
		
		$celltypes = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>4)));
		$this->set('celltypes',$celltypes);
		
		$experiments = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>7)));
		$this->set('experiments',$experiments);

		
		
	}
	
	
	
	public function updateList(){
	
	    Controller::loadModel('Storage');
	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
		$pid = $this->request->params['named']['pid'];
		
		$project = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));

		$datasets = array();
		foreach ($project['Storage'] as $s){
    	    if($s['url'] && $s['path'] && $s['username'] && $s['password']){
    	    

    	       $datasets = $this->Storage->scanFtpStorage($s['url'],$s['path'],$s['username'],$s['password']);
    	       debug($datasets);
    	       
        	   
        	   
        	   /*
foreach($files as $f){
            	   $record = $this->Dataset->annotateFile($f,$pid);
            	   
            	   $e_dataset = $this->Dataset->find('first',array('recursive'=>-1,'conditions'=>array('Dataset.name'=>$record['Dataset']['name'])));
            	   $did = null;
            	   if ($e_dataset){
                	   $did = $e_dataset['Dataset']['id'];
            	   }else{
            	      $this->Dataset->create();
            	      $this->Dataset->save($record['Dataset']);
            	      $did = $this->Dataset->id;
            	   }   
            	               	   
            	   if ($this->Dataset->id){
                	   foreach ($record['Tag'] as $t){
                            
                            
                            $e_tag = $this->Dataset->Tag->find('first',array('recursive'=>-1,'conditions'=>array('Tag.name'=>$t['name'])));
                            $tid = null;
                            if ($e_tag){
                            	   $tid = $e_tag['Tag']['id'];
                        	}else{
                        	      $this->Dataset->Tag->create();
                        	      $this->Dataset->Tag->save($t);
                        	      $tid = $this->Dataset->Tag->id;
                        	}
                        	$join_record = array('DatasetsTag'=>array('dataset_id'=>$did,'tag_id'=>$tid)); 
                            $this->Dataset->DatasetsTag->create();
                            $this->Dataset->DatasetsTag->save($join_record);  	   
                	   }
            	   }
        	   }
*/
    	    }	
		}		
    	$this->redirect(array('controller'=>'datasets','action'=>'getList','pid'=>$pid));
	}
	
	
	
	public function getList() {

        $this->layaout = 'ajax';
	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
	
	    $pid = $this->request->params['named']['pid'];
	    $project = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));
	    
		$this->Dataset->recursive = 1;
		$this->set('project',$project);
		$this->set('datasets', $this->Paginator->paginate(array('project_id'=>$pid)));
		
	}
	
	
	public function getPublicList() {        


     


        $this->layaout = 'ajax';
	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
		$pid        = $this->request->params['named']['pid'];
		$tags       = (isset($this->request->query['tags']))?$this->request->query['tags']:array();
		
		$clean_tags = array();
		$filtered_datasets = array();
		
	    $project    = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));
        $clean_tags = array_values(array_filter($tags));
        
        
        $conditions = array();
        $conditions['Dataset.project_id'] = $pid;
        
        if (count($clean_tags)){           
            $conditions['Tag.id'] = $clean_tags;  
        }    
        
        
        
        $datasets  = $this->paginate('Dataset',$conditions);
        
        
        
        if (count($clean_tags)){               
            
            foreach ($datasets as $d){
                if(count($d['Tag']) == count($clean_tags)){
                    array_push($filtered_datasets, $d);
                }   
            }    
        }else{
            $filtered_datasets  = $datasets;  
        }    
       
       
        


        $included = array();
        
		$this->set('project',$project);
		$this->set('datasets', $filtered_datasets);
		
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
