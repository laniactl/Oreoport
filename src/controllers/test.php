<?php

class test extends Controller
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
        $this->view->array = $this->model->retourlalistedesvols();
        $this->index();
    }

    function testfichier()
    {
        $this->model->testfichier();
        $this->index();
    }

}
