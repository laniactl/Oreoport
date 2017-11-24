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
    public function update(string $flightsID, string $_phoneNumb):bool{}

    public function findAll():array {}

    public function read(string $id)
    {
        // TODO: Implement read() method.
    }

    public function delete(string $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function create($arrayNotif): bool
    {
        $_dateArrive = DATETODAY;

        $ctmt = $this->db->prepare("SELECT vols_details_id FROM oreoport.`vols_details` 
            WHERE (date_arrivee =:datearrive AND num_vols = :vols);");
        $ctmt->bindParam(':datearrive', $_dateArrive);
        $ctmt->bindParam(':vols', $arrayNotif[0]);
        $ctmt->execute();
        $result = $ctmt->fetchall();

        $st = $this->db->prepare("");
        $st->bindParam(':datearrive', $_dateArrive);
        $st->bindParam(':vols', $arrayNotif[0]);
        $st->execute();
        $result = $ctmt->fetchall();

        $test =123;
    }


}