<?php

namespace App;
interface Unit{
    public function calculateRaceTime($totalLength, $maxSpeed):float;
}

/**
 * This class calculate the race time with knot and kts unit
 */
class Unit_knot implements Unit{

    public function calculateRaceTime($totalLength, $maxSpeed): float
    {
        $kmph = $maxSpeed * 1.852;
        return $totalLength * 60 / $kmph;
    }
}

/**
 * This class calculate the race time with KpH unit.
 */
class Unit_KPH implements  Unit{

    public function calculateRaceTime($totalLength, $maxSpeed): float
    {
        return $totalLength * 60 / $maxSpeed;
    }
}

/**
 * The vehicle class has unit property which handle composition over inheritance
 */
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