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
    public function userAskToBeNotified(string $_volID, string $_phoneNmb){}
    public function userAskToCancelTheNotification(string $_volID, string $_phoneNmb):bool {}
    public function sendNotification(){}
}