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

}
