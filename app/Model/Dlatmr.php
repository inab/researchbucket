<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Dataset $Dataset
 */
class Dlatmr extends AppModel {

     public $actsAs = array('Elastic.Indexable');
     
     public $useDbConfig = 'index';
     public $useType = 'dlat.mr';
     public $useTable = false;   
     
     public $_mapping = array(
        'analysis_id' => array('type' => 'string'),
    );
     
     public function elasticMapping() {
        return $this->_mapping;
     }

}
