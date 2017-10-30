<?php

namespace Src\models;

class test_Model
{
   public function __construct()
   {
        $this->Dao = new FlightsDAO();
   }

   public function retourlalistedesvols():array
   {
      return $this->Dao->findAll();

   }
}