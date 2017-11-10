<?php

namespace Src\models;

use Src\Classes\Model;

class test_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function testfichier()
    {
//         https://stackoverflow.com/questions/11448307/importing-csv-data-using-php-mysql
//        https://www.youtube.com/watch?v=G2Vg5hUz5eg
        $filename = "./tourdecontrole/vols/csvOreoport.csv";
        $pahtFile =  realpath(dirname($filename));
        $pahtFileFilename = $pahtFile."/csvOreoport.csv";
$query = <<<eof
   LOAD DATA INFILE '$pahtFileFilename'
   INTO TABLE vols
   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
   LINES TERMINATED BY '\r\n'
   (vols_id, compagnie_id, ville_provenance, ville_destination, heure_depart, heure_arrivee, temps_de_vols, num_vols)
eof;

$result =  $this->db->query($query);

    }
}