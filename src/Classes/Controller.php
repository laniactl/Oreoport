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
            $test = '\Src\models\"';
            $resutat = $test.$modelName;
            $resutat1 = $test.$modelName;
            $this->model = new \Src\models\test_Model();

            //https://secure.php.net/manual/en/function.addslashes.php
        }
    }
}