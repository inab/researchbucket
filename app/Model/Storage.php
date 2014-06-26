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
	
	public function scanFtpStorage($type,$ftp_server,$base_path,$username=null,$password=null){
	    
        
	    
        $path           = '';
        $files          = array();
        $rawfiles       = array();
        $datasets       = array();
        $attributes     = array();
        

        $ftp_user_name  = trim($username);
        $ftp_user_pass  = trim($password);

        
        if($type == 0){
            $login_result =  null;
            $conn_id        = ftp_connect($ftp_server)  or die ("could not connect");

            if($ftp_user_name and $ftp_user_name){
                $login_result   = ftp_login($conn_id, $ftp_user_name, $ftp_user_name);
            }else{
                $login_result   = ftp_login($conn_id,'anonymous',''); 
            }
            
            $rawfiles       = ftp_rawlist($conn_id,$base_path,false);   
            
         
            if ($rawfiles){
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
                
                //debug($files);
                foreach ($files as $file){
                    
                    if (ftp_get($conn_id, TMP.'uploads/'.$file['name'],$file['path'].$file['name'], FTP_BINARY)) {
                        
                        $result = $this->getDatasets($file);
                        
                        if($result){
                            $attributes = array_merge($attributes,array_values($result['attributes']));
                            
                            $datasets = array_merge($datasets,$result['datasets']);
                        }
                    
                    }                    
                }
            }
            ftp_close($conn_id); 
            
        }elseif($type == 1){
        
            $sftp = new Net_SFTP($ftp_server);
            if (!$sftp->login($ftp_user_name, $ftp_user_pass)) {
                exit('Login Failed');
            }
            $sftp->chdir($base_path);
            $rawfiles = $sftp->rawlist();
            
            foreach ($rawfiles as $k=>$v){
                if (preg_match('/.index/',$k)){
                
                    $tmp = array('name'=>$k,'path'=>$base_path);
                
                    array_push($files,$tmp);
                }
            }
            
            foreach ($files as $file){
                //debug($file['name']);
                if($sftp->get($file['name'],TMP.'uploads/'.$file['name'])){
                    //debug($sftp->getSFTPLog());   
                    $result = $this->getDatasets($file);
                    
                    if($result){
                        $attributes = array_merge($attributes,array_values($result['attributes']));
                        
                        $datasets = array_merge($datasets,$result['datasets']);
                    }
                
                } 
                //debug($result);                   
            }
            //debug($files);
        }
        
        //debug($attributes);
      
        return array('attributes'=>array_unique($attributes),'datasets'=>$datasets);
        
	}
	
	private function getDatasets($file){

        $i = 0;
        $attributes = array();
        $rows = array();
        
         
        $input = file_get_contents(TMP.'uploads/'.$file['name']); 
        
        $encoding = mb_detect_encoding( $input,'UTF-8',true);

        if( $encoding !== "UTF-8" ) {
            $input = mb_convert_encoding( $input, "UTF-8");
        }

        foreach( explode( PHP_EOL, $input ) as $line ) {

           $data = explode("\t",$line);
           if($i==0){
               $attributes  = array_map('strtoupper', $data);
               $attributes  = array_map('trim', $attributes);
           }else{
               if(isset($data[0])){
               
                   /*  Map attributes */
                   $new_line = array();
                   foreach($data as $k=>$v){
                        $new_line[$attributes[$k]]=$v;    
                   } 
                   array_push($rows,$new_line);
               }
           }
           
           $i++;
           //debug($data);
        }
        return array('attributes'=>$attributes,'datasets'=>$rows); 	
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
