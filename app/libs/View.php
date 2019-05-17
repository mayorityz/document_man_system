<?php
    class View{
        function __construct()
        {
            
        }

        public function render($name, $title){
            require_once 'app/views/pages/incs/header.php';
            require 'app/views/pages/'.$name.'.php';
            require_once 'app/views/pages/incs/footer.php';
        }
    }