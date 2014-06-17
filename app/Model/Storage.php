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
        $rawfiles       = ftp_rawlist($conn_id,$base_path,false);
        
        $datasets = array();
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
                        if(preg_match('/.index/',$file['name'])){
                            array_push($files,$file);
                        }
                    }else{
                        $path = str_replace(':','',$info[0]);
                    }        
                }
            }
        }
        foreach ($files as $f){
            $datasets = array_merge($datasets,$this->getDatasets($conn_id,$f));
        }
        
        ftp_close($conn_id);
        return $datasets;
        
	}
	
	private function getDatasets($conn_id,$file){
       
       if (ftp_get($conn_id, TMP.'uploads/'.$file['name'],$file['path'].$file['name'], FTP_BINARY)) {
       
        
            $fh = fopen(TMP.'uploads/'.$file['name'],'r');
            $i = 0;
            $attributes = array();
            while ($line = fgets($fh)) {
               $data = explode("\t",$line);
               if($i==0){
                   $attributes = array_merge($attributes,$data);
               }else{
                   
               }
               
               $i++;
               //debug($data);
            }
            fclose($fh);
            
            debug(array_unique($attributes)); 
       
       } else {
            
       }
       return array(); 	
	}
	
	
	
	private function _fileAnnotator($base_path,$path,$file){
	    
        $fileRecord = array();   
        $tmp = str_replace($base_path.'/','',$path);

        $fileRecord['date'] = $file[6] . ' ' . $file[5] . ' ' . $file[7];
        $fileRecord['name'] = $file[8];  
        $fileRecord['path'] = $base_path;       
        
        return $fileRecord; 
    
	}
	
	
	

}
