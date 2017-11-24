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
        if(isset($_POST["recherche"])) {
            $numVol =  ($_POST["recherche"]);
            if ($departArrivee == "depart") {
                $this->model->listeDepartFiltre($valreqDate, $numVol);
            }
            else $this->model->listeArriveeFiltre($valreqDate, $numVol);
        }
        elseif ($departArrivee == "depart") {
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
