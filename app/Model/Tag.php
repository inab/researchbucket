<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Dataset $Dataset
 */
class Tag extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed


    public $belongsTo = array(
		'TagType' => array(
			'className' => 'TagType',
			'foreignKey' => 'tag_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
        'DatasetsTag' => array(
            'className' => 'DatasetsTag',
            'foreignKey' => 'tag_id',
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



/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Dataset' => array(
			'className' => 'Dataset',
			'joinTable' => 'datasets_tags',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'dataset_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);


    /**
     * Overridden paginate method - group by week, away_team_id and home_team_id
     */
    public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
        $recursive = -1;
        $results = array();
        
                      
        $results = $this->query('select * from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id and d.id = dt.dataset_id and d.project_id = 2 and t.name != "-" ORDER BY t.tag_type_id LIMIT '.(($page*$limit)-$limit).', '.$limit);

        //debug($results);

        return $results;
       
    }
    
    
    /**
     * Overridden paginateCount method
     */
       public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
        
        $results = array();
        
        $results = $this->query('select count(*) as count from tags t, datasets_tags dt, datasets d where t.id = dt.tag_id and d.id = dt.dataset_id and d.project_id =2 and t.name != "-"');

        return $results[0][0]['count'];
    }


}
