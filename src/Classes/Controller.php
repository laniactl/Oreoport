<?php
use \Src\models;

class Controller
{
    function __construct(){
        $this->view = new View();
    }

    public function loadModel($name) {

        $path = 'src/models/'.$name.'_Model.php';

        if (file_exists($path)) {
            $modelName = '\Src\models\\' . $name . '_Model';
            //require $path;
            //$test = "\Src\models\\test_Model()";

            $this->model = new $modelName;

            //https://secure.php.net/manual/en/function.addslashes.php
        }
    }
}