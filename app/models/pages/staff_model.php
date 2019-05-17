<?php
class Staff_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save($data)
    {
        // but we need to check if the user aleady exists in the db
        return $this->db->insert('members', $data);
    }

    public function fetchStaff(){
        return $this->db->selectAll('members');
    }

    public function delete($id){
        $params = "memberid = '$id'";
        return $this->db->delete('members', $params);
    }
}
