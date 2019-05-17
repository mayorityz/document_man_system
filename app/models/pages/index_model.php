<?php
class Index_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function uploadFile($data, $file){
        // expected file types.
        $fileTypes = array('docx', 'doc', 'pdf');

        //  check file extension ...
        function getExtension($file){
            $split = explode('.', $file);
            // print_r($split);
            return $split[1];
        }

        if(!in_array(getExtension($data['file_path']), $fileTypes)){
            return "File Type Not Accepted";
        }else{
            // transfer file ...
            $destination  = "public/files/" . $data['file_path'];
            move_uploaded_file($file['tmp_name'], $destination);
            return $this->db->insert('files', $data);
        }

        
    }
}
