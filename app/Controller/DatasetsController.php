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
		
		$organisms = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>3)));
		$this->set('organisms',$organisms);
		
		$tissues = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>26),'order'=>array('Tag.name'=>'asc')));
		$this->set('tissues',$tissues);
		
		$celltypes = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>25),'order'=>array('Tag.name'=>'asc')));
		$this->set('celltypes',$celltypes);
		
		$experiments = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>21),'order'=>array('Tag.name'=>'asc')));
		$this->set('experiments',$experiments);
		
		$diseases = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>22),'order'=>array('Tag.name'=>'asc')));
		$this->set('diseases',$diseases);
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
		
		$tissues = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>26),'order'=>array('Tag.name'=>'asc')));
		$this->set('tissues',$tissues);
		
		$celltypes = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>25),'order'=>array('Tag.name'=>'asc')));
		$this->set('celltypes',$celltypes);
		
		$experiments = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>21),'order'=>array('Tag.name'=>'asc')));
		$this->set('experiments',$experiments);
		
		$diseases = $this->Dataset->Tag->find('list',array('conditions'=>array('Tag.tag_type_id'=>22),'order'=>array('Tag.name'=>'asc')));
		$this->set('diseases',$diseases);

		
		
	}
	
	
	
	public function updateList(){
	
	    Controller::loadModel('Storage');
	    Controller::loadModel('TagType');
	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
		$pid = $this->request->params['named']['pid'];
		
		$project = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));

		$datasets = array();
		foreach ($project['Storage'] as $s){
    	    if($s['url'] && $s['path']){

    	       $data = $this->Storage->scanFtpStorage($s['type'],$s['url'],$s['path'],$s['username'],$s['password']);

    	       //Save new attributes
    	       foreach ($data['attributes'] as $a){
        	       
        	       $this->TagType->set(array('name'=>$a));
                   if($this->TagType->validates()){
                      $this->TagType->create(); 
                      $this->TagType->save(array('name'=>$a)); 
                   }
    	       }    	              	   
        	   $current_tag_types = $this->TagType->find('list');
        	   $current_tags = $this->Dataset->Tag->find('all',array('fields'=>array('Tag.id','Tag.tag_type_id','Tag.name','TagType.name'),'recursive'=>-1,'contain'=>array('TagType')));
        	   //debug($current_tags); 
        	   
        	  $n = 0;
        	  foreach ($data['datasets'] as $d){
            	  
            	  // FILE attribute is mandatory 
                  if(isset($d['FILE']) && isset($d['FILE_MD5']) ){
                  
                       $dataset = array('file'=>$d['FILE'],'md5'=>$d['FILE_MD5'],'file_size'=>$d['FILE_SIZE'],'project_id'=>$pid);
                       
                       $this->Dataset->set($dataset);
                       if($this->Dataset->validates()){
                          $this->Dataset->create(); 
                          $this->Dataset->save($dataset); 
                       }
                       
                       // Save tags 
                       if(isset($this->Dataset->id) && $this->Dataset->id){
                            
                            $did = $this->Dataset->id;
                            
                            foreach ($d as $k=>$v){
                                
                                if ($k != 'FILE' && $k != 'FILE_MD5' && $k != 'FILE_SIZE'){
                                
                                    $tagkey = null;
                                    
                                    foreach ($current_tags as $ct){
                                        if ($k == $ct['TagType']['name'] && $v == $ct['Tag']['name']){
                                            $tagkey = $ct['Tag']['id'];
                                        }
                                    }
                                    
                                    //Tag already exists create association and go on
                                    if($tagkey){
                                        $this->Dataset->DatasetsTag->create();
                                        $this->Dataset->DatasetsTag->save(array('dataset_id'=>$did,'tag_id'=>$tagkey));  
                                    }else{
                                        
                                        //Check tagtype
                                        $tagtype = array_search($k, $current_tag_types);
                                        if($tagtype){
                                            
                                            $this->Dataset->Tag->saveAll(array('Dataset'=>array('id'=>$did),'Tag'=>array('tag_type_id'=>$tagtype,'name'=>$v)));                                       
                                            array_push($current_tags,array('TagType'=>array('id'=>$tagtype,'name'=>$current_tag_types[$tagtype]),'Tag'=>array('id'=>$this->Dataset->Tag->id,'tag_type_id'=>$tagtype,'name'=>$v)));
                                        }
                                        
                                    }
                                }

                            }    
                       }
                  }
                  $n++;
        	  } 
        	   
     	    }	
		}		
    	$this->redirect(array('controller'=>'datasets','action'=>'getList','pid'=>$pid));
	}
	
	
	
	public function getList() {

        $this->layaout = 'ajax';
	    if (!$this->request->params['named']['pid'] || !$this->Dataset->Project->exists($this->request->params['named']['pid'])) {
			throw new NotFoundException(__('Invalid project'));
		}
	    $pid    = $this->request->params['named']['pid'];
	    $tags   = (isset($this->request->query['tags']))?$this->request->query['tags']:array();

        $clean_tags = array();
		$filtered_datasets = array();
	    
	    $project = $this->Dataset->Project->find('first',array('conditions'=>array('id'=>$pid)));
        $clean_tags = array_values(array_filter($tags));

		
        $conditions = array();
        $conditions['Dataset.project_id'] = $pid;
        
        if (count($clean_tags)){           
            $conditions['Tag.id'] = $clean_tags;  
        }    
        
        $filtered_datasets  = $this->paginate('Dataset',$conditions); 		
		
		$this->set('project',$project);
		$this->set('datasets', $filtered_datasets);
		
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
        
        $filtered_datasets  = $this->paginate('Dataset',$conditions);   
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
