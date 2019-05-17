<?php

    class Errorpage extends Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->view->message = "Error Page View Here..";
            $this->view->render('error/index', '404 Error');            
        }
    }
    