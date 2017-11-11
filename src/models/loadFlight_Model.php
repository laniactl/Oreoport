<?php

namespace Src\models;

use Src\Classes\Model;

class loadFlight_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * https://stackoverflow.com/questions/11448307/importing-csv-data-using-php-mysql
     * https://www.youtube.com/watch?v=G2Vg5hUz5eg
     */
    public function loadvols()
    {
        $filenameRelativepath = "./tourdecontrole/vols/oreoportvols.csv";
        if (file_exists($filenameRelativepath)) {
            $filename = basename($filenameRelativepath);
            $pahtFile = realpath(dirname($filenameRelativepath));
            $pahtFileFilename = $pahtFile . "/" . $filename;

            $query = <<<eof
   LOAD DATA INFILE '$pahtFileFilename'
   INTO TABLE vols
   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
   LINES TERMINATED BY '\r\n'
   (vols_id, compagnie_id, ville_provenance, ville_destination, heure_depart, heure_arrivee, temps_de_vols, num_vols)
eof;
            $result = $this->db->query($query);
            rename($pahtFileFilename, "./tourdecontrole/archive/".$filename);
            $this->loadvolsDetails();
        }
    }


    public function loadvolsDetails()
    {
        $filenameRelativepath = "./tourdecontrole/details/oreoportvolsdetails.csv";
        if (file_exists($filenameRelativepath)) {
            $filename = basename($filenameRelativepath);
            $pahtFile = realpath(dirname($filenameRelativepath));
            $pahtFileFilename = $pahtFile . "/" . $filename;

            $query = <<<eof
   LOAD DATA INFILE '$pahtFileFilename'
   INTO TABLE oreoport.vols_details
   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
   LINES TERMINATED BY '\n'
   (oreoport.vols_details.vols_details_id, oreoport.vols_details.num_vols, oreoport.vols_details.date_depart, oreoport.vols_details.date_arrivee, oreoport.vols_details.heure_est_depart, oreoport.vols_details.heure_est_arrivee, oreoport.vols_details.date_modified, oreoport.vols_details.date_created, oreoport.vols_details.vol_status);
eof;
            $result = $this->db->query($query);
            rename($pahtFileFilename, "./tourdecontrole/archive/".$filename);

        }
    }

}