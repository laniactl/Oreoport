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

    function liste($departArrivee, $valreqToday)
    {
        $test = $departArrivee;

        if ($departArrivee == "depart") {
            $this->model->listeDepart($valreqToday);
        } else {
            $this->model->listeArrivee($valreqToday);
        }



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
