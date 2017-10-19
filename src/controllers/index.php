<?php

class Index extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('src/index/index');
    }

    function details()
    {
        $this->view->render('src/index/index');
    }
}
