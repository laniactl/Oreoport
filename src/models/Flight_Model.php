<?php

namespace Src\Models;


use Src\Classes\Model;

class Flight_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function liste($val)
    {
        // query des arrivées
        if ($val = "arrivee") {

            $_dateArrive = '2017-11-03';
            $_villeDest = 'YUL';

            $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount
                          FROM
                          `oreoport`.`vols_details`
                          INNER JOIN `oreoport`.`vols`
                          ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                          WHERE `vols`.`ville_destination` = :ville AND `vols_details`.`date_arrivee` = :datearrive ;");
            $ctmt->bindParam(':datearrive', $_dateArrive);
            $ctmt->bindParam(':ville', $_villeDest);
            $ctmt->execute();
            $result = $ctmt->fetchall();
            $recordCount = $result[0]['RecordCount'];


            $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville FROM oreoport.vols 
                                    INNER JOIN oreoport.compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN oreoport.vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_provenance = nom_aeroport_ville.code_ville)
                                    WHERE (vols_details.date_arrivee = :datearrive AND ville_destination = :ville)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->bindParam(':ville', $_villeDest);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }

        // Query des departs.
        else{
            $_dateArrive = '2017-11-03';
            $_villeDepart = 'YUL';

            $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount
                          FROM
                          `oreoport`.`vols_details`
                          INNER JOIN `oreoport`.`vols`
                          ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                          WHERE `vols`.`ville_provenance` = :ville AND `vols_details`.`date_arrivee` = :datearrive ;");
            $ctmt->bindParam(':datearrive', $_dateArrive);
            $ctmt->bindParam(':ville', $_villeDepart);
            $ctmt->execute();
            $result = $ctmt->fetchall();
            $recordCount = $result[0]['RecordCount'];


            $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville FROM oreoport.vols 
                                    INNER JOIN oreoport.compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN oreoport.vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_provenance = nom_aeroport_ville.code_ville)
                                    WHERE (vols_details.date_arrivee = :datearrive AND ville_ville_provenance = :ville)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->bindParam(':ville', $_villeDepart);
            $stmt->execute();
            $result = $stmt->fetchAll();

        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $recordCount;
        $jTableResult['Records'] = $result;
        print json_encode($jTableResult);

    }
}