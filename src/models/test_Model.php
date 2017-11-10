<?php

namespace Src\models;

use Src\Classes\Model;

class test_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
//        $this->Dao = new FlightsDAO();
    }

    public function retourlalistedesvols(): array
    {
        return $this->Dao->findAll();
    }

    public function testfichier()
    {
//         https://stackoverflow.com/questions/11448307/importing-csv-data-using-php-mysql
        $filename = "/Users/racinepilote/Sites/oreoport/src/models/csvOreoport.csv";

        $test = 123123;
$query = <<<eof
   LOAD DATA INFILE '$filename'
   INTO TABLE vols
   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
   LINES TERMINATED BY '\r\n'
   (vols_id, compagnie_id, ville_provenance, ville_destination, heure_depart, heure_arrivee, temps_de_vols, num_vols)
eof;

$test = 123;
$result =  $this->db->query($query);

$testasdf = 11211;

    }
}