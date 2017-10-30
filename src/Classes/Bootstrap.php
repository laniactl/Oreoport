<?php

class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['_url']) ? $_GET['_url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

         if (empty($url[0])){
             $controller = new Index();
             $controller->index();
             return false;
         }

        $file = 'src/controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        }else{
            $controller = new Errors();
            $controller->index();
            return false;
        }
        $controller = new $url[0];
        $controller->loadModel($url[0]);


        // calling methods
        if(isset($url[3])){
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2], $url[3]);
            } else {
                $this->error ();
            }
        } elseif (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }
}