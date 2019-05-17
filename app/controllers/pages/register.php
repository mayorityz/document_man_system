<?php
class Register extends Controller{
    public $title = [
        "title" => "Join Us"
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->defaultIndex('register/index', $this->title);
    }

    public function addUser(){
        $data = array(
            'username'=> $_POST['username'],
            'passcode'=>  Hash::create('sha256', $_POST['passcode'], 'emeka')
        );
        $this->view->register = $this->model->register($data);
        // $this->view->default_index('register/index', $this->title);
    }
}