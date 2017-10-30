<?php

namespace Src\Classes;

abstract class Model
{
    function __construct()
    {
        $this->db = new \Database();
    }
    abstract public function create($obj,$para):bool;
    abstract public function read(string $id);
    abstract public function delete(string $id):bool;
    abstract public function findAll():array;
}