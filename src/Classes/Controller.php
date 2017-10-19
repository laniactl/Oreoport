<?php

class Controller
{
    function __construct(){
        $this->view = new View();
    }

    public function loadModel($name) {

        $path = 'src/models/'.$name.'_Model.php';

        if (file_exists($path)) {
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }
}