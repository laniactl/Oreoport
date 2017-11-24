<?php
/**
 * Created by PhpStorm.
 * User: racinepilote
 * Date: 18/10/2017
 * Time: 22:50
 */

namespace Src\models;
use Src\Classes\Message;
use Src\Classes\Model;

class Notify_Model extends Model

{
    function __construct()
    {
        parent::__construct();
    }

    public function userAskToBeNotified(){
//        $ctmt = $this->db->prepare ("INSERT INTO `notification`(`vols_details_id`, `phone_id`, `notification_date`, `notification_heure`, `notification_active`) VALUES (:vold, :phone, :dateAujourdhui, :heureAujourdhui, :notification) " );
//        $_setNotification = 1;
//        $ctmt->bindParam(":vold" , $_volID);
//        $ctmt->bindParam(":phone" , $_phoneNmb);
//        $ctmt->bindParam(":dateAujourdhui", date('Y-m-d'));
//        $ctmt->bindParam(":heureAujourdhui", time());
//        $ctmt->bindParam(":notification", $_setNotification);
//        $ctmt->execute();

//       $messagemodel = new Message_Model();
//       $message = new Message();
//       $message->setHeure("19h50");
//       $message->setVille("TO");
//       $message->setStatue("Retart");
//       $message->setPhoneNumber("+15143468023");
//       $message->setMessage("Salut je fait un test");
//       $messagemodel->sendSMS($message);
        $arryNotif [0]=  $_POST["vol"];
        $arryNotif[1] = $_POST["phone"];
        $notifDAO = new NotifyDAO();
        $notifDAO->create($arryNotif);

    }
    public function userAskToCancelTheNotification(string $_volID, string $_phoneNmb):bool {}
    public function sendNotification(){

    }
}