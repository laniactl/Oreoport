<?php

namespace Src\Classes;

abstract class Model
{
    function __construct()
    {
        $this->db = new \Database();
    }

}