<?php

class Flight extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('index/index');
    }

    function liste($val)
    {
        $this->model->liste($val);
    }
    function create()
    {
        $this->model->default();
    }
    function update()
    {
        $this->model->default();
    }
    function delete()
    {
        $this->model->default();
    }
}
