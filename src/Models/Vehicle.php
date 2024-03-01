<?php

namespace App;
interface Unit{
    public function calculateRaceTime($totalLength, $maxSpeed):float;
}

class Unit_knot implements Unit{

    public function calculateRaceTime($totalLength, $maxSpeed): float
    {
        $kmph = $maxSpeed * 1.852;
        return $totalLength * 60 / $kmph;
    }
}


class Unit_KPH implements  Unit{

    public function calculateRaceTime($totalLength, $maxSpeed): float
    {
        return $totalLength * 60 / $maxSpeed;
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