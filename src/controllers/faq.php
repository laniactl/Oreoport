<?php

class Faq extends Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('faq/index',true);
    }

}
