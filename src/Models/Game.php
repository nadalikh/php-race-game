<?php

namespace App;
use App\ConsoleHelper;
use App\Player;
use App\Vehicle;

class Game
{
    // The Players property is composition relation between Game and player model.
    private $consoleHandler ,$players = [], $db, $totalLength;
    const NUMBER_OF_PLAYERS = 2;

    private function playerStarter(){
        $vehicleName = $this->consoleHandler->showOptions(strval(count($this->players) + 1));
        $vehicle = $this->db->findWithName($vehicleName);
        $this->players[] = new Player(
            new Vehicle(
                $vehicle['name'],
                $vehicle['maxSpeed'],
                match ($vehicle['unit']){
                    "knots" => new Unit_knot(),
                    "Km/h" => new Unit_KPH()
                }
            )
        );
    }

    public function __construct()
    {
        $this->db = new DbHelper();
        $this->consoleHandler = new ConsoleHelper($this->db);
    }

    public function startGame(){
        for ($i = 0; $i<self::NUMBER_OF_PLAYERS; $i++)
            $this->playerStarter();
        $this->totalLength=
            $this->consoleHandler->getInput("enter the total length of the race : ");
    }

    public function watchPlayers(){
        foreach ($this->players as $player)
            var_dump($player);
    }


}