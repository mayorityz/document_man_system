<?php
class Managedocuments extends Controller
{
    public $title = [
        "title" => "Login Page Here",
        "something" => "Anything" //here we can put anyother information
    ];

    public function __construct()
    {
        parent::__construct();
        $this->authPage();
    }

    public function index()
    {
        $this->view->files = $this->model->fetchFiles();
        $this->view->render('manage-documents/index', $this->title);
    }

    public function updateDox()
    {
        $date  = date('d-m-Y h:i:s:a');
        $loggedInAs = Session::get('loggedin');
        $file_ = $_FILES['file'];
        $title = $_POST['title'];
        $id    = $_POST['id'];
        $category = $_POST['category'];

        $data = array(
            'date_updated' => $date,
            'updated_by_whom' => $loggedInAs,
            'category' => $category,
            'file_path' => $file_['name'],
            'title' => $title
        );
        $this->model->updateDocx($id, $data, $file_);
        header('Location:' . $_SERVER["HTTP_REFERER"]);
    }

    public function removeDoc($id)
    {
        $this->model->removeDoc($id);
        header('Location:' . $_SERVER["HTTP_REFERER"]);
    }
}
