<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property Dataset $Dataset
 * @property Storage $Storage
 */
class Project extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'fields' => array(
                    'dir' => 'image_dir'
                ),
                'thumbnailSizes' => array(
                        'xvga' => '1024x768',
                        'vga' => '848w',
                        'thumb' => '370x180'
                ),
                'thumbnailMethod' => 'php'
            )
        )
    );


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Dataset' => array(
			'className' => 'Dataset',
			'foreignKey' => 'project_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Storage' => array(
			'className' => 'Storage',
			'foreignKey' => 'project_id',
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
	
	
	
	

}
