<?php
use Src\Classes\FileReader;

class loadFlight extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('test/index');
    }

    function details()
    {
        $this->view->array = $this->model->retourlalistedesvols();
        $this->index();
    }

    function loadvols()
    {
        $resultat = $this->model->loadvols();

        if ($resultat){
            $this->view->resultat = "La nouvelle cédule à été charger pour le prochain trimestre ";
        } else{
            $this->view->resultat = "La nouvelle cédule n'a pas peu été chargé.";
        }
        $this->index();
    }

    function loadUpdate()
    {
      $result = $this->model->loadChangementVols();
      if($result == 1){
          $this->view->resultat = "Mise a jour events reusis ";
      } elseif ($result == -1){
          $this->view->resultat = "Repertoir vide aucuen mise a jour à faire.";
      } else {
          $this->view->resultat = "Mise a jour event a échoué. ";
      }
        $this->index();

    }

    function testThread(){
        $test =123;
        $reader = new Src\Classes\FileReader("/Users/racinepilote/Sites/oreoport/tourdecontrole/events/12h00.csv");
        $reader->start();

        sleep(2);
        $reader->pause();
        do_something(rand(2, 4));
        $reader->unpause();
        sleep(2);
        $reader->pause();
        do_something(rand(2, 4));
        $reader->unpause();
        sleep(2);
        $reader->pause();
        do_something(rand(2, 4));
        $reader->unpause();
    }
}
