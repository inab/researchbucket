<?php
App::uses('AppModel', 'Model');
/**
 * DatasetsTag Model
 *
 * @property Dataset $Dataset
 * @property Tag $Tag
 */
class DatasetsTag extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Dataset' => array(
			'className' => 'Dataset',
			'foreignKey' => 'dataset_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
