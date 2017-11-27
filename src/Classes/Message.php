<?php
/**
 * Created by PhpStorm.
 * User: racinepilote
 * Date: 18/10/2017
 * Time: 22:58
 */

namespace Src\Classes;

class Message
{
    private $_message;
    private $_statue;
    private $_volId;
    private $_heure;
    private $_ville;


    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getVille():string
    {
        return $this->_ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille(string $ville)
    {
        $this->_ville = $ville;
    }
    private $_phoneNumber;


    /**
     * @return mixed
     */
    public function getMessage():string
    {
        return $this->_message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage(string $message)
    {
        $this->_message = $message;
    }

    /**
     * @return mixed
     */
    public function getStatue():string
    {
        return $this->_statue;
    }

    /**
     * @param mixed $statue
     */
    public function setStatue(string $statue)
    {
        $this->_statue = $statue;
    }

    /**
     * @return mixed
     */
    public function getVolId():string
    {
        return $this->_volId;
    }

    /**
     * @param mixed $volId
     */
    public function setVolId(string $volId)
    {
        $this->_volId = $volId;
    }

    /**
     * @return mixed
     */
    public function getHeure():string
    {
        return $this->_heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure(string $heure)
    {
        $this->_heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber():string
    {
        return $this->_phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->_phoneNumber = $phoneNumber;
    }


}