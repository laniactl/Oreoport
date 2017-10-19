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
    public function getLastFlightsModified():string {}
    public function getLastEventsModified():string {}
    public function findAllFlightsToday():Flights{}
    public function findAllFlightsTomorrow():Flights{}
    public function updateFlightEventsToday(Flights $_flights):bool{}
    public function updateFlightEventsTomorrow(Flights $_flights):bool{}
    public function create(Flights $_flights):bool{}
    public function updateOneFlight(Flight $_flight):bool{}

}