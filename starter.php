<?php
require "./vendor/autoload.php";
use App\Game;

$game = new Game();
$game->startGame();
$game->calculatePlayersTime();
$game->watchPlayerRaceTime();
$game->findWinner();