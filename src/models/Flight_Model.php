<?php

namespace Src\Models;


use Src\Classes\Model;

class Flight_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function listeDepart($valreqToday)
    {
        // Query des departs.
        if ($valreqToday == "today") {
            $_dateArrive = DATETODAY;

        } else {
            $_dateArrive = DATETOMORROW;
        }
        //$_dateArrive = '2017-11-04';
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
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_destination = nom_aeroport_ville.code_ville)
                                    WHERE (vols_details.date_arrivee = :datearrive AND ville_provenance = :ville)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
        $stmt->bindParam(':datearrive', $_dateArrive);
        $stmt->bindParam(':ville', $_villeDepart);
        $stmt->execute();
        $result = $stmt->fetchAll();

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $recordCount;
        $jTableResult['Records'] = $result;
        print json_encode($jTableResult);


    }


    public function listeArrivee($valreqToday)
    {
        if ($valreqToday == "today") {
            $_dateArrive = DATETODAY;
        } else {
            $_dateArrive = DATETOMORROW;
        }
        //$_dateArrive = '2017-11-03';
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


        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $recordCount;
        $jTableResult['Records'] = $result;
        print json_encode($jTableResult);

    }

    public function listeArriveeFiltre($valreqToday)
    {
        $_aRechercher = $_POST["recherche"];
        $aFiltrer = $_POST["searchId"];

        if ($valreqToday == "today") {
            $_dateArrive = DATETODAY;
        } else {
            $_dateArrive = DATETOMORROW;
        }
        //$_dateArrive = '2017-11-03';
        $_villeDest = 'YUL';
        if ($_POST['searchId'] == 'num_vols') {
            $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount
                          FROM
                          `oreoport`.`vols_details`
                          INNER JOIN `oreoport`.`vols`
                          ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                          WHERE `vols`.`ville_destination` = :ville AND `vols_details`.`date_arrivee` = :datearrive AND `vols_details`.`num_vols` = :recherche ;");
            $ctmt->bindParam(':datearrive', $_dateArrive);
            $ctmt->bindParam(':ville', $_villeDest);
            $ctmt->bindParam(':recherche', $_aRechercher);
            $ctmt->execute();
            $result = $ctmt->fetchall();
            $recordCount = $result[0]['RecordCount'];


            $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville FROM oreoport.vols 
                                    INNER JOIN oreoport.compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN oreoport.vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_provenance = nom_aeroport_ville.code_ville)
                                    WHERE (vols_details.date_arrivee = :datearrive AND ville_destination = :ville AND `vols_details`.`num_vols` = :recherche)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->bindParam(':ville', $_villeDest);
            $stmt->bindParam(':recherche', $_aRechercher);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        elseif ($_POST['searchId'] == 'nom_ville'){
            $ctmt = $this->db->prepare(   "SELECT COUNT(*) AS RecordCount 
                      FROM `oreoport`.`vols_details`
                      INNER JOIN `oreoport`.`vols` 
                      ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                      INNER JOIN `oreoport`.`nom_aeroport_ville` 
                      ON (`nom_aeroport_ville`.`code_ville` = `vols`.`ville_provenance`)
                      WHERE `nom_aeroport_ville`.`nom_ville` = :recherche AND `vols_details`.`date_arrivee` = :datearrive");
            $ctmt->bindParam(':recherche', $_aRechercher);
            $ctmt->bindParam(':datearrive', $_dateArrive);
            $ctmt->execute();
            $result = $ctmt->fetchall();
            $recordCount = $result[0]['RecordCount'];

            $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville 
                                    FROM oreoport.vols
                                    INNER JOIN oreoport.compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN oreoport.vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_provenance = nom_aeroport_ville.code_ville)
                                    WHERE `nom_aeroport_ville`.`nom_ville` = :recherche AND `vols_details`.`date_arrivee` = :datearrive
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);

            $stmt->bindParam(':recherche', $_aRechercher);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        else {
            $ctmt = $this->db->prepare(   "SELECT COUNT(*) AS RecordCount
                    FROM `oreoport`.`compagnie`
                    INNER JOIN `oreoport`.`vols` 
                    ON (`compagnie`.`compagnie_id` = `vols`.`compagnie_id`)
                    INNER JOIN `oreoport`.`vols_details` 
                    ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                    WHERE (`compagnie`.`compagnie_nom` = :recherche AND `vols_details`.`date_arrivee` = :datearrive AND `vols`.`ville_destination` =:ville)");
            $ctmt->bindParam(':recherche', $_aRechercher);
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
                                    WHERE (vols_details.date_arrivee = :datearrive AND ville_destination = :ville AND `compagnie`.`compagnie_nom` = :recherche)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->bindParam(':ville', $_villeDest);
            $stmt->bindParam(':recherche', $_aRechercher);
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
//
    public function listeDepartFiltre($valreqToday, $numVol)
    {
        $_aRechercher = $_POST["recherche"];
        $aFiltrer = $_POST["searchId"];

        if ($valreqToday == "today") {
            $_dateArrive = DATETODAY;
        } else {
            $_dateArrive = DATETOMORROW;
        }
//$_dateArrive = '2017-11-03';
        $_villeDest = 'YUL';


        if ($_POST['searchId'] == 'num_vols') {
            $ctmt = $this->db->prepare("SELECT COUNT(*) AS RecordCount
                          FROM
                          `oreoport`.`vols_details`
                          INNER JOIN `oreoport`.`vols`
                          ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                          WHERE `vols`.`ville_provenance` = :ville AND `vols_details`.`date_arrivee` = :datearrive AND `vols_details`.`num_vols` = :recherche ");
            $ctmt->bindParam(':datearrive', $_dateArrive);
            $ctmt->bindParam(':ville', $_villeDest);
            $ctmt->bindParam(':recherche', $_aRechercher);
            $ctmt->execute();
            $result = $ctmt->fetchall();
            $recordCount = $result[0]['RecordCount'];


            $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville FROM oreoport.vols
                                    INNER JOIN compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN nom_aeroport_ville ON (vols.ville_destination = nom_aeroport_ville.code_ville)
                                    WHERE (ville_provenance = :ville AND vols_details.date_arrivee = :datearrive AND vols_details.num_vols = :recherchevol)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->bindParam(':ville', $_villeDest);
            $stmt->bindParam(':recherchevol', $_aRechercher);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        elseif ($_POST['searchId'] == 'nom_ville'){
            $ctmt = $this->db->prepare(   "SELECT COUNT(*) AS RecordCount 
                      FROM `oreoport`.`vols_details`
                      INNER JOIN `oreoport`.`vols` 
                      ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                      INNER JOIN `oreoport`.`nom_aeroport_ville` 
                      ON (`nom_aeroport_ville`.`code_ville` = `vols`.`ville_destination`)
                      WHERE `nom_aeroport_ville`.`nom_ville` = :recherche AND `vols_details`.`date_arrivee` = :datearrive");
            $ctmt->bindParam(':recherche', $_aRechercher);
            $ctmt->bindParam(':datearrive', $_dateArrive);
            $ctmt->execute();
            $result = $ctmt->fetchall();
            $recordCount = $result[0]['RecordCount'];

            $stmt = $this->db->prepare("SELECT vols_details.vols_details_id, vols_details.num_vols, vols_details.heure_est_depart,
                                    vols_details.heure_est_arrivee, vols_details.vol_status, compagnie.compagnie_nom,
                                    nom_aeroport_ville.nom_ville 
                                    FROM oreoport.vols
                                    INNER JOIN oreoport.compagnie ON (vols.compagnie_id = compagnie.compagnie_id)
                                    INNER JOIN oreoport.vols_details ON (vols_details.num_vols = vols.num_vols)
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_destination = nom_aeroport_ville.code_ville)
                                    WHERE `nom_aeroport_ville`.`nom_ville` = :recherche AND `vols_details`.`date_arrivee` = :datearrive
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);

            $stmt->bindParam(':recherche', $_aRechercher);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        else{
            $ctmt = $this->db->prepare(   "SELECT COUNT(*) AS RecordCount
                    FROM `oreoport`.`compagnie`
                    INNER JOIN `oreoport`.`vols` 
                    ON (`compagnie`.`compagnie_id` = `vols`.`compagnie_id`)
                    INNER JOIN `oreoport`.`vols_details` 
                    ON (`vols_details`.`num_vols` = `vols`.`num_vols`)
                    WHERE (`compagnie`.`compagnie_nom` = :recherche AND `vols_details`.`date_arrivee` = :datearrive AND `vols`.`ville_destination` =:ville)");
            $ctmt->bindParam(':recherche', $_aRechercher);
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
                                    INNER JOIN oreoport.nom_aeroport_ville ON (vols.ville_destination = nom_aeroport_ville.code_ville)
                                    WHERE (vols_details.date_arrivee = :datearrive AND ville_provenance = :ville AND `compagnie`.`compagnie_nom` = :recherche)
                                    ORDER BY " . $_GET['jtSorting'] . " LIMIT " . $_GET['jtStartIndex'] . "," . $_GET['jtPageSize']);
            $stmt->bindParam(':datearrive', $_dateArrive);
            $stmt->bindParam(':ville', $_villeDest);
            $stmt->bindParam(':recherche', $_aRechercher);
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