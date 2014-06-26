<?php
App::uses('AppModel', 'Model');
/**
 * Dataset Model
 *
 * @property Project $Project
 */
class Dataset extends AppModel {
    
  	//The Associations below have been created with all possible keys, those that are not needed can be removed
  	public $validate = array(
        'md5' => 'isUnique'
    );
  	

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	public $hasMany = array(
        'DatasetsTag' => array(
            'className' => 'DatasetsTag',
            'foreignKey' => 'dataset_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );    
	
	
	public $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'datasets_tags',
            'foreignKey' => 'dataset_id',
            'associationForeignKey' => 'tag_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
     );   
	
	public function annotateFile($file,$pid){
	    
        $record = array();  
        
        $path_tags = explode('/',$file['path']);
        $name_tags = explode('.',$file['name']);      
        $tags      = array_unique(array_filter(array_merge($path_tags,$name_tags)));
        
        $record['Dataset']['name']          = $file['name'];
        $record['Dataset']['project_id']    = $pid;
        $record['Tag'] = array();
        
        foreach ($tags as $t){
            array_push($record['Tag'], array('name'=>$t));
        }   
        
        return $record; 
    
	}
	
	
	/**
     * Overridden paginate method - group by week, away_team_id and home_team_id
     */
    public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
        $recursive = -1;
        $results = array();
        
        if(array_key_exists('Tag.id',$conditions)){
                       
            $results = $this->query('SELECT d.id,d.file,GROUP_CONCAT(t.name) as tags FROM datasets d, datasets_tags dt, tags t WHERE d.id = dt.dataset_id AND t.id = dt.tag_id AND  dt.tag_id IN('.implode(',',$conditions['Tag.id']).') AND d.project_id='.$conditions['Dataset.project_id'].' GROUP BY d.id HAVING COUNT(DISTINCT dt.tag_id) = '.count($conditions['Tag.id']).' LIMIT '.(($page*$limit)-$limit).', '.$limit);
            
        }else{
        
            $results = $this->query('SELECT d.id,d.file,GROUP_CONCAT(t.name) as tags FROM datasets d, datasets_tags dt,tags t WHERE d.id = dt.dataset_id AND t.id = dt.tag_id AND d.project_id='.$conditions['Dataset.project_id'].' GROUP BY d.id LIMIT '.$limit);

        }
        //debug($results);

        return $results;
       
    }
    
    
    /**
     * Overridden paginateCount method
     */
       public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
        
        $results = array();
        
        if(array_key_exists('Tag.id',$conditions)){
            
            $results = $this->query('SELECT count(*) as count FROM datasets d, datasets_tags dt,tags t WHERE d.id = dt.dataset_id AND t.id = dt.tag_id AND dt.tag_id IN('.implode(',',$conditions['Tag.id']).') AND d.project_id='.$conditions['Dataset.project_id'].' GROUP BY d.id HAVING COUNT(DISTINCT dt.tag_id) = '.count($conditions['Tag.id']));
            
        }else{
           $results = $this->query('SELECT count(*) as count FROM datasets d, datasets_tags dt,tags t WHERE d.id = dt.dataset_id AND t.id = dt.tag_id AND d.project_id='.$conditions['Dataset.project_id']);
        }
        return $results[0][0]['count'];
    }
	
	

}
