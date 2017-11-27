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
     * https://stackoverflow.com/questions/19139434/php-move-a-file-into-a-different-folder-on-the-server
     * https://secure.php.net/manual/en/function.basename.php
     */
    public function loadvols():bool
    {
        $filenameRelativepath = "./tourdecontrole/vols/oreoport_vols.csv";
        if (file_exists($filenameRelativepath)) {
            $this->deleteAllRowsTable();
            $filename = basename($filenameRelativepath);
            $pahtFile = realpath(dirname($filenameRelativepath));
            $pahtFileFilename = $pahtFile . "/" . $filename;

            $query = <<<eof
LOAD DATA INFILE '$pahtFileFilename'
INTO TABLE vols
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(vols_id, compagnie_id, ville_provenance, ville_destination, heure_depart, heure_arrivee, temps_de_vols, num_vols);
eof;
            $result = $this->db->query($query);
            rename($pahtFileFilename, "./tourdecontrole/archive/" . $filename);
             if(!$this->loadvolsDetails()) return false;

            return true;
        }
        return false;
    }


    public function loadvolsDetails():bool
    {
        $filenameRelativepath = "./tourdecontrole/details/oreoport_vols_details.csv";
        if (file_exists($filenameRelativepath)) {
            $filename = basename($filenameRelativepath);
            $pahtFile = realpath(dirname($filenameRelativepath));
            $pahtFileFilename = $pahtFile . "/" . $filename;

            $query = <<<eof
   LOAD DATA INFILE '$pahtFileFilename'
   INTO TABLE vols_details
   FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
   LINES TERMINATED BY '\n'
   (oreoport.vols_details.vols_details_id, oreoport.vols_details.num_vols, oreoport.vols_details.date_depart, oreoport.vols_details.date_arrivee, oreoport.vols_details.heure_est_depart, oreoport.vols_details.heure_est_arrivee, oreoport.vols_details.date_modified, oreoport.vols_details.date_created, oreoport.vols_details.vol_status);
eof;
            $result = $this->db->query($query);
            rename($pahtFileFilename, "./tourdecontrole/archive/" . $filename);
            return true;
        }
        return false;
    }

    private function deleteAllRowsTable()
    {

        $sql = "TRUNCATE TABLE vols_details";
        $result = $this->db->exec($sql);

        $sql = "DELETE FROM vols";
        $result = $this->db->exec($sql);
        $test = 123;

    }

    public function loadChangementVols():int
    {
        if (!$this->dir_is_empty('./tourdecontrole/miseajour/')) {
            $dir    = './tourdecontrole/miseajour';
            $files1 = scandir($dir);
            $pahtFile = realpath(dirname($dir));
            $pahtFileFilename = $pahtFile . "/miseajour/" . $files1[2];

            if (file_exists($pahtFileFilename)) {
                $file = fopen($pahtFileFilename, 'r');
                $_dateModifier = DATETODAY;
                while (($line = fgetcsv($file)) !== FALSE) {
                    $_dateDepart = $line[2];
                    $_dateArrivee = $line[3];
                    $_heureDepart = $line[4];
                    $_heureArrivee = $line[5];
                    $_volStatus = $line[8];
                    $_volsId = $line[0];

                    $stmt = $this->db->prepare("UPDATE `vols_details`
                    SET `date_depart`=:dateDepart,
                        `date_arrivee`=:dateArrivee,
                        `heure_est_depart`=:heureDepart,
                        `heure_est_arrivee`=:heureArrivee,
                        `date_modified`=:dateModifier,
                        `vol_status`=:volStatus
                    WHERE `vols_details_id`=:volsId");

                    $stmt->bindParam(':dateDepart', $_dateDepart);
                    $stmt->bindParam(':dateArrivee', $_dateArrivee);
                    $stmt->bindParam(':heureDepart', $_heureDepart);
                    $stmt->bindParam(':heureArrivee', $_heureArrivee);
                    $stmt->bindParam(':dateModifier', $_dateModifier);
                    $stmt->bindParam(':volStatus', $_volStatus);
                    $stmt->bindParam(':volsId', $_volsId);

                    $stmt->execute();

                    // set les changements de flag de notification avec le nouvel état.
                    $_un = 1;
                    $nstmt = $this->db->prepare("UPDATE `notification`
                    SET `notification_flag`=:un,
                    `notification_nature`=:volStatus
                    WHERE `vols_details_id` =:volsId
                    AND `notification_active` =:un");

                    $nstmt->bindParam(':un', $_un);
                    $nstmt->bindParam(':volStatus', $_volStatus);
                    $nstmt->bindParam(':volsId', $_volsId);
                    $nstmt->execute();

                }
                fclose($file);
                rename($pahtFileFilename, "./tourdecontrole/archive/events/" . $files1[2]);
                return 1;
            }
            return 0;
        }
        return -1;
    }

    function dir_is_empty($dir)
    {
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                return FALSE;
            }
        }
        return TRUE;
    }
}