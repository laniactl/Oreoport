<?php
/**
 * Created by PhpStorm.
 * User: racinepilote
 * Date: 18/10/2017
 * Time: 22:50
 */

namespace Src\Models;


class Notify_Model
{
    public function userAskToBeNotified(string $_volID, string $_phoneNmb){
        $ctmt = $this->db->prepare ("INSERT INTO `notification`(`vols_details_id`, `phone_id`, `notification_date`, `notification_heure`, `notification_active`) VALUES (:vold, :phone, :dateAujourdhui, :heureAujourdhui, :notification) " );
        $_setNotification = 1;
        $ctmt->bindParam(":vold" , $_volID);
        $ctmt->bindParam(":phone" , $_phoneNmb);
        $ctmt->bindParam(":dateAujourdhui", date('Y-m-d'));
        $ctmt->bindParam(":heureAujourdhui", time());
        $ctmt->bindParam(":notification", $_setNotification);
        $ctmt->execute();


    }
    public function userAskToCancelTheNotification(string $_volID, string $_phoneNmb):bool {}
    public function sendNotification(){}
}