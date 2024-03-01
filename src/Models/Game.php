<?php

namespace App;
use App\ConsoleHelper;
use App\Player;
use App\Vehicle;

class Game
{
    // The Players property is composition relation between Game and player model.
    private $consoleHandler, $players = [], $db, $totalLength;
    const NUMBER_OF_PLAYERS = 2;

    private function playerStarter(){
        $vehicleName = $this->consoleHandler->showOptions();
        $vehicle = $this->db->findWithName($vehicleName);
        $this->players[] = new Player(
            new Vehicle(
                $vehicle['name'],
                $vehicle['maxSpeed'],
                match ($vehicle['unit']){
                    "knots", "Kts" => new Unit_knot(),
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
            $this->consoleHandler->getInput("enter the total length of the race in Km: ");
    }

    public function calculatePlayersTime(){
        foreach ($this->players as $player) {
            $raceTime = $player->getVehicle()->unit->calculateRaceTime(
                $this->totalLength,
                $player->getVehicle()->maxSpeed
            );
            $player->setRaceTime($raceTime);
        }
    }

    public function watchPlayers(){
        foreach ($this->players as $player)
            var_dump($player);
    }

    public function watchPlayerRaceTime(){
        foreach ($this->players as $player)
            $this->consoleHandler->output(strval($player->getRaceTime()) . " minutes");
    }
    public function findWinner() {
        $maxRaceTime = PHP_INT_MAX;
        $winnerPlayer = "";
        foreach ($this->players as $player) {
            $winnerPlayer = ( $player->getRaceTime() < $maxRaceTime) ?
                $player
                :
                $winnerPlayer;
            $maxRaceTime = $winnerPlayer->getRaceTime();
        }
         $this->consoleHandler->output(strtoupper("The ". $winnerPlayer->name . " is the winner and reach to end in ". strval($winnerPlayer->getRaceTime()) . " minutes"));
    }
}