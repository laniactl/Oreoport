<?php
/**
 * Created by PhpStorm.
 * User: patri
 * Date: 2017-11-13
 * Time: 14:52
 */

namespace Src\controllers;


class SMS extends Controller

{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('SMS/index',true);
    }
}