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

//            $file = fopen("./xScript/csvOreoport.csv","r+");
//
//            $test = 13;
//            while (!eof($file)) {
//
//                $infoFlights = array(fgetcsv($file));
//                $test = 13;
//            }
            /*
             * https://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php
             * https://secure.php.net/manual/en/function.fgetcsv.php
             */
            $row = 1;
            if (($handle = fopen("./xScript/csvOreoport.csv", "r")) !== FALSE) {
                $test = 13;
                while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
                    $num = count($data);
                    echo "<p> $num fields in line $row: <br /></p>\n";
                    $row++;
                    for ($c=0; $c < $num; $c++) {
                        echo $data[$c] . "<br />\n";
                    }
                }
                $test1 = 131;
                fclose($handle);
            }



        }
    }
}