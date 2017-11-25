<?php

namespace Src\Models;

use Src\Classes\Model;

class NotifyDAO extends Model
{
    /**
     * FlightsDAO constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function update(string $flightsID, string $_phoneNumb): bool
    {

    }

    public function findAll(): array
    {
    }

    public function read(string $id)
    {
        // TODO: Implement read() method.
    }

    public function delete(array $arrayNotif): bool
    {
        $ctmt = $this->db->prepare("SELECT vols_details_id FROM oreoport.`vols_details` 
            WHERE (date_arrivee =:datearrive AND num_vols = :vols);");
        $ctmt->bindParam(':datearrive', $arrayNotif[2]);
        $ctmt->bindParam(':vols', $arrayNotif[0]);
        $ctmt->execute();
        $noVoldetail = $ctmt->fetch();

        if (isset($noVoldetail)) {
            $varDate = DATETODAY;
            $stm = $this->db->prepare("DELETE FROM notification 
                WHERE vols_details_id = :_voldetail_id  
                AND phone_id = :_phone
                AND notification_date = :_date ;");
            $stm->bindParam(':_voldetail_id', $noVoldetail[0]);
            $stm->bindParam(':_phone', $arrayNotif[1]);
            $stm->bindParam(':_date', $varDate);
            $result = $stm->execute();

            if ($result) {
                echo json_encode($result);
                die();
            }
        }
    }

    /**
     * @param $arrayNotif
     * @return bool
     */
    public function create(array $arrayNotif): bool
    {
        $ctmt = $this->db->prepare("SELECT vols_details_id FROM oreoport.`vols_details` 
            WHERE (date_arrivee =:datearrive AND num_vols = :vols);");
        $ctmt->bindParam(':datearrive', $arrayNotif[2]);
        $ctmt->bindParam(':vols', $arrayNotif[0]);
        $ctmt->execute();
        $noVoldetail = $ctmt->fetch();

        if (isset($noVoldetail)) {
            $varDate = DATETODAY;
            $st = $this->db->prepare("INSERT INTO notification (vols_details_id, phone_id, notification_date, notification_nature) 
                        VALUES (:_voldetail_id,:_phone,:_date,:_status);");
            $st->bindParam(':_voldetail_id', $noVoldetail[0]);
            $st->bindParam(':_phone', $arrayNotif[1]);
            $st->bindParam(':_date', $varDate);
            $st->bindParam(':_status', $arrayNotif[3]);
            $result = $st->execute();
            if ($result > 0) {
                echo json_encode($result);
                die();
            }
        }
    }
}