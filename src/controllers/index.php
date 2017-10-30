<?php

class Index extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('index/index');
    }

    function details()
    {
        $this->view->racine=123;
        $this->view->lania=999;
        $this->index();
    }
}
