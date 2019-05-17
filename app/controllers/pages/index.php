<?php
    class Index extends Controller
    {
        public $title = [
            "title" => "Manage Documents",
            "uploadfile" => "Upload New File"
        ];
        function __construct()
        {
            parent::__construct();
            $this->authPage();
        }

        public function index(){
            $this->defaultIndex("index/index", $this->title);
        }

        public function uploadFile(){
            $date  = date('d-m-Y h:i:s:a');
            $file_ = $_FILES['dox'];
            $data = array(
                "title"            => $_POST['file_name'],
                "file_path"        => $file_['name'],
                "category"         => $_POST['category'],
                "uploaded_by_whom" => Session::get('loggedin'),
                "date_uploaded"    => $date
                );
            // $this->view->thisFile = $data;
            // $this->model->uploadFile($data, $file_);
            if($this->model->uploadFile($data, $file_)){
                $this->view->statement = "file upload Successful";
                header('Location:' . ROOT . 'managedocuments');
            }
            
            // $this->view->render("index/uploadfile", $this->title);
        }
    }
    