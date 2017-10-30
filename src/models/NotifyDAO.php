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
    public function update(string $flightsID, string $_phoneNumb):bool{}

    public function findAll():array {}

    public function read(string $id)
    {
        // TODO: Implement read() method.
    }

    public function delete(string $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function create($obj, $para): bool
    {
        // TODO: Implement creat() method.
    }
}