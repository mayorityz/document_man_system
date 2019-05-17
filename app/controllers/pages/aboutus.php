<?php
    class Aboutus extends Controller
    {
        function __construct()
        {
            parent::__construct();
            // $this->view->render("aboutus/index");
        }

        public function index($arg=false){
            $this->defaultIndex("aboutus/index");
            echo "speacil aegr padded ".$arg;
            echo "<br>";
        }

        public function aboutus($arg=false){
            $this->view->render("aboutus/index");
            echo "<br>";
            require 'models/aboutus_model.php';
            $model = new AboutModel;
        }
    }
    