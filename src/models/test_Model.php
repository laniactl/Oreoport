<?php

namespace Src\models;

class test_Model
{
   public function __construct()
   {
        $this->Dao = new FlightsDAO();
   }

   public function retourlalistedesvols():array
   {
      return $this->Dao->findAll();

   }

    public function testfichier()
    {
        {
            /*  $query = <<<eof
                  LOAD DATA INFILE '$filename'
                   INTO TABLE flights
                   FIELDS TERMINATED BY '|' OPTIONALLY ENCLOSED BY '"'
                   LINES TERMINATED BY '\n'
                  (vols_id, compagnie_id,ville_provenance, ville_destination, heure_depart, heure_arrivee, temps_de_vol, num_vols)
              eof;

              $db->query($query);*/
            $filename = "csvOreoport.csv";

            $file = fopen("/Users/racinepilote/Sites/oreoport/csvOreoport.csv","r");

            $test = 13;
            while (!eof($file)) {

                $infoFlights = array(fgetcsv($file));
                $test = 13;
            }



        }
    }
}