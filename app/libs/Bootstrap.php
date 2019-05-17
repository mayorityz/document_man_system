<?php
class Bootstrap
{
    function __construct()
    {
        /**
         * we need to change controllers/pages to something like __controller__
         */
        $url = $this->getUrl();

            // default controrller
        if ($url[0] == '') {
            require "app/controllers/pages/index.php";
            $controller = new index();
            $controller->index();
            return false;
        }

            // 1. 
        $file = 'app/controllers/pages/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $controller = new $url[0];
                // add the model automatically, if it has one ...
            $controller->loadModel($url[0]);
                // $controller->index();
        } else {
                // throw new Exception("file: 404 page");
            $this->errorHand();
        }            

            // 2.
        if (isset($url[1])) {
            if (method_exists($controller, $url[1])) {
            // 3. check of it has parameters
                if (isset($url[2])) {
                    $controller->{$url[1]}($url[2]);
                } else {
                    echo $controller->{$url[1]}();
                }
            } else {
                $this->errorHand();
            }
        } else {
                // means every controller must have an index method by default...
            $controller->index();
        }
    }

    public function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }

    public function errorHand()
    {
            // throw new Exception("file: 404 page");
        require_once './app/controllers/pages/404.php';
        $error = new Errorpage;
        return false;
    }
}