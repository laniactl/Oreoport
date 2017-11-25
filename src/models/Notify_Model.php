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
        $arryNotif[2] = $_POST["date"];
        $arryNotif[3] = $_POST["status"];
        $notifDAO = new NotifyDAO();
        $notifDAO->create($arryNotif);

    }
    public function userAskToCancelTheNotification(){
        $arryNotif [0]=  $_POST["vol"];
        $arryNotif[1] = $_POST["phone"];
        $arryNotif[2] = $_POST["date"];
        $arryNotif[3] = $_POST["status"];
        $notifDAO = new NotifyDAO();
        $notifDAO->delete($arryNotif);

    }
    public function sendNotification(){
    }
}