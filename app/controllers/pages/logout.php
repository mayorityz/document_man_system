<?php
    class Logout extends Controller{
        public function __construct()
        {   
            Session::init();
            Session::destroy();
        }
    }
?>