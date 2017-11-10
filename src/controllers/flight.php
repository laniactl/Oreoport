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

        if(isset($_GET["recherche"])) {
            $test = $departArrivee;
        }

        if ($departArrivee == "depart") {
            $this->model->listeDepart($valreqDate);
        } else {
            $this->model->listeArrivee($valreqDate);
        }


//        if(isset($_POST["recherche"])) {
//            if ($_POST["recherche"] != "") {
////                $aRechercher = $_POST["recherche"];
////                $aFiltrer = $_POST["searchId"];
//                if ($departArrivee == "depart") {
//                    $this->model->listeDepartFiltre($valreqDate);
//                } else {
//                    $this->model->listeArriveeFiltre($valreqDate);
//                }
//        } else {
//
//            }


//        if ($departArrivee == "depart") {
//            $this->model->listeDepart($valreqDate);
//        } else {
//            $this->model->listeArrivee($valreqDate);
//        }



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
