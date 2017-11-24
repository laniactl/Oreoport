<?php
/**
 * Created by PhpStorm.
 * User: racinepilote
 * Date: 18/10/2017
 * Time: 23:01
 */

namespace Src\models;

use Src\Classes\Message;
use Twilio\Rest\Client;

class Message_Model
{
    public function __construct()
    {
    }

    public function sendSMS(Message $_message): void
    {
        /**
         * Created by PhpStorm.
         * User: patri
         * Date: 2017-11-13
         * Time: 13:37
         */

        /* Send an SMS using Twilio. You can run this file 3 different ways:
         *
         * 1. Save it as sendnotifications.php and at the command line, run
         *         php sendnotifications.php
         *
         * 2. Upload it to a web host and load mywebhost.com/sendnotifications.php
         *    in a web browser.
         *
         * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root
         *    directory to the folder containing this file, and load
         *    localhost:8888/sendnotifications.php in a web browser.
         */

        // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php,
        // following the instructions to install it with Composer.


        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
//    $AccountSid = "AC8cf9e7fb66f29067803ff66facd66d00";
//    $AuthToken = "a8be4b5b7b7c36b8d4f10246d71d4e16";

        $AccountSid = "AC601698b8be394b40c07d99bc714df79a";
        $AuthToken = "454db2ce680d71f30a35338c8ab446c3";

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);

        // Step 4: make an array of people we know, to send them a message.
        // Feel free to change/add your own phone number and name here.
        $people = array(
            $_message->getPhoneNumber() => "Patrice",
            "+15145826431" => "Racine"
//        "+15558675308" => "Boots",
//        "+15558675307" => "Virgil"
        );

        $mes = $_message->getMessage() . " " . $_message->getStatue();

        // Step 5: Loop over all our friends. $number is a phone number above, and
        // $name is the name next to it
        foreach ($people as $number => $name) {

            $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
                $number,

                array(
                    // Step 6: Change the 'From' number below to be a valid Twilio number
                    // that you've purchased
                    'from' => "+14387937640",

                    // the sms body
                    'body' => $mes
                )
            );

            // Display a confirmation message on the screen
            echo "Sent message to $name";
        }

    }

    public function sendEmail(Message $_message): void
    {
    }

}