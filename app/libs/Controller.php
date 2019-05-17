<?php
class Controller
{
    function __construct()
    {
        $this->view = new View;
    }
        
        // renders the default index page(method) ...
    public function defaultIndex($url, $title = "mvc")
    {
        $this->view->render($url, $title);
    }

        // models shld run in the controller...
    public function loadModel($name)
    {
        $path = 'app/models/pages/' . $name . '_model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $name . '_model';
            $this->model = new $modelName;
        }
    }

        // this way, if I don\'t want anyone to view a 
        // controller, they can't
    public function authPage()
    {
        Session::init();
        $sess = Session::get('loggedin');
        if (!isset($sess)) {
            Session::destroy();
            $location = ROOT . 'login';
            header('location: ' . $location);
            exit();
        }
    }
}