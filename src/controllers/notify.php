<?php

class Notify extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('SMS/index',true);
    }


    function newnotification()
    {
       $this->model->userAskToBeNotified();
    }
}