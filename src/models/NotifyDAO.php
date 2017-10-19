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
    public function updateNotification(string $flightsID, string $_phoneNumb):bool{}
    public function findAll():array {}
    public function create(string $flightsID, string $_phoneNumb):bool {}
    public function delete():bool{}
}