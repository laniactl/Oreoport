<?php

class loadFlight extends Controller
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

    function loadvols()
    {
        $this->model->loadvols();
        $this->index();
    }

    function loadUpdate()
    {
        $this->model->loadChangementVols();
        $this->index();

    }
}
