<?php
App::uses('AppModel', 'Model');
/**
 * Dataset Model
 *
 * @property Project $Project
 */
class Dataset extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
	
	

}
