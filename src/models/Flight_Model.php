<?php

namespace Src\Models;


use Src\Classes\Model;

class Flight_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function liste()
    {
//        //Get record count
//        $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount FROM vols_details;");
//        $ctmt->execute();
//        $result = $ctmt->fetchall();
//        $recordCount = $result[0]['RecordCount'];
//        //        echo $result;
//        //Get records from database
//        //$stmt = $db->prepare("SELECT vol_details_id, num_vols, date_depart, date_arrivee, date_modified, vol_status  FROM vols_details;"); //" ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
////        $stmt = $db->prepare("SELECT `vols_details_id`, `num_vols`, `date_depart`, `date_arrivee`, `date_modified`, `date_created`, `vol_status` FROM `vols_details`;");
//        $stmt = $this->db->prepare("SELECT vols_details_id, num_vols, heure_est_depart, heure_est_arrivee, date_modified, date_created, vol_status FROM vols_details WHERE date_depart = '2017-11-03' ORDER BY heure_est_arrivee ASC;");
//
//        $stmt->execute();
//        $result = $stmt->fetchAll();
//        $rows = array();
//        foreach ($result as $row){
//            $rows[] = $row;
//        }
//        //Add all records to an array
//
//        //Return result to jTable
//        $jTableResult = array();
//        $jTableResult['Result'] = "OK";
//        $jTableResult['TotalRecordCount'] = $recordCount;
//        $jTableResult['Records'] = $rows;
//        print json_encode($jTableResult);
        //Get record count
//        $ctmt = $db->prepare("SELECT COUNT(*) AS RecordCount FROM vols_details  WHERE `date_depart` = '2017-11-03' AND `ville_destination` = 'YUL';");

        $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount
                          FROM
                          `oreoport`.`vols_details`
                          INNER JOIN `oreoport`.`vols`
                          ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                           WHERE `vols`.`ville_destination` = 'YUL' AND `vols_details`.`date_arrivee` = '2017-11-03';");

        $ctmt->execute();
        $result = $ctmt->fetchall();
        $recordCount = $result[0]['RecordCount'];


        $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville FROM oreoport.vols 
                                    INNER JOIN oreoport.compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN oreoport.vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_provenance = nom_aeroport_ville.code_ville)
                                    WHERE (vols_details.date_arrivee = '2017-11-03') AND (ville_destination = 'YUL')
                                    ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");

        $stmt->execute();
        $result = $stmt->fetchAll();
        $rows = array();
        foreach ($result as $row){
            $rows[] = $row;
        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $recordCount;
        $jTableResult['Records'] = $rows;
        print json_encode($jTableResult);
    }
}