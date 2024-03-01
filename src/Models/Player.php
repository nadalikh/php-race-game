<?php

namespace App;

class Player
{
    private $vehicle, $raceTime;
    public static $id = 0;
    public $name;
    public function __construct($vehicle)
    {
        self::$id++;
        $this->name = "Player ". self::$id;
        $this->vehicle = $vehicle;
    }
    public function setRaceTime($raceTime){
        $this->raceTime = $raceTime;
    }
    public function getVehicle(){
        return $this->vehicle;
    }
    public function getRaceTime(){
        return $this->raceTime;
    }
}