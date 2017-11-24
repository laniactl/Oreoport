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

//        SELECT
//    vols_details_id
//FROM
//    oreoport.`vols_details`
//WHERE (date_arrivee ="2017-11-23"
//    AND num_vols = "LX541");

        $test = 123;


       $this->model->userAskToBeNotified();
        $test = 11;
    }
}