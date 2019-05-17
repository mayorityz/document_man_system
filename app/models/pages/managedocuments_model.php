<?php
class Managedocuments_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchFiles()
    {
        return $this->db->selectAll('files');
    }

    public function removeDoc($id)
    {
        $params = "fms_id = '$id'";
        return $this->db->delete('files', $params);
    }

    public function updateDocx($id, $data, $file)
    {
        $fileName = $file['name'];
        // delete the actual files too ...
        $fileTypes = array('docx', 'doc', 'pdf');

        //  check file extension ...
        function getExtension($fileName)
        {
            $split = explode('.', $fileName);
                $length_ = count($split);
            return $split[$length_ - 1];
        }

        if (!in_array(getExtension($data['file_path']), $fileTypes)) {
            return "File Type Not Accepted";
        } else {
            // transfer file ...
            $destination  = "public/files/" . $data['file_path'];
            move_uploaded_file($file['tmp_name'], $destination);

            $params = "fms_id = '$id'";
            return $this->db->update('files', $data, $params);
        }
    }
}
