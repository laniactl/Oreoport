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
        //Get record count
        $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount FROM vols_details;");
        $ctmt->execute();
        $result = $ctmt->fetchall();
        $recordCount = $result[0]['RecordCount'];
        //        echo $result;
        //Get records from database
        //$stmt = $db->prepare("SELECT vol_details_id, num_vols, date_depart, date_arrivee, date_modified, vol_status  FROM vols_details;"); //" ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
//        $stmt = $db->prepare("SELECT `vols_details_id`, `num_vols`, `date_depart`, `date_arrivee`, `date_modified`, `date_created`, `vol_status` FROM `vols_details`;");
        $stmt = $this->db->prepare("SELECT vols_details_id, num_vols, heure_est_depart, heure_est_arrivee, date_modified, date_created, vol_status FROM vols_details WHERE date_depart = '2017-11-03' ORDER BY heure_est_arrivee ASC;");

        $stmt->execute();
        $result = $stmt->fetchAll();
        $rows = array();
        foreach ($result as $row){
            $rows[] = $row;
        }
        //Add all records to an array

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $recordCount;
        $jTableResult['Records'] = $rows;
        print json_encode($jTableResult);
    }
}