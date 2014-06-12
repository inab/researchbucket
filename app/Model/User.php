<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
    
    public function linkedin_signin($response){
        
        if (!isset($response['auth']['uid'])){
            return false;
        }
        
        $registered_user = $this->find('first',array('conditions'=>array('User.email' => $response['auth']['info']['email'])));
        
        $user = array();
        
        if (isset($registered_user['User']['id'])){
            $user['id'] = $registered_user['User']['id']; 
        }
        
        $user['firstname']      = $response['auth']['info']['first_name'];
        $user['lastname']       = $response['auth']['info']['last_name'];
        $user['linkedin_image'] = $response['auth']['info']['image'];
        
        $this->save($user);
        return $user;
    }
}
