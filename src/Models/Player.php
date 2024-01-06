<?php

namespace App;

class Player
{
    private $vehicle;
    public function __construct($vehicle)
    {
        $this->vehicle = $vehicle;
    }
}