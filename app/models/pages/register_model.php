<?php
class Register_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($data)
    {
            // but we need to check if the user aleady exists in the db
        $this->db->insert('members', $data);
    }
}