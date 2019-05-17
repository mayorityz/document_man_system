<?php
    class Staff extends Controller{
        public $title = [
            "title" => "Staff Managment"
        ];
    
        public function __construct()
        {
            parent::__construct();
            $this->view->js = array('staff/js/register.js');
            $this->authPage();
        }

        public function index(){
            $this->view->staff = $this->model->fetchStaff();
            $this->view->render('staff/index', $this->title);
        }

        public function  newStaff(){
            $formValues = file_get_contents('php://input');
            $values = json_decode($formValues, true);

            $data = array(
                'username' => $values['name'],
                'email' =>$values['email'],
                'office' => $values['office'],
                'passcode' => Hash::create('sha256', $values['passcode'], 'document_man_system')
            );
            echo $this->model->save($data);
        }

        public function delete($id){
            $this->model->delete($id);
            header('Location:' . $_SERVER["HTTP_REFERER"]);
        }
    }