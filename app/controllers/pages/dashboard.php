<?php
    class Dashboard extends Controller
    {
        public $title = [
            "title" => "Dashboard",
            "something" => "Anything" //here we can put anyother information
        ];

        public function __construct()
        {
            parent::__construct();
            $this->authPage();
        }

        public function index(){
            $this->defaultIndex("dashboard/index", $this->title);
        }
    }