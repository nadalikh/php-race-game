<?php

namespace App;
interface Unit{
    public function calculateRaceTime():float;
}

class Unit_knot implements Unit{

    public function calculateRaceTime(): float
    {
        return 0;
    }
}

class Unit_KPH implements  Unit{

    public function calculateRaceTime(): float
    {
        return 0;
    }
}


class Vehicle
{
    public $name, $maxSpeed, $unit;
    public function __construct($name, $maxSpeed, Unit $unit)
    {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->unit = $unit;
    }
}