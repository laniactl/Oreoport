<?php
/**
 * Created by PhpStorm.
 * User: racinepilote
 * Date: 18/10/2017
 * Time: 21:53
 */

namespace Src\Classes;

class Flight
{
    private $_volID;
    private $_cieNom;
    private $_logoCie;
    private $_villeDepart;
    private $_villeArrive;
    private $_heureDepart;
    private $_heureArrive;
    private $_tempsDuVol;

    /**
     * Flight constructor.
     *
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getVolID():string
    {
        return $this->_volID;
    }

    /**
     * @param mixed $volID
     */
    public function setVolID(string $volID)
    {
        $this->_volID = $volID;
    }

    /**
     * @return mixed
     */
    public function getCieNom():string
    {
        return $this->_cieNom;
    }

    /**
     * @param mixed $cieNom
     */
    public function setCieNom(string $cieNom)
    {
        $this->_cieNom = $cieNom;
    }

    /**
     * @return mixed
     */
    public function getLogoCie()
    {
        return $this->_logoCie;
    }

    /**
     * @todo a voir comment type une variable image ?
     * Type image
     * @param mixed $logoCie
     */
    public function setLogoCie($logoCie)
    {
        $this->_logoCie = $logoCie;
    }

    /**
     * @return mixed
     */
    public function getVilleDepart():string
    {
        return $this->_villeDepart;
    }

    /**
     * @param mixed $villeDepart
     */
    public function setVilleDepart(string $villeDepart)
    {
        $this->_villeDepart = $villeDepart;
    }

    /**
     * @return mixed
     */
    public function getVilleArrive():string
    {
        return $this->_villeArrive;
    }

    /**
     * @param mixed $villeArrive
     */
    public function setVilleArrive(string $villeArrive)
    {
        $this->_villeArrive = $villeArrive;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart():string
    {
        return $this->_heureDepart;
    }

    /**
     * @param mixed $heureDepart
     */
    public function setHeureDepart(string $heureDepart)
    {
        $this->_heureDepart = $heureDepart;
    }

    /**
     * @return mixed
     */
    public function getHeureArrive():string
    {
        return $this->_heureArrive;
    }

    /**
     * @param mixed $heureArrive
     */
    public function setHeureArrive(string $heureArrive)
    {
        $this->_heureArrive = $heureArrive;
    }

    /**
     * @return mixed
     */
    public function getTempsDuVol():string
    {
        return $this->_tempsDuVol;
    }

    /**
     * @param mixed $tempsDuVol
     */
    public function setTempsDuVol(string $tempsDuVol)
    {
        $this->_tempsDuVol = $tempsDuVol;
    }
}