<?php
class Login extends Controller
{
    public $title = [
        "title" => "Login Page Here",
        "something" => "Anything" //here we can put anyother information
    ];

    public function __construct()
    {
        parent::__construct();
        $this->view->js = array('login/js/login.js');
    }

    public function index()
    {
        $this->view->accessProds = $this->model->accessProds();
        $this->defaultIndex("login/index", $this->title);
    }

    public function run()
    {
        $this->model->run();
    }
}