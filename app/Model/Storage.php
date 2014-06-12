<?php
App::uses('AppModel', 'Model');
/**
 * Storage Model
 *
 * @property Project $Project
 */
class Storage extends AppModel {


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
	
	public function scanFtpStorage($ftp_server,$base_path,$username=null,$password=null){
	    
        $path           = '';
        $files          = array();
        $conn_id        = ftp_connect($ftp_server);
        $ftp_user_name  = $username;
        $ftp_user_pass  = $password;
        $login_result   = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);    
        $rawfiles       = ftp_rawlist($conn_id,$base_path,true);
        
        
        foreach ($rawfiles as $rawfile)
        {
            $info = preg_split("/[\s]+/", $rawfile, 9);
            
            if(isset($info[0]{0})){
                
                if($info[0]{0} == 'd')
                {
                    //Directory
                   
                }else{
                    
                    //File           
                    if (isset($info[8])){
                        $file = $this->_fileAnnotator($base_path,$path,$info);
                        array_push($files,$file);
                    }else{
                        $path = str_replace(':','',$info[0]);
                    }    
                    
                }
            }
        }
        ftp_close($conn_id);
        debug($files);
	}
	
	
	private function _fileAnnotator($base_path,$path,$file){
	    
        $fileRecord = array();   
        $tmp = str_replace($base_path.'/','',$path);
        $metadata = explode('/',$tmp);

        $fileRecord['date'] = $file[6] . ' ' . $file[5] . ' ' . $file[7];
        $fileRecord['name'] = $file[8];  
        $fileRecord['path'] = $path;  
        $fileRecord['tissue'] = $metadata[0];  
        $fileRecord['sample'] = $metadata[1];  
        $fileRecord['cell_type'] = $metadata[2];  
        $fileRecord['exp_type'] = $metadata[3];  
        
        
        $name = explode('.',$fileRecord['name']);
        
        if (preg_match('/\.gz/',$fileRecord['name'])){
            $fileRecord['gz'] = true;
            array_pop($name);
        };
        $fileRecord['ext'] =  array_pop($name);
        
        
        
        
        return $fileRecord; 
    
	}
	
	
	

}
