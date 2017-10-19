<?php

namespace Src\Models;

class CommunicationWithControlTower_Model
{
    public function readInfoOnFightsIntoFileAndSendInfo(string $fileName){}
    public function readInfoEventsIntoFileAndSendInfo(string $fileName){}
    public function isFlightInfosAreChange($file):bool {}
    public function isEventsInfoAreChange($file):bool {}
    public function archiveInfo(){}
}