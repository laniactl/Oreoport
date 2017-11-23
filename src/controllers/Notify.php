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


    function newNotification($_numvol, $_smsPhone)
    {
        $test = 123;

       $this->model->userAskToBeNotified($_numvol, $_smsPhone);

    }
}