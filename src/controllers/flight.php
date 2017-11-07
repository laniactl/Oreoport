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

    function liste($departArrivee, $valreqDate)
    {
        $test = $departArrivee;

        if ($departArrivee == "depart") {
            $this->model->listeDepart($valreqDate);
        } else {
            $this->model->listeArrivee($valreqDate);
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
