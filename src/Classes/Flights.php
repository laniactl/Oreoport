<?php

namespace Src\Classes;

class Flights
{
    //array
    private $_listOfVol;
    private $_lastRequestToDb;
    private $_newUpdateAvailable;

    /**
     * Flights constructor.
     */
    public function __construct()
    {
        $this->_listOfVol= array();
    }

    /**
     * @return mixed
     */
    public function getNewUpdateAvailable():bool
    {
        return $this->_newUpdateAvailable;
    }

    /**
     * @param mixed $newUpdateAvailable
     */
    public function setNewUpdateAvailable(bool $newUpdateAvailable)
    {
        $this->_newUpdateAvailable = $newUpdateAvailable;
    }

    /**
     * @return mixed
     */
    public function getLastRequestToDb():int
    {
        return $this->_lastRequestToDb;
    }

    /**
     * @param mixed $lastResquestToDb
     */
    public function setLastRequestToDb(int $lastRequestToDb)
    {
        $this->_lastRequestToDb = $lastRequestToDb;
    }

    public function addFlightToTheList(Flight $flight){}
    public function shortList(string $parametre):array {}

}