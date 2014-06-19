<?php
App::uses('AppModel', 'Model');
/**
 * TagType Model
 *
 */
class TagType extends AppModel {

    public $validate = array(
        'name' => 'isUnique'
    );
    
    
    public $hasMany = array(
        'Tags' => array(
            'className' => 'Tags',
            'foreignKey' => 'tag_type_id',
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
