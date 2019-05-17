<?php
    class Products extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){
            $this->defaultIndex('products/index', "my products");
            $this->model->showProducts();
        }

        public function showProducts(){
            // $this->model->showProducts();
        }
    }