<?php

namespace Src\Models;

use Src\Classes\Flights;
use Src\Classes\Model;

class FlightsDAO extends Model
{
    /**
     * FlightsDAO constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function updateAllFlight(Flights $_flights):bool{}
    public function findAllFlightsToday():Flights{}
    public function findAllFlightsTomorrow():Flights{}
    public function updateFlightEventsToday(Flights $_flights):bool{}
    public function updateFlightEventsTomorrow(Flights $_flights):bool{}
    public function updateOneFlight(Flight $_flight):bool{}

    public function create($obj,$para):bool
    {
        // TODO: Implement creat() method.
    }

    public function read(string $id)
    {
        // TODO: Implement read() method.
    }

    public function delete(string $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function findAll(): array
    {
        $sth = $this->db->prepare("SELECT * FROM vols ");
        $sth->execute();
        /* Récupération de toutes les valeurs de la première colonne */
        $result = $sth->fetchAll();
        return $result;
    }
}