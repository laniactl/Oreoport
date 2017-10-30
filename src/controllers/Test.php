<?php

class Test extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('test/index');
    }

    function details()
    {


        $this->view->arrayV  = $this->model->retourlalistedesvols();
        $this->index();
    }
}
