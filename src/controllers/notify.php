<?php
/**
 * Created by PhpStorm.
 * User: patri
 * Date: 2017-11-16
 * Time: 14:24
 */

namespace Src\controllers;


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
    echo"allas";
//        SELECT
//    vols_details_id
//FROM
//    oreoport.`vols_details`
//WHERE (date_arrivee ="2017-11-23"
//    AND num_vols = "LX541");

    //
       $this->model->userAskToBeNotified($_numvol, $_smsPhone);

    }
}