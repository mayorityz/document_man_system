<?php
class Login_Model extends Model
{

    public function __construct()
    {
            // this has loaded the pdo db connection in...
        parent::__construct();
    }

    public function accessProds()
    {
        $sth = $this->db->prepare("SELECT * FROM products LIMIT 10");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function run()
    {
        $formValues = file_get_contents('php://input');
        $values = json_decode($formValues);
            $email =  $values->email;
            $password =  $values->memid;
            
        //
        $sth = $this->db->prepare("SELECT * FROM members WHERE passcode=:passcode && email= :email");
        $sth->execute(array(
            ':passcode' => Hash::create('sha256', $password, 'document_man_system'),
            ':email' => $email
        ));
        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('loggedin', $email);
            echo ROOT;
        } else {
            echo "Invalid Credentials...";
        }
    }
}